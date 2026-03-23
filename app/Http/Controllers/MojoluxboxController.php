<?php

namespace App\Http\Controllers;

use App\Helpers\StripeCheckout;
use App\Helpers\StripeClient;
use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MojoLuxBoxController extends Controller
{
    // Map plan names to .env price IDs (no typed property for max compatibility)
    private $plans = [
        'monthly' => 'STRIPE_PRICE_MONTHLY',
        'quarterly' => 'STRIPE_PRICE_QUARTERLY',
        'annually' => 'STRIPE_PRICE_ANNUAL',
    ];

    /**
     * Show the MojoLux Box page.
     */
    public function index()
    {
        $subscription = null;

        if (Auth::check()) {
            $subscription = Subscription::where('user_id', Auth::id())
                ->where('status', 'active')
                ->latest()
                ->first();
        }

        return view('pages.default.mojoluxbox', compact('subscription'));
    }

    /**
     * Start Stripe subscription checkout.
     */
    public function subscribe(Request $request)
    {
        $request->validate([
            'plan' => 'required|in:monthly,quarterly,annually',
        ]);

        $user = Auth::user();
        $plan = $request->plan;
        $price_id = env($this->plans[$plan]);

        // Make sure StripeCheckout class exists and methods are defined
        $stripe_checkout = new StripeCheckout();
        $stripe_checkout->startSubscriptionSession($user->email, $price_id, $plan);
        $stripe_checkout->createSession();

        return redirect($stripe_checkout->getUrl());
    }

    /**
     * Handle Stripe redirect back after payment.
     */
    public function success(Request $request)
    {
        $session_id = $request->query('session_id');

        if (!$session_id) {
            return redirect()->route('mojoluxbox')->with('error', 'Something went wrong.');
        }

        $stripe_checkout = new StripeCheckout();

        /** @var \Stripe\Checkout\Session $checkout_session */
        $checkout_session = $stripe_checkout->getCheckoutOrder($session_id);

        if ($checkout_session->payment_status !== 'paid' && $checkout_session->status !== 'complete') {
            return redirect()->route('mojoluxbox')->with('error', 'Payment not completed.');
        }

        // Avoid duplicate records
        $existing = Subscription::where('stripe_subscription_id', $checkout_session->subscription)->first();

        if (!$existing) {
            $stripe = StripeClient::getClient();
            $sub = $stripe->subscriptions->retrieve($checkout_session->subscription);

            Subscription::create([
                'user_id' => Auth::id(),
                'stripe_subscription_id' => $sub->id,
                'stripe_customer_id' => $sub->customer,
                'plan' => $request->query('plan', 'monthly'),
                'status' => 'active',
                'current_period_end' => Carbon::createFromTimestamp($sub->current_period_end),
            ]);
        }

        return view('pages.default.mojoluxbox_success');
    }

    /**
     * Cancel subscription.
     */
    public function cancel(Request $request)
    {
        $subscription = Subscription::where('user_id', Auth::id())
            ->where('status', 'active')
            ->latest()
            ->first();

        if (!$subscription) {
            return redirect()->route('mojoluxbox')->with('error', 'No active subscription found.');
        }

        $stripe = StripeClient::getClient();
        $stripe->subscriptions->cancel($subscription->stripe_subscription_id);

        $subscription->update(['status' => 'cancelled']);

        return redirect()->route('mojoluxbox')->with('message', 'Subscription cancelled.');
    }
}

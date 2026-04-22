<?php

namespace App\Http\Controllers;

use App\Models\PointsTransaction;
use App\Models\PointsWallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $user      = Auth::user();
        $cart_data = $user->products()->withPrices()->get();

        if ($cart_data->isEmpty()) {
            return redirect()->route('cart.index')->with('message', 'Your Cart is empty.');
        }

        $cart_data->calculateSubtotal();

        return view('pages.default.checkoutpage', compact('cart_data'));
    }

    // ── Called when pay form submits with use_points=1 ──────────────
    // You can call this from CheckoutPaymentController BEFORE the order
    // is created, or hook it into checkout.success.
    // Exposed here so you can also POST to /checkout/points directly.
    public function points(Request $request)
    {
        $request->validate([
            'use_points'      => 'required|boolean',
            'points_to_deduct'=> 'required|integer|min:0',
        ]);

        if (!$request->use_points || $request->points_to_deduct <= 0) {
            return response()->json(['skipped' => true]);
        }

        $user   = Auth::user();
        $wallet = PointsWallet::where('user_id', $user->id)->first();

        if (!$wallet || $wallet->points_balance < $request->points_to_deduct) {
            return response()->json(['error' => 'Insufficient points'], 400);
        }

        $wallet->decrement('points_balance', $request->points_to_deduct);

        PointsTransaction::create([
            'user_id'     => $user->id,
            'points'      => $request->points_to_deduct,
            'type'        => 'redeem',
            'description' => 'Redeemed at checkout',
        ]);

        return response()->json([
            'deducted'    => $request->points_to_deduct,
            'new_balance' => $wallet->fresh()->points_balance,
        ]);
    }
}

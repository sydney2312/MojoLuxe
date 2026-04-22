<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout — MojoLux</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;1,9..40,300&display=swap"
        rel="stylesheet">

    @php
        $user = auth()->user();
        $wallet = \App\Models\PointsWallet::where('user_id', $user->id)->first();
        $pointsBal = $wallet?->points_balance ?? 0;

        $POINTS_PER_DOLLAR = 100;
        $MAX_DISCOUNT_CENTS = 2000; // $20 cap

        $subtotalCents = (int) ($cart_data->getSubtotal() * 100);
        $maxFromPoints = (int) floor($pointsBal / $POINTS_PER_DOLLAR) * 100;
        $discountCents = min($maxFromPoints, $MAX_DISCOUNT_CENTS, $subtotalCents);
        $discountDollars = number_format($discountCents / 100, 2);
        $totalCents = $subtotalCents - $discountCents;
        $totalLabel = '$' . number_format($totalCents / 100, 2);
        $pointsToUse = $discountCents * ($POINTS_PER_DOLLAR / 100); // points that will be spent
    @endphp

    <style>
        :root {
            --ink: #1A1714;
            --ink-soft: #5C5650;
            --gold: #B8963E;
            --gold-warm: #D4AF6A;
            --gold-pale: #F7EDD8;
            --gold-faint: #FBF5EA;
            --white: #FFFFFF;
            --paper: #FAF7F2;
            --paper-deep: #F2EDE4;
            --rule: #E8E0D4;
            --nav-h: 74px;
            --ease: cubic-bezier(.4, 0, .2, 1);
            --radius: 14px;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--paper);
            color: var(--ink);
            min-height: 100vh;
            -webkit-font-smoothing: antialiased;
        }

        /* ── NAV ── */
        .nav-bar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background: rgba(255, 255, 255, .97);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(212, 175, 55, .18);
            padding: 1.5rem 3rem;
        }

        .nav-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: auto;
        }

        .logo {
            font-family: 'DM Serif Display', serif;
            font-size: 1.8rem;
            font-weight: 400;
            text-decoration: none;
            color: var(--ink);
        }

        .nav-links {
            display: flex;
            gap: 3rem;
        }

        .nav-links a {
            font-size: .75rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--ink);
            text-decoration: none;
            font-weight: 500;
            transition: color .2s;
        }

        .nav-links a:hover {
            color: var(--gold);
        }

        /* ── LAYOUT ── */
        .page-wrap {
            max-width: 1100px;
            margin: 0 auto;
            padding: calc(var(--nav-h) + 3.5rem) 2.5rem 6rem;
        }

        /* ── HERO ── */
        .page-hero {
            margin-bottom: 2.8rem;
        }

        .eyebrow-row {
            display: flex;
            align-items: center;
            gap: .7rem;
            margin-bottom: .9rem;
        }

        .eyebrow-line {
            width: 24px;
            height: 1px;
            background: var(--gold);
        }

        .eyebrow-text {
            font-size: .6rem;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: var(--gold);
            font-weight: 500;
        }

        .page-hero h1 {
            font-family: 'DM Serif Display', serif;
            font-size: clamp(2rem, 4vw, 2.8rem);
            font-weight: 400;
            color: var(--ink);
            line-height: 1.1;
        }

        .page-hero h1 em {
            font-style: italic;
            color: var(--gold-warm);
        }

        .page-hero p {
            margin-top: .55rem;
            color: var(--ink-soft);
            font-size: .85rem;
            font-weight: 300;
            line-height: 1.7;
        }

        /* ── GRID ── */
        .checkout-grid {
            display: grid;
            grid-template-columns: 1fr 400px;
            gap: 2rem;
            align-items: start;
        }

        @media(max-width: 900px) {
            .checkout-grid {
                grid-template-columns: 1fr;
            }

            .nav-bar {
                padding: 1rem 1.5rem;
            }

            .page-wrap {
                padding-left: 1.2rem;
                padding-right: 1.2rem;
            }
        }

        /* ── CARD SHELL ── */
        .card {
            background: var(--white);
            border: 1px solid var(--rule);
            border-radius: var(--radius);
            padding: 1.8rem 2rem;
            margin-bottom: 1.4rem;
        }

        .card-title {
            font-family: 'DM Serif Display', serif;
            font-size: 1.1rem;
            font-weight: 400;
            color: var(--ink);
            margin-bottom: 1.4rem;
            padding-bottom: .9rem;
            border-bottom: 1px solid var(--rule);
            display: flex;
            align-items: center;
            gap: .6rem;
        }

        .card-title-icon {
            width: 28px;
            height: 28px;
            border-radius: 7px;
            background: var(--gold-faint);
            border: 1px solid var(--rule);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: .9rem;
        }

        /* ── FORM ── */
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .form-row.single {
            grid-template-columns: 1fr;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: .35rem;
        }

        .form-group label {
            font-size: .72rem;
            font-weight: 500;
            color: var(--ink-soft);
            letter-spacing: .3px;
        }

        .form-group input,
        .form-group select {
            padding: .7rem 1rem;
            border: 1px solid var(--rule);
            border-radius: 9px;
            background: var(--paper);
            font-family: 'DM Sans', sans-serif;
            font-size: .85rem;
            color: var(--ink);
            outline: none;
            transition: border-color .2s, box-shadow .2s;
            width: 100%;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(184, 150, 62, .1);
            background: var(--white);
        }

        .form-group input::placeholder {
            color: #C0B8AE;
        }

        /* ── POINTS REDEMPTION BLOCK ── */
        .points-block {
            background: var(--ink);
            border-radius: 12px;
            padding: 1.4rem 1.6rem;
            margin-bottom: 1.4rem;
            position: relative;
            overflow: hidden;
        }

        .points-block::after {
            content: '⭐';
            position: absolute;
            right: 1.2rem;
            top: 50%;
            transform: translateY(-50%);
            font-size: 4rem;
            opacity: .05;
            pointer-events: none;
        }

        .pb-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            margin-bottom: .9rem;
        }

        .pb-info {
            flex: 1;
        }

        .pb-eyebrow {
            font-size: .58rem;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: rgba(255, 255, 255, .35);
            font-weight: 500;
            margin-bottom: .2rem;
        }

        .pb-headline {
            font-family: 'DM Serif Display', serif;
            font-size: 1rem;
            color: var(--gold-warm);
            font-weight: 400;
        }

        .pb-sub {
            font-size: .75rem;
            color: rgba(255, 255, 255, .3);
            margin-top: .15rem;
            font-weight: 300;
        }

        /* Toggle switch */
        .toggle-wrap {
            display: flex;
            align-items: center;
            gap: .6rem;
            flex-shrink: 0;
        }

        .toggle-label {
            font-size: .72rem;
            color: rgba(255, 255, 255, .35);
        }

        .toggle {
            position: relative;
            width: 44px;
            height: 24px;
            cursor: pointer;
        }

        .toggle input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .toggle-slider {
            position: absolute;
            inset: 0;
            background: rgba(255, 255, 255, .12);
            border-radius: 24px;
            transition: background .25s var(--ease);
        }

        .toggle-slider::before {
            content: '';
            position: absolute;
            width: 18px;
            height: 18px;
            left: 3px;
            top: 3px;
            background: rgba(255, 255, 255, .5);
            border-radius: 50%;
            transition: transform .25s var(--ease), background .25s var(--ease);
        }

        .toggle input:checked+.toggle-slider {
            background: var(--gold);
        }

        .toggle input:checked+.toggle-slider::before {
            transform: translateX(20px);
            background: var(--white);
        }

        /* Discount line */
        .pb-discount {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: .7rem .9rem;
            background: rgba(255, 255, 255, .06);
            border: 1px solid rgba(184, 150, 62, .2);
            border-radius: 8px;
            font-size: .8rem;
            opacity: 0;
            transform: translateY(6px);
            transition: opacity .3s var(--ease), transform .3s var(--ease);
            pointer-events: none;
        }

        .pb-discount.visible {
            opacity: 1;
            transform: translateY(0);
            pointer-events: auto;
        }

        .pb-discount-label {
            color: rgba(255, 255, 255, .5);
        }

        .pb-discount-value {
            color: var(--gold-warm);
            font-weight: 500;
            font-family: 'DM Serif Display', serif;
        }

        .pb-pts-spent {
            font-size: .68rem;
            color: rgba(255, 255, 255, .25);
            margin-top: .35rem;
        }

        @if ($pointsBal <= 0)
            .points-block {
                opacity: .55;
            }

            .toggle input {
                cursor: not-allowed;
            }
        @endif

        /* ── ORDER SUMMARY (right col) ── */
        .summary-card {
            background: var(--white);
            border: 1px solid var(--rule);
            border-radius: var(--radius);
            overflow: hidden;
            position: sticky;
            top: calc(var(--nav-h) + 1.5rem);
        }

        .summary-header {
            background: var(--ink);
            padding: 1.4rem 1.8rem;
            position: relative;
            overflow: hidden;
        }

        .summary-header::after {
            content: '🐾';
            position: absolute;
            right: 1rem;
            bottom: -.5rem;
            font-size: 4rem;
            opacity: .05;
            pointer-events: none;
        }

        .summary-eyebrow {
            font-size: .55rem;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: rgba(255, 255, 255, .3);
            font-weight: 500;
            margin-bottom: .3rem;
        }

        .summary-title {
            font-family: 'DM Serif Display', serif;
            font-size: 1.2rem;
            color: var(--white);
            font-weight: 400;
        }

        .summary-body {
            padding: 1.5rem 1.8rem;
        }

        /* cart items */
        .summary-items {
            margin-bottom: 1.2rem;
        }

        .summary-item {
            display: flex;
            align-items: center;
            gap: .9rem;
            padding: .65rem 0;
            border-bottom: 1px solid var(--rule);
        }

        .summary-item:last-child {
            border-bottom: none;
        }

        .si-img {
            width: 46px;
            height: 46px;
            border-radius: 8px;
            object-fit: cover;
            object-position: top;
            background: var(--paper-deep);
            flex-shrink: 0;
            border: 1px solid var(--rule);
        }

        .si-info {
            flex: 1;
            min-width: 0;
        }

        .si-name {
            font-size: .82rem;
            font-weight: 400;
            color: var(--ink);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .si-qty {
            font-size: .72rem;
            color: var(--ink-soft);
            margin-top: .1rem;
        }

        .si-price {
            font-size: .85rem;
            font-weight: 500;
            color: var(--ink);
            flex-shrink: 0;
        }

        /* totals */
        .summary-line {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: .45rem 0;
            font-size: .83rem;
            color: var(--ink-soft);
        }

        .summary-line.discount-line {
            color: var(--gold);
        }

        .summary-line.discount-line span:last-child {
            font-weight: 500;
        }

        .summary-divider {
            height: 1px;
            background: var(--rule);
            margin: .75rem 0;
        }

        .summary-total {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            padding: .6rem 0 1.4rem;
        }

        .summary-total-label {
            font-family: 'DM Serif Display', serif;
            font-size: 1rem;
            color: var(--ink);
        }

        .summary-total-value {
            font-family: 'DM Serif Display', serif;
            font-size: 1.5rem;
            color: var(--ink);
            transition: all .3s var(--ease);
        }

        /* pay button */
        .btn-pay {
            width: 100%;
            padding: .9rem 1.5rem;
            background: var(--gold);
            color: var(--ink);
            border: none;
            border-radius: 10px;
            font-family: 'DM Sans', sans-serif;
            font-size: .88rem;
            font-weight: 500;
            letter-spacing: .04em;
            cursor: pointer;
            transition: background .2s, transform .15s, box-shadow .2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: .5rem;
            text-decoration: none;
        }

        .btn-pay:hover {
            background: var(--gold-warm);
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(184, 150, 62, .3);
        }

        .summary-note {
            text-align: center;
            margin-top: .85rem;
            font-size: .7rem;
            color: var(--ink-soft);
            line-height: 1.6;
        }

        /* ── PAYMENT METHOD ── */
        .pay-option {
            display: flex;
            align-items: center;
            gap: .9rem;
            padding: .85rem 1rem;
            border: 1px solid var(--rule);
            border-radius: 10px;
            cursor: pointer;
            transition: border-color .2s, background .2s;
            margin-bottom: .6rem;
        }

        .pay-option:hover {
            border-color: var(--gold);
            background: var(--gold-faint);
        }

        .pay-option input[type=radio] {
            accent-color: var(--gold);
            width: 16px;
            height: 16px;
            flex-shrink: 0;
        }

        .pay-option-label {
            font-size: .83rem;
            color: var(--ink);
        }

        .pay-option-sub {
            font-size: .72rem;
            color: var(--ink-soft);
            margin-top: .1rem;
        }

        .pay-option.selected {
            border-color: var(--gold);
            background: var(--gold-faint);
        }

        /* ── STRIPE SECTION ── */
        .stripe-section {
            margin-top: 1rem;
        }
    </style>
</head>

<body>

    {{-- NAV --}}
    <nav class="nav-bar">
        <div class="nav-content">
            <a href="/" class="logo">MojoLux</a>
            <div class="nav-links">
                <a href="/">Home</a>
                <a href="/store">Collections</a>
                <a href="/wag-club">Wag Club</a>
                <a href="/cart">Cart</a>
            </div>
        </div>
    </nav>

    <div class="page-wrap">

        {{-- HERO --}}
        <div class="page-hero">
            <div class="eyebrow-row">
                <span class="eyebrow-line"></span>
                <span class="eyebrow-text">Almost There</span>
            </div>
            <h1>Checkout & <em>Pay</em></h1>
            <p>Review your order, apply your Wag Club points, and complete your purchase.</p>
        </div>

        <div class="checkout-grid">

            {{-- ── LEFT COL ── --}}
            <div>

                {{-- POINTS REDEMPTION --}}
                @if ($pointsBal > 0)
                    <div class="points-block">
                        <div class="pb-top">
                            <div class="pb-info">
                                <div class="pb-eyebrow">Wag Club Points</div>
                                <div class="pb-headline">You have {{ number_format($pointsBal) }} pts available</div>
                                <div class="pb-sub">Worth up to ${{ $discountDollars }} off your order</div>
                            </div>
                            <div class="toggle-wrap">
                                <span class="toggle-label">Apply</span>
                                <label class="toggle">
                                    <input type="checkbox" id="points-toggle" onchange="togglePoints(this)">
                                    <span class="toggle-slider"></span>
                                </label>
                            </div>
                        </div>
                        <div class="pb-discount" id="points-discount-row">
                            <span class="pb-discount-label">Points discount applied</span>
                            <span class="pb-discount-value">− ${{ $discountDollars }}</span>
                        </div>
                        <div class="pb-pts-spent" id="points-spent-label" style="display:none;">
                            {{ number_format($pointsToUse) }} pts will be deducted from your balance
                        </div>
                    </div>
                @else
                    <div class="points-block" style="opacity:.55;">
                        <div class="pb-top">
                            <div class="pb-info">
                                <div class="pb-eyebrow">Wag Club Points</div>
                                <div class="pb-headline">No points yet</div>
                                <div class="pb-sub">Play Mini Challenges to earn points and save on future orders.</div>
                            </div>
                        </div>
                    </div>
                @endif

                {{-- BILLING DETAILS --}}
                <div class="card">
                    <div class="card-title">
                        <span class="card-title-icon">📋</span>
                        Billing Details
                    </div>
                    <form id="billing-form">
                        <div class="form-row">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" placeholder="Sydney" value="{{ $user->name ?? '' }}">
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" placeholder="Smith">
                            </div>
                        </div>
                        <div class="form-row single">
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" placeholder="you@example.com" value="{{ $user->email ?? '' }}">
                            </div>
                        </div>
                        <div class="form-row single">
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" placeholder="+1 (868) 000-0000">
                            </div>
                        </div>
                        <div class="form-row single">
                            <div class="form-group">
                                <label>Street Address</label>
                                <input type="text" placeholder="House number and street name">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label>Town / City</label>
                                <input type="text" placeholder="Port of Spain">
                            </div>
                            <div class="form-group">
                                <label>Postcode / ZIP</label>
                                <input type="text" placeholder="000000">
                            </div>
                        </div>
                        <div class="form-row single">
                            <div class="form-group">
                                <label>Country</label>
                                <select>
                                    <option>Trinidad and Tobago</option>
                                    <option>France</option>
                                    <option>Italy</option>
                                    <option>United Kingdom</option>
                                    <option>United States</option>
                                    <option>Japan</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>

                {{-- PAYMENT METHOD --}}
                <div class="card">
                    <div class="card-title">
                        <span class="card-title-icon">💳</span>
                        Payment Method
                    </div>

                    <label class="pay-option" onclick="selectPay(this, 'stripe')">
                        <input type="radio" name="payment" value="stripe" checked>
                        <div>
                            <div class="pay-option-label">Credit / Debit Card</div>
                            <div class="pay-option-sub">Powered by Stripe — secure checkout</div>
                        </div>
                    </label>

                    <label class="pay-option" onclick="selectPay(this, 'bank')">
                        <input type="radio" name="payment" value="bank">
                        <div>
                            <div class="pay-option-label">Direct Bank Transfer</div>
                            <div class="pay-option-sub">Manual transfer — confirmation may take 1–2 days</div>
                        </div>
                    </label>

                    <label class="pay-option" onclick="selectPay(this, 'testing')">
                        <input type="radio" name="payment" value="testing">
                        <div>
                            <div class="pay-option-label">Testing / Demo</div>
                            <div class="pay-option-sub">Skip payment for development purposes</div>
                        </div>
                    </label>

                    <div class="stripe-section" id="stripe-ui">
                        <x-core.stripe-ui />
                    </div>
                </div>

            </div>

            {{-- ── RIGHT COL — ORDER SUMMARY ── --}}
            <div>
                <div class="summary-card">
                    <div class="summary-header">
                        <div class="summary-eyebrow">Your Order</div>
                        <div class="summary-title">Order Summary</div>
                    </div>
                    <div class="summary-body">

                        {{-- Cart items --}}
                        <div class="summary-items">
                            @foreach ($cart_data as $item)
                                <div class="summary-item">
                                    <img class="si-img" src="{{ $item->getImage() }}" alt="{{ $item->title }}">
                                    <div class="si-info">
                                        <div class="si-name">{{ $item->title }}</div>
                                        <div class="si-qty">Qty: {{ $item->pivot->quantity }}</div>
                                    </div>
                                    <div class="si-price">${{ number_format($item->getCartQuantityPrice(), 2) }}</div>
                                </div>
                            @endforeach
                        </div>

                        {{-- Totals --}}
                        <div class="summary-line">
                            <span>Subtotal</span>
                            <span>${{ number_format($subtotalCents / 100, 2) }}</span>
                        </div>
                        <div class="summary-line">
                            <span>Delivery</span>
                            <span>Free</span>
                        </div>

                        {{-- Points discount row — hidden until toggled --}}
                        <div class="summary-line discount-line" id="summary-discount-line" style="display:none;">
                            <span>⭐ Points Discount</span>
                            <span id="summary-discount-val">− ${{ $discountDollars }}</span>
                        </div>

                        <div class="summary-divider"></div>

                        <div class="summary-total">
                            <span class="summary-total-label">Total</span>
                            <span class="summary-total-value" id="summary-total">
                                ${{ number_format($subtotalCents / 100, 2) }}
                            </span>
                        </div>

                        {{-- Pay button — posts to CheckoutPaymentController --}}
                        <form id="pay-form" method="POST"
                            action="{{ route('checkout.stripe', ['payment' => 'stripe']) }}">
                            @csrf
                            {{-- Hidden field tells backend whether to deduct points --}}
                            <input type="hidden" name="use_points" id="use-points-input" value="0">
                            <input type="hidden" name="points_to_deduct" id="points-deduct-input" value="0">
                            <button type="submit" class="btn-pay">
                                Pay Now →
                            </button>
                        </form>

                        <div class="summary-note">
                            🔒 Secured by Stripe &nbsp;·&nbsp; SSL encrypted<br>
                            @if ($pointsBal > 0)
                                <span id="points-note">Toggle points above to apply your discount</span>
                            @endif
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        const SUBTOTAL = {{ $subtotalCents }}; // cents
        const DISCOUNT = {{ $discountCents }}; // cents
        const PTS_TO_USE = {{ $pointsToUse }}; // points that get deducted

        let pointsApplied = false;

        function togglePoints(checkbox) {
            pointsApplied = checkbox.checked;

            // Discount row in points block
            const discRow = document.getElementById('points-discount-row');
            const spentLabel = document.getElementById('points-spent-label');
            if (discRow) discRow.classList.toggle('visible', pointsApplied);
            if (spentLabel) spentLabel.style.display = pointsApplied ? 'block' : 'none';

            // Summary discount line
            const summaryDisc = document.getElementById('summary-discount-line');
            if (summaryDisc) summaryDisc.style.display = pointsApplied ? 'flex' : 'none';

            // Recalculate total
            const newTotal = pointsApplied ?
                (SUBTOTAL - DISCOUNT) / 100 :
                SUBTOTAL / 100;

            document.getElementById('summary-total').textContent =
                '$' + newTotal.toFixed(2);

            // Update hidden form fields
            document.getElementById('use-points-input').value = pointsApplied ? '1' : '0';
            document.getElementById('points-deduct-input').value = pointsApplied ? PTS_TO_USE : '0';

            // Update note
            const note = document.getElementById('points-note');
            if (note) note.textContent = pointsApplied ?
                `✅ ${Math.round(PTS_TO_USE).toLocaleString()} pts will be deducted after payment` :
                'Toggle points above to apply your discount';
        }

        function selectPay(label, method) {
            document.querySelectorAll('.pay-option').forEach(el => el.classList.remove('selected'));
            label.classList.add('selected');
            // Show/hide stripe UI
            const stripeUi = document.getElementById('stripe-ui');
            if (stripeUi) stripeUi.style.display = method === 'stripe' ? 'block' : 'none';
            // Update form action
            const form = document.getElementById('pay-form');
            if (form) {
                form.action = `/checkout/payment/${method}/1`;
            }
        }

        // Set first option selected on load
        document.querySelector('.pay-option')?.classList.add('selected');
    </script>

</body>

</html>

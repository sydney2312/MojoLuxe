<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MojoLux — Cart</title>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;1,9..40,300&display=swap" rel="stylesheet">
  <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
</head>
<body>

<style>
*, *::before, *::after { margin:0; padding:0; box-sizing:border-box; }

:root {
  --ink:        #1A1714;
  --ink-soft:   #5C5650;
  --gold:       #B8963E;
  --gold-warm:  #D4AF6A;
  --gold-faint: #FBF5EA;
  --white:      #FFFFFF;
  --paper:      #FAF7F2;
  --paper-deep: #F2EDE4;
  --rule:       #E8E0D4;
  --nav-h:      72px;
  --ease:       cubic-bezier(.4,0,.2,1);
}

body {
  font-family: 'DM Sans', sans-serif;
  background: var(--paper);
  color: var(--ink);
  -webkit-font-smoothing: antialiased;
}

/* ── NAV — your exact markup ── */
nav {
  position: fixed;
  top: 0; left: 0; right: 0;
  z-index: 1000;
  height: var(--nav-h);
  background: rgba(255,255,255,.96);
  backdrop-filter: blur(14px);
  border-bottom: 1px solid rgba(184,150,62,.15);
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 3rem;
}

nav .logo {
  font-family: 'Cormorant Garamond', serif;
  font-size: 1.8rem;
  font-weight: 600;
  color: var(--ink);
  text-decoration: none;
  letter-spacing: .5px;
}

nav .nav-links {
  display: flex;
  gap: 2.6rem;
  align-items: center;
}

nav .nav-links a {
  font-size: .7rem;
  letter-spacing: 2px;
  text-transform: uppercase;
  color: var(--ink-soft);
  text-decoration: none;
  font-weight: 500;
  transition: color .2s;
  position: relative;
}
nav .nav-links a::after {
  content: '';
  position: absolute;
  bottom: -3px; left: 0; right: 0;
  height: 1px;
  background: var(--gold);
  transform: scaleX(0);
  transform-origin: left;
  transition: transform .25s var(--ease);
}
nav .nav-links a:hover { color: var(--ink); }
nav .nav-links a:hover::after,
nav .nav-links a.active::after { transform: scaleX(1); }
nav .nav-links a.active { color: var(--ink); }

/* ── PAGE SHELL ── */
.cart-page {
  max-width: 1280px;
  margin: 0 auto;
  padding: calc(var(--nav-h) + 3.5rem) 3rem 7rem;
}

/* ── PAGE HEADER ── */
.cart-eyebrow {
  display: flex; align-items: center; gap: .7rem; margin-bottom: .75rem;
}
.cart-eyebrow-line { width: 28px; height: 1px; background: var(--gold); }
.cart-eyebrow-text {
  font-size: .57rem; letter-spacing: 3px; text-transform: uppercase;
  color: var(--gold); font-weight: 500;
}

h1.cart-heading {
  font-family: 'Cormorant Garamond', serif;
  font-size: 3.4rem;
  font-weight: 400;
  line-height: 1.05;
  color: var(--ink);
  margin-bottom: .45rem;
}
h1.cart-heading em { font-style: italic; color: var(--gold-warm); }

.cart-subhead {
  font-size: .78rem;
  color: var(--ink-soft);
  font-weight: 300;
  margin-bottom: 3rem;
  letter-spacing: .3px;
}

/* ── MAIN GRID ── */
.cart-layout {
  display: grid;
  grid-template-columns: 1fr 360px;
  gap: 2rem;
  align-items: start;
}

/* ── TABLE ── */
.cart-table-shell {
  background: var(--white);
  border: 1px solid var(--rule);
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 0 4px 40px rgba(26,23,20,.05);
}

table.mj {
  width: 100%;
  border-collapse: collapse;
}
table.mj thead tr { background: var(--ink); }
table.mj thead th {
  font-size: .55rem;
  letter-spacing: 2.5px;
  text-transform: uppercase;
  font-weight: 500;
  color: rgba(255,255,255,.35);
  padding: 1.1rem 1.5rem;
  text-align: left;
}
table.mj thead th:last-child { text-align: right; }
table.mj thead th.c { text-align: center; }

table.mj tbody tr {
  border-bottom: 1px solid var(--rule);
  transition: background .18s;
  animation: rise .4s var(--ease) both;
}
table.mj tbody tr:last-child { border-bottom: none; }
table.mj tbody tr:hover { background: var(--paper); }
table.mj td { padding: 1.6rem 1.5rem; vertical-align: middle; }

/* remove */
.td-rm { width: 52px; text-align: center; }
.rm-form button {
  width: 30px; height: 30px;
  border-radius: 8px;
  border: 1px solid var(--rule);
  background: transparent;
  cursor: pointer;
  display: flex; align-items: center; justify-content: center;
  color: var(--ink-soft);
  font-size: 1.1rem;
  transition: all .18s;
  margin: auto;
}
.rm-form button:hover {
  background: #fff0f0; border-color: #e0aaaa; color: #c0392b;
}

/* image */
.td-img { width: 88px; }
.prod-img {
  width: 74px; height: 74px;
  border-radius: 12px;
  object-fit: cover; object-position: top;
  display: block;
  background: var(--paper-deep);
  border: 1px solid var(--rule);
}

/* name */
.prod-title {
  font-family: 'Cormorant Garamond', serif;
  font-size: 1.12rem; font-weight: 500;
  color: var(--ink); line-height: 1.3; margin-bottom: .2rem;
}
.prod-meta { font-size: .71rem; color: var(--ink-soft); font-weight: 300; line-height: 1.6; }

/* price */
.td-price { font-size: .88rem; color: var(--ink-soft); white-space: nowrap; }

/* qty */
.td-qty { width: 110px; }
.qty-pill {
  display: flex; align-items: center;
  border: 1px solid var(--rule);
  border-radius: 50px;
  background: var(--paper);
  width: fit-content; overflow: hidden;
}
.qty-pill input {
  width: 42px; border: none; background: transparent; outline: none;
  text-align: center;
  font-family: 'DM Sans', sans-serif;
  font-size: .85rem; color: var(--ink);
  padding: .48rem 0;
}

/* total */
.td-total {
  font-size: .95rem; font-weight: 500;
  color: var(--gold); text-align: right; white-space: nowrap;
}

/* ── TOTALS PANEL ── */
.totals-panel {
  background: var(--ink);
  border-radius: 20px;
  overflow: hidden;
  position: sticky;
  top: calc(var(--nav-h) + 1.5rem);
  box-shadow: 0 24px 64px rgba(26,23,20,.2);
  animation: rise .5s var(--ease) .2s both;
}

.totals-band {
  height: 3px;
  background: linear-gradient(90deg, var(--gold), var(--gold-warm) 60%, var(--gold));
}

.totals-body { padding: 2rem 2rem 0; }

.totals-eyebrow {
  display: flex; align-items: center; gap: .6rem; margin-bottom: .75rem;
}
.totals-eyebrow-line { width: 18px; height: 1px; background: var(--gold); }
.totals-eyebrow-text {
  font-size: .54rem; letter-spacing: 3px; text-transform: uppercase;
  color: var(--gold); font-weight: 500;
}

.totals-title {
  font-family: 'Cormorant Garamond', serif;
  font-size: 2rem; font-weight: 400;
  color: var(--white); line-height: 1.15;
  margin-bottom: 1.8rem;
}
.totals-title em { font-style: italic; color: var(--gold-warm); }

.totals-hr { height: 1px; background: rgba(255,255,255,.07); margin: 0 2rem; }

.totals-rows { padding: 1.5rem 2rem; display: flex; flex-direction: column; gap: 1rem; }
.totals-row { display: flex; justify-content: space-between; align-items: center; }
.totals-row .l { font-size: .77rem; color: rgba(255,255,255,.33); font-weight: 300; }
.totals-row .v { font-size: .84rem; font-weight: 400; color: rgba(255,255,255,.58); }
.totals-row.free .v { color: #7fd9a0; font-size: .73rem; letter-spacing: .3px; }

.totals-grand-hr { height: 1px; background: rgba(255,255,255,.07); margin: 0 2rem; }

.totals-grand {
  display: flex; justify-content: space-between; align-items: baseline;
  padding: 1.6rem 2rem 0;
}
.totals-grand .l {
  font-family: 'Cormorant Garamond', serif;
  font-size: 1.35rem; color: var(--white); font-weight: 400;
}
.totals-grand .v {
  font-family: 'Cormorant Garamond', serif;
  font-size: 2.1rem; color: var(--gold); font-weight: 500;
}

.checkout-btn {
  display: block;
  margin: 1.8rem 2rem 0;
  background: var(--gold);
  color: var(--ink);
  text-align: center;
  text-decoration: none;
  padding: 1.05rem 1.5rem;
  border-radius: 12px;
  font-family: 'DM Sans', sans-serif;
  font-size: .73rem;
  font-weight: 500;
  letter-spacing: 1.5px;
  text-transform: uppercase;
  transition: background .2s, transform .15s, box-shadow .2s;
}
.checkout-btn:hover {
  background: var(--gold-warm);
  transform: translateY(-2px);
  box-shadow: 0 10px 30px rgba(184,150,62,.35);
}
.checkout-btn:active { transform: translateY(0); }

.continue-link {
  display: block; text-align: center;
  padding: 1.1rem 2rem 1.8rem;
  font-size: .67rem; letter-spacing: 1.5px; text-transform: uppercase;
  color: rgba(255,255,255,.18); text-decoration: none;
  transition: color .2s;
}
.continue-link:hover { color: var(--gold-warm); }

.trust-strip {
  display: flex;
  border-top: 1px solid rgba(255,255,255,.06);
}
.trust-item {
  flex: 1; padding: 1.1rem .5rem;
  display: flex; flex-direction: column; align-items: center; gap: .3rem;
  border-right: 1px solid rgba(255,255,255,.06);
  text-align: center;
}
.trust-item:last-child { border-right: none; }
.trust-icon { font-size: .95rem; opacity: .35; }
.trust-label {
  font-size: .52rem; letter-spacing: 1px; text-transform: uppercase;
  color: rgba(255,255,255,.18);
}

/* ── EMPTY ── */
.empty-wrap {
  grid-column: 1 / -1;
  background: var(--white);
  border: 1px solid var(--rule);
  border-radius: 20px;
  padding: 7rem 2rem;
  text-align: center;
  animation: rise .5s var(--ease) both;
}
.empty-glyph {
  font-family: 'Cormorant Garamond', serif;
  font-size: 6rem; font-weight: 300;
  color: var(--rule); display: block;
  line-height: 1; margin-bottom: 1.5rem;
}
.empty-wrap h2 {
  font-family: 'Cormorant Garamond', serif;
  font-size: 2rem; font-weight: 400; margin-bottom: .5rem;
}
.empty-wrap p {
  font-size: .8rem; color: var(--ink-soft); font-weight: 300;
  max-width: 340px; margin: 0 auto 2.2rem; line-height: 1.75;
}
.empty-cta {
  display: inline-block;
  background: var(--ink); color: var(--white);
  padding: .85rem 2.2rem; border-radius: 10px;
  text-decoration: none; font-size: .72rem; font-weight: 500;
  letter-spacing: 1px; text-transform: uppercase;
  transition: background .2s, transform .15s;
}
.empty-cta:hover { background: var(--gold); color: var(--ink); transform: translateY(-1px); }

/* ── KEYFRAMES ── */
@keyframes rise {
  from { opacity:0; transform:translateY(14px); }
  to   { opacity:1; transform:translateY(0); }
}

/* ── RESPONSIVE ── */
@media (max-width: 980px) {
  nav { padding: 0 1.5rem; }
  .cart-page { padding-left: 1.5rem; padding-right: 1.5rem; }
  .cart-layout { grid-template-columns: 1fr; }
  .totals-panel { position: static; }
}
@media (max-width: 640px) {
  h1.cart-heading { font-size: 2.5rem; }
  nav .nav-links { gap: 1.4rem; }
  table.mj thead { display: none; }
  table.mj tbody tr { display: flex; flex-wrap: wrap; position: relative; }
  table.mj td { padding: .6rem 1rem; }
  .td-rm { position: absolute; top: .6rem; right: .2rem; }
  .td-img { flex-shrink: 0; }
  .td-total { margin-left: auto; }
}
</style>


<nav>
  <a href="{{ route('home') }}" class="logo">MojoLux</a>
  <div class="nav-links">
    <a href="{{ route('store.index') }}">Collections</a>
    <a href="{{ route('wagclub.index') }}">Wag Club</a>
    <a href="{{ route('cart.index') }}" class="active">Cart</a>
    @auth
      <a href="{{ route('profile.index') }}">Profile</a>
    @else
      <a href="{{ route('login') }}">Sign In</a>
    @endauth
  </div>
</nav>

<div class="cart-page">

  <div class="cart-eyebrow">
    <span class="cart-eyebrow-line"></span>
    <span class="cart-eyebrow-text">Your Selection</span>
  </div>
  <h1 class="cart-heading">Your <em>Cart</em></h1>

  @if($cart_data->isEmpty())

    <p class="cart-subhead">Nothing added yet.</p>
    <div class="cart-layout">
      <div class="empty-wrap">
        <span class="empty-glyph">∅</span>
        <h2>Your cart is empty</h2>
        <p>Time to treat your dog to something special. Browse the collection and find their next favourite thing.</p>
        <a href="{{ route('store.index') }}" class="empty-cta">Browse Collections</a>
      </div>
    </div>

  @else

    <p class="cart-subhead">{{ $cart_data->count() }} {{ Str::plural('item', $cart_data->count()) }} ready for checkout</p>

    <div class="cart-layout">

      {{-- ── CART TABLE ── --}}
      <div class="cart-table-shell">
        <table class="mj">
          <thead>
            <tr>
              <th style="width:52px"></th>
              <th style="width:88px"></th>
              <th>Product</th>
              <th>Price</th>
              <th class="c">Qty</th>
              <th style="text-align:right">Total</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($cart_data as $data)
            <tr style="animation-delay:{{ $loop->index * 0.06 }}s">

              {{-- REMOVE — backend untouched --}}
              <td class="td-rm">
                <form class="rm-form" action="{{ route('cart.destroy', ['id' => $data->pivot->id]) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" title="Remove">
                    <i class="ion-ios-close"></i>
                  </button>
                </form>
              </td>

              <td class="td-img">
                <img class="prod-img" src="{{ $data->getImage() }}" alt="{{ $data->title }}">
              </td>

              <td>
                <div class="prod-title">{{ $data->title }}</div>
                <div class="prod-meta">Far far away, behind the word mountains, far from the countries</div>
              </td>

              <td class="td-price">${{ app('CustomHelper')->formatPrice($data->getPrice()) }}</td>

              {{-- QTY — backend untouched --}}
              <td class="td-qty">
                <div class="qty-pill">
                  <input type="text" name="quantity" class="quantity input-number"
                    value="{{ $data->pivot->quantity }}" min="1" max="20">
                </div>
              </td>

              <td class="td-total">${{ app('CustomHelper')->formatPrice($data->getCartQuantityPrice()) }}</td>

            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      {{-- ── TOTALS PANEL ── --}}
      <div class="totals-panel">
        <div class="totals-band"></div>
        <div class="totals-body">
          <div class="totals-eyebrow">
            <span class="totals-eyebrow-line"></span>
            <span class="totals-eyebrow-text">Order Summary</span>
          </div>
          <div class="totals-title">Cart<br><em>Totals</em></div>
        </div>

        <div class="totals-hr"></div>

        <div class="totals-rows">
          <div class="totals-row">
            <span class="l">Subtotal</span>
            <span class="v">${{ app('CustomHelper')->formatPrice($cart_data->getSubtotal()) }}</span>
          </div>
          <div class="totals-row free">
            <span class="l">Delivery</span>
            <span class="v">✦ Free</span>
          </div>
          <div class="totals-row">
            <span class="l">Discount</span>
            <span class="v" style="color:rgba(255,255,255,.2);">—</span>
          </div>
        </div>

        <div class="totals-grand-hr"></div>

        <div class="totals-grand">
          <span class="l">Total</span>
          <span class="v">${{ app('CustomHelper')->formatPrice($cart_data->getTotal()) }}</span>
        </div>

        <a href="{{ route('checkout.index') }}" class="checkout-btn">Proceed to Checkout →</a>
        <a href="{{ route('store.index') }}" class="continue-link">← Continue shopping</a>

        <div class="trust-strip">
          <div class="trust-item">
            <span class="trust-icon">🔒</span>
            <span class="trust-label">Secure</span>
          </div>
          <div class="trust-item">
            <span class="trust-icon">📦</span>
            <span class="trust-label">Free Ship</span>
          </div>
          <div class="trust-item">
            <span class="trust-icon">↩️</span>
            <span class="trust-label">Returns</span>
          </div>
        </div>
      </div>

    </div>
  @endif
</div>

</body>
</html>

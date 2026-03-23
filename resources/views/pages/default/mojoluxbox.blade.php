<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>MojoLux — MojoLux Box</title>
<link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;1,9..40,300&display=swap" rel="stylesheet">
<link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
<style>
:root {
  --ink:        #1A1714;
  --ink-soft:   #5C5650;
  --gold:       #B8963E;
  --gold-warm:  #D4AF6A;
  --gold-pale:  #F7EDD8;
  --gold-faint: #FBF5EA;
  --white:      #FFFFFF;
  --paper:      #FAF7F2;
  --paper-deep: #F2EDE4;
  --rule:       #E8E0D4;
  --nav-h:      74px;
  --ease:       cubic-bezier(.4,0,.2,1);
}
* { margin:0; padding:0; box-sizing:border-box; }
body { font-family:'DM Sans',sans-serif; background:var(--paper); color:var(--ink); -webkit-font-smoothing:antialiased; }

/* ── NAV ── */
.nav-bar { position:fixed; top:0; left:0; right:0; z-index:1000; background:rgba(255,255,255,.97); backdrop-filter:blur(12px); border-bottom:1px solid rgba(212,175,55,.18); padding:1.5rem 3rem; }
.nav-content { display:flex; justify-content:space-between; align-items:center; max-width:1800px; margin:auto; }
.logo { font-family:'DM Serif Display',serif; font-size:1.8rem; font-weight:400; text-decoration:none; color:var(--ink); }
.nav-links { display:flex; gap:3rem; }
.nav-links a { font-size:.75rem; letter-spacing:2px; text-transform:uppercase; color:var(--ink); text-decoration:none; font-weight:500; transition:color .2s; }
.nav-links a:hover { color:var(--gold); }

/* ── HERO ── */
.hero { margin-top:var(--nav-h); background:var(--ink); padding:5rem 3rem 4.5rem; position:relative; overflow:hidden; text-align:center; }
.hero::before { content:''; position:absolute; inset:0; background:radial-gradient(ellipse 60% 50% at 50% 100%, rgba(184,150,62,.1) 0%, transparent 70%); pointer-events:none; }
.hero-eyebrow { display:flex; align-items:center; justify-content:center; gap:.7rem; margin-bottom:1.2rem; animation:rise .5s var(--ease) .1s both; }
.hero-eyebrow-line { width:24px; height:1px; background:var(--gold); }
.hero-eyebrow-text { font-size:.6rem; letter-spacing:3px; text-transform:uppercase; color:var(--gold); font-weight:500; }
.hero-headline { font-family:'DM Serif Display',serif; font-size:3.4rem; font-weight:400; color:var(--white); line-height:1.1; margin-bottom:1rem; animation:rise .5s var(--ease) .2s both; position:relative; }
.hero-headline em { font-style:italic; color:var(--gold-warm); }
.hero-sub { font-size:.9rem; color:rgba(255,255,255,.42); font-weight:300; max-width:500px; margin:0 auto; line-height:1.8; animation:rise .5s var(--ease) .3s both; position:relative; }

/* ── ACTIVE SUBSCRIPTION BANNER ── */
.active-banner { background:var(--gold-faint); border:1px solid var(--gold-pale); border-radius:14px; padding:1.2rem 1.8rem; display:flex; align-items:center; justify-content:space-between; gap:1rem; margin-bottom:2.5rem; flex-wrap:wrap; }
.active-banner-left { display:flex; align-items:center; gap:.8rem; }
.active-dot { width:8px; height:8px; border-radius:50%; background:var(--gold); flex-shrink:0; }
.active-text { font-size:.84rem; color:var(--ink); }
.active-text b { font-weight:500; color:var(--gold); }
.cancel-form button { background:transparent; border:1px solid var(--rule); border-radius:8px; padding:.45rem .9rem; font-size:.72rem; color:var(--ink-soft); cursor:pointer; font-family:'DM Sans',sans-serif; transition:border-color .2s, color .2s; }
.cancel-form button:hover { border-color:#c0392b; color:#c0392b; }

/* ── PAGE BODY ── */
.page-body { max-width:1100px; margin:0 auto; padding:4.5rem 3rem 6rem; }

/* ── PRODUCT DETAIL ── */
.product-detail { display:grid; grid-template-columns:1fr 1.1fr; gap:3.5rem; margin-bottom:4.5rem; align-items:start; }
.product-img { background:var(--paper-deep); border-radius:20px; overflow:hidden; aspect-ratio:4/3; }
.product-img img { width:100%; height:100%; object-fit:cover; display:block; }
.product-info-block { padding-top:.5rem; }
.section-eyebrow { display:flex; align-items:center; gap:.7rem; margin-bottom:.8rem; }
.section-eyebrow-line { width:20px; height:1px; background:var(--gold); }
.section-eyebrow-text { font-size:.58rem; letter-spacing:3px; text-transform:uppercase; color:var(--gold); font-weight:500; }
.product-title { font-family:'DM Serif Display',serif; font-size:2rem; font-weight:400; color:var(--ink); line-height:1.2; margin-bottom:1rem; }
.product-desc { font-size:.85rem; color:var(--ink-soft); font-weight:300; line-height:1.85; margin-bottom:1.8rem; }
.perks-list { display:flex; flex-direction:column; gap:.75rem; }
.perk-item { display:flex; align-items:flex-start; gap:.75rem; }
.perk-dot { width:6px; height:6px; border-radius:50%; background:var(--gold); flex-shrink:0; margin-top:.35rem; }
.perk-text { font-size:.82rem; color:var(--ink-soft); line-height:1.6; }
.perk-text b { color:var(--ink); font-weight:500; }

/* ── PLANS ── */
.plans-section { margin-bottom:4.5rem; }
.plans-section .section-title { font-family:'DM Serif Display',serif; font-size:1.9rem; font-weight:400; color:var(--ink); margin-bottom:.5rem; }
.plans-section .section-sub { font-size:.84rem; color:var(--ink-soft); font-weight:300; line-height:1.75; margin-bottom:2rem; }
.plans-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:1.2rem; }
.plan-card { background:var(--white); border:1px solid var(--rule); border-radius:18px; padding:2rem 1.8rem 1.8rem; position:relative; transition:transform .25s var(--ease), box-shadow .25s var(--ease), border-color .25s var(--ease); }
.plan-card:hover { transform:translateY(-5px); box-shadow:0 16px 40px rgba(26,23,20,.09); }
.plan-card.featured { border-color:var(--gold); border-width:2px; }
.plan-badge { position:absolute; top:-13px; left:50%; transform:translateX(-50%); background:var(--gold); color:var(--ink); font-size:.6rem; font-weight:500; letter-spacing:1.5px; text-transform:uppercase; padding:.3rem .9rem; border-radius:50px; white-space:nowrap; }
.plan-name { font-size:.7rem; letter-spacing:2.5px; text-transform:uppercase; color:var(--gold); font-weight:500; margin-bottom:.6rem; }
.plan-price { font-family:'DM Serif Display',serif; font-size:2.4rem; font-weight:400; color:var(--ink); line-height:1; margin-bottom:.2rem; }
.plan-price span { font-family:'DM Sans',sans-serif; font-size:.82rem; font-weight:400; color:var(--ink-soft); }
.plan-note { font-size:.74rem; color:var(--ink-soft); font-weight:300; margin-bottom:1.5rem; min-height:1.2rem; }
.plan-divider { height:1px; background:var(--rule); margin-bottom:1.5rem; }

/* subscribe form/button */
.plan-form { width:100%; }
.plan-btn {
  width:100%; padding:.75rem; border-radius:10px;
  background:var(--ink); color:var(--white);
  font-family:'DM Sans',sans-serif; font-size:.8rem; font-weight:500;
  border:none; cursor:pointer;
  transition:background .2s, transform .15s;
}
.plan-btn:hover { background:var(--gold); color:var(--ink); transform:translateY(-1px); }
.plan-card.featured .plan-btn { background:var(--gold); color:var(--ink); }
.plan-card.featured .plan-btn:hover { background:var(--gold-warm); }

/* login prompt */
.plan-login { display:block; width:100%; text-align:center; font-size:.75rem; color:var(--ink-soft); padding:.75rem; border:1px solid var(--rule); border-radius:10px; text-decoration:none; transition:border-color .2s, color .2s; }
.plan-login:hover { border-color:var(--gold); color:var(--ink); }

/* ── HOW IT WORKS ── */
.how-section .section-title { font-family:'DM Serif Display',serif; font-size:1.9rem; font-weight:400; color:var(--ink); margin-bottom:.5rem; }
.how-section .section-sub { font-size:.84rem; color:var(--ink-soft); font-weight:300; line-height:1.75; margin-bottom:2rem; }
.how-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:1.4rem; }
.how-card { background:var(--white); border:1px solid var(--rule); border-radius:16px; padding:1.8rem 1.6rem; transition:border-color .2s; }
.how-card:hover { border-color:var(--gold-warm); }
.how-num { font-family:'DM Serif Display',serif; font-size:3rem; font-weight:400; color:var(--paper-deep); line-height:1; margin-bottom:.9rem; }
.how-title { font-size:.9rem; font-weight:500; color:var(--ink); margin-bottom:.4rem; }
.how-desc { font-size:.78rem; color:var(--ink-soft); font-weight:300; line-height:1.75; }

/* ── FLASH MESSAGES ── */
.flash { padding:1rem 1.5rem; border-radius:10px; margin-bottom:1.5rem; font-size:.82rem; }
.flash.success { background:var(--gold-faint); border:1px solid var(--gold-pale); color:var(--ink); }
.flash.error { background:#fff0f0; border:1px solid #ffd0d0; color:#c0392b; }

@keyframes rise { from{opacity:0;transform:translateY(14px);} to{opacity:1;transform:translateY(0);} }

@media(max-width:900px) {
  .product-detail { grid-template-columns:1fr; gap:2rem; }
  .plans-grid { grid-template-columns:1fr; }
  .how-grid { grid-template-columns:1fr; }
  .hero-headline { font-size:2.4rem; }
  .page-body { padding:3rem 1.5rem 5rem; }
  .nav-bar { padding:1.2rem 1.5rem; }
  .nav-links { gap:1.5rem; }
}
</style>
</head>
<body>

<!-- NAV -->
<nav class="nav-bar">
  <div class="nav-content">
    <a href="{{ route('home') }}" class="logo">MojoLux</a>
    <div class="nav-links">
      <a href="{{ route('home') }}">Home</a>
      <a href="{{ route('store.index') }}">Collections</a>
      <a href="{{ route('wagclub.index') }}">Wag Club</a>
      <a href="{{ route('cart.index') }}">Cart</a>
    </div>
  </div>
</nav>

<!-- HERO -->
<div class="hero">
  <div class="hero-eyebrow">
    <span class="hero-eyebrow-line"></span>
    <span class="hero-eyebrow-text">Curated Drops</span>
    <span class="hero-eyebrow-line"></span>
  </div>
  <div class="hero-headline">The <em>MojoLux Box.</em></div>
  <div class="hero-sub">A handpicked selection of premium dog products delivered to your door — new arrivals, limited drops, and exclusive discounts every cycle.</div>
</div>

<!-- PAGE BODY -->
<div class="page-body">

  {{-- Flash messages --}}
  @if(session('message'))
    <div class="flash success">{{ session('message') }}</div>
  @endif
  @if(session('error'))
    <div class="flash error">{{ session('error') }}</div>
  @endif

  {{-- Active subscription banner --}}
  @if(isset($subscription) && $subscription)
    <div class="active-banner">
      <div class="active-banner-left">
        <span class="active-dot"></span>
        <span class="active-text">You're subscribed on the <b>{{ ucfirst($subscription->plan) }}</b> plan — renews {{ $subscription->current_period_end?->format('M d, Y') }}</span>
      </div>
      <form class="cancel-form" action="{{ route('mojoluxbox.cancel') }}" method="POST">
        @csrf
        <button type="submit" onclick="return confirm('Cancel your subscription?')">Cancel subscription</button>
      </form>
    </div>
  @endif

  <!-- PRODUCT DETAIL -->
  <div class="product-detail">
    <div class="product-img">
      {{-- Replace with your image --}}
      <img src="/images/wagclub/mojoluxbox-hero.jpg" alt="MojoLux Box">
    </div>
    <div class="product-info-block">
      <div class="section-eyebrow">
        <span class="section-eyebrow-line"></span>
        <span class="section-eyebrow-text">What's inside</span>
      </div>
      <div class="product-title">Premium picks,<br>curated for your pup.</div>
      <p class="product-desc">The MojoLux Box is a curated selection of premium, hand-picked items from our collection — delivered on your schedule. Each box contains a unique assortment of luxury goods, from exclusive apparel to limited-edition accessories your dog will actually love.</p>
      <div class="perks-list">
        <div class="perk-item"><span class="perk-dot"></span><span class="perk-text"><b>Exclusive items</b> — products not available anywhere else in the store.</span></div>
        <div class="perk-item"><span class="perk-dot"></span><span class="perk-text"><b>High quality</b> — only the finest materials and ingredients make the cut.</span></div>
        <div class="perk-item"><span class="perk-dot"></span><span class="perk-text"><b>Surprise &amp; delight</b> — a new theme and selection every cycle.</span></div>
        <div class="perk-item"><span class="perk-dot"></span><span class="perk-text"><b>Value</b> — get more for less with our specially priced boxes.</span></div>
      </div>
    </div>
  </div>

  <!-- PLANS -->
  <div class="plans-section">
    <div class="section-eyebrow">
      <span class="section-eyebrow-line"></span>
      <span class="section-eyebrow-text">Subscription Options</span>
    </div>
    <div class="section-title">Pick your plan.</div>
    <p class="section-sub">Subscribe and save — the longer the plan, the better the deal. Cancel anytime.</p>

    <div class="plans-grid">

      <!-- Monthly -->
      <div class="plan-card">
        <div class="plan-name">Monthly</div>
        <div class="plan-price">$49 <span>/month</span></div>
        <div class="plan-note">Cancel anytime. Perfect for trying it out.</div>
        <div class="plan-divider"></div>
        @auth
          @if(!isset($subscription) || !$subscription)
            <form class="plan-form" action="{{ route('mojoluxbox.subscribe') }}" method="POST">
              @csrf
              <input type="hidden" name="plan" value="monthly">
              <button type="submit" class="plan-btn">Subscribe Now</button>
            </form>
          @else
            <button class="plan-btn" disabled style="opacity:.4;cursor:not-allowed;">Already subscribed</button>
          @endif
        @else
          <a href="{{ route('login') }}" class="plan-login">Log in to subscribe</a>
        @endauth
      </div>

      <!-- Quarterly -->
      <div class="plan-card featured">
        <span class="plan-badge">Most Popular</span>
        <div class="plan-name">Quarterly</div>
        <div class="plan-price">$135 <span>/3 months</span></div>
        <div class="plan-note">Save $12! Billed every 3 months.</div>
        <div class="plan-divider"></div>
        @auth
          @if(!isset($subscription) || !$subscription)
            <form class="plan-form" action="{{ route('mojoluxbox.subscribe') }}" method="POST">
              @csrf
              <input type="hidden" name="plan" value="quarterly">
              <button type="submit" class="plan-btn">Subscribe Now</button>
            </form>
          @else
            <button class="plan-btn" disabled style="opacity:.4;cursor:not-allowed;">Already subscribed</button>
          @endif
        @else
          <a href="{{ route('login') }}" class="plan-login">Log in to subscribe</a>
        @endauth
      </div>

      <!-- Annually -->
      <div class="plan-card">
        <div class="plan-name">Annually</div>
        <div class="plan-price">$480 <span>/year</span></div>
        <div class="plan-note">Save $108! Best value, billed annually.</div>
        <div class="plan-divider"></div>
        @auth
          @if(!isset($subscription) || !$subscription)
            <form class="plan-form" action="{{ route('mojoluxbox.subscribe') }}" method="POST">
              @csrf
              <input type="hidden" name="plan" value="annually">
              <button type="submit" class="plan-btn">Subscribe Now</button>
            </form>
          @else
            <button class="plan-btn" disabled style="opacity:.4;cursor:not-allowed;">Already subscribed</button>
          @endif
        @else
          <a href="{{ route('login') }}" class="plan-login">Log in to subscribe</a>
        @endauth
      </div>

    </div>
  </div>

  <!-- HOW IT WORKS -->
  <div class="how-section">
    <div class="section-eyebrow">
      <span class="section-eyebrow-line"></span>
      <span class="section-eyebrow-text">How it works</span>
    </div>
    <div class="section-title">Simple as that.</div>
    <p class="section-sub">Three steps between you and a box of premium picks at your door.</p>
    <div class="how-grid">
      <div class="how-card">
        <div class="how-num">01</div>
        <div class="how-title">Choose your plan</div>
        <p class="how-desc">Pick the monthly, quarterly, or annual subscription that best fits your budget and commitment.</p>
      </div>
      <div class="how-card">
        <div class="how-num">02</div>
        <div class="how-title">Receive your box</div>
        <p class="how-desc">We carefully pack and ship your MojoLux Box directly to your doorstep each cycle.</p>
      </div>
      <div class="how-card">
        <div class="how-num">03</div>
        <div class="how-title">Enjoy &amp; discover</div>
        <p class="how-desc">Unbox a world of luxury and enjoy your dog's new favourite products — a new surprise every time.</p>
      </div>
    </div>
  </div>

</div>
</body>
</html>

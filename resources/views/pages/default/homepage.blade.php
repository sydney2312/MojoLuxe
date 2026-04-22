<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MojoLux — Luxury Dog Fashion</title>
  <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;1,9..40,300&display=swap" rel="stylesheet">
  <style>
    :root {
      --ink:         #1A1714;
      --ink-soft:    #5C5650;
      --gold:        #B8963E;
      --gold-warm:   #D4AF6A;
      --gold-pale:   #F7EDD8;
      --gold-faint:  #FBF5EA;
      --white:       #FFFFFF;
      --paper:       #FAF7F2;
      --paper-deep:  #F2EDE4;
      --rule:        #E8E0D4;
      --ease:        cubic-bezier(.4,0,.2,1);
      --nav-h:       72px;
    }

    *, *::before, *::after { margin:0; padding:0; box-sizing:border-box; }
    html { scroll-behavior: smooth; }
    body { font-family:'DM Sans', sans-serif; background:var(--paper); color:var(--ink); -webkit-font-smoothing:antialiased; }

    /* ── NAV ─────────────────────────────────────── */
    .nav-bar {
      position: fixed; top:0; left:0; right:0; z-index:1000;
      background: rgba(250,247,242,.96);
      backdrop-filter: blur(16px);
      border-bottom: 1px solid rgba(184,150,62,.15);
      padding: 0 3rem;
      height: var(--nav-h);
      display: flex; align-items: center; justify-content: space-between;
    }

    .logo {
      font-family: 'DM Serif Display', serif;
      font-size: 1.75rem; font-weight: 400;
      text-decoration: none; color: var(--ink);
      letter-spacing: .02em;
    }
    .logo em { font-style: italic; color: var(--gold); }

    .nav-links { display: flex; align-items: center; gap: 2.5rem; }
    .nav-links a {
      font-size: .72rem; letter-spacing: 2px; text-transform: uppercase;
      color: var(--ink); text-decoration: none; font-weight: 500;
      transition: color .2s;
    }
    .nav-links a:hover { color: var(--gold); }

    /* Profile dropdown */
    .nav-profile { position: relative; }
    .nav-profile-trigger {
      display: flex; align-items: center; gap: .4rem;
      font-size: .72rem; letter-spacing: 2px; text-transform: uppercase;
      color: var(--ink); font-weight: 500; cursor: pointer;
      background: none; border: none; font-family: 'DM Sans', sans-serif;
      padding: 0; transition: color .2s;
    }
    .nav-profile-trigger:hover { color: var(--gold); }
    .nav-profile-trigger svg { transition: transform .2s var(--ease); }
    .nav-profile.open .nav-profile-trigger { color: var(--gold); }
    .nav-profile.open .nav-profile-trigger svg { transform: rotate(180deg); }

    .nav-dropdown {
      position: absolute; top: calc(100% + 12px); right: 0;
      background: var(--white);
      border: 1px solid var(--rule);
      border-radius: 12px;
      min-width: 170px;
      box-shadow: 0 12px 40px rgba(26,23,20,.14);
      opacity: 0; pointer-events: none;
      transform: translateY(-8px);
      transition: opacity .2s var(--ease), transform .2s var(--ease);
      overflow: hidden;
      z-index: 200;
    }
    .nav-profile.open .nav-dropdown {
      opacity: 1; pointer-events: auto; transform: translateY(0);
    }
    .nav-dropdown a,
    .nav-dropdown button {
      display: block; width: 100%;
      padding: .8rem 1.2rem;
      font-family: 'DM Sans', sans-serif;
      font-size: .82rem; font-weight: 400; text-align: left;
      color: var(--ink); text-decoration: none; background: none; border: none;
      cursor: pointer; transition: background .15s, color .15s;
      line-height: 1;
    }
    .nav-dropdown a:hover,
    .nav-dropdown button:hover { background: var(--gold-faint); color: var(--gold); }
    .nav-dropdown hr { border: none; border-top: 1px solid var(--rule); margin: 0; }
    .nav-dropdown .logout { color: var(--ink-soft); }
    .nav-dropdown .logout:hover { color: #c0392b; background: #fff5f5; }

    /* ── HERO (keep existing image/structure, restyle below) ──────── */
    .hero {
      margin-top: var(--nav-h);
      background: var(--paper);
      padding: 90px 3rem 80px;
      overflow: hidden;
    }
    .hero-inner {
      max-width: 1180px; margin: 0 auto;
      display: grid; grid-template-columns: 1fr 1fr;
      gap: 60px; align-items: center;
    }
    .hero-eyebrow {
      display: flex; align-items: center; gap: .7rem; margin-bottom: 1.4rem;
      animation: rise .5s var(--ease) .1s both;
    }
    .hero-eyebrow-line { width: 22px; height: 1px; background: var(--gold); }
    .hero-eyebrow-text { font-size: .58rem; letter-spacing: 3px; text-transform: uppercase; color: var(--gold); font-weight: 500; }

    .hero-text h1 {
      font-family: 'DM Serif Display', serif;
      font-size: 3.8rem; font-weight: 400; line-height: 1.1;
      color: var(--ink); margin-bottom: 1.4rem;
      animation: rise .5s var(--ease) .2s both;
    }
    .hero-text h1 em { font-style: italic; color: var(--gold); }
    .hero-sub {
      font-size: .88rem; color: var(--ink-soft); font-weight: 300; line-height: 1.85;
      max-width: 380px; margin-bottom: 2.2rem;
      animation: rise .5s var(--ease) .3s both;
    }
    .hero-actions {
      display: flex; gap: 1rem; align-items: center;
      animation: rise .5s var(--ease) .4s both;
    }
    .btn-primary {
      display: inline-flex; align-items: center; gap: .45rem;
      background: var(--ink); color: var(--white);
      padding: .85rem 2rem; border-radius: 50px;
      font-size: .78rem; font-weight: 500; letter-spacing: .5px;
      text-decoration: none; transition: background .2s, transform .15s, box-shadow .2s;
    }
    .btn-primary:hover { background: var(--gold); color: var(--ink); transform: translateY(-2px); box-shadow: 0 8px 24px rgba(184,150,62,.3); }
    .btn-ghost {
      display: inline-flex; align-items: center; gap: .45rem;
      border: 1.5px solid var(--rule); color: var(--ink);
      padding: .82rem 1.8rem; border-radius: 50px;
      font-size: .78rem; font-weight: 500;
      text-decoration: none; transition: border-color .2s, color .2s;
    }
    .btn-ghost:hover { border-color: var(--gold); color: var(--gold); }

    .hero-image {
      position: relative; display: flex; justify-content: center;
      animation: rise .6s var(--ease) .2s both;
    }
    .image-wrap {
      background: var(--white); border-radius: 28px;
      padding: 20px; position: relative; z-index: 2;
      box-shadow: 0 24px 64px rgba(26,23,20,.1);
    }
    .image-wrap img { width: 340px; border-radius: 20px; display: block; }
    .hero-accent {
      position: absolute; width: 310px; height: 390px;
      background: linear-gradient(135deg, rgba(184,150,62,.12) 0%, rgba(212,175,106,.06) 100%);
      top: -30px; right: -10px; border-radius: 28px; z-index: 1;
    }

    /* ── MARQUEE STRIP ───────────────────────────── */
    .marquee-strip {
      background: var(--ink); overflow: hidden;
      padding: .95rem 0; border-top: 1px solid rgba(255,255,255,.05);
    }
    .marquee-track {
      display: flex; gap: 3.5rem;
      animation: marquee 28s linear infinite;
      width: max-content;
    }
    .marquee-item {
      display: flex; align-items: center; gap: .75rem;
      font-size: .62rem; letter-spacing: 2.5px; text-transform: uppercase;
      color: rgba(255,255,255,.45); white-space: nowrap; font-weight: 500;
    }
    .marquee-dot { width: 4px; height: 4px; border-radius: 50%; background: var(--gold); flex-shrink: 0; }
    @keyframes marquee { from { transform: translateX(0); } to { transform: translateX(-50%); } }

    /* ── SECTION COMMONS ─────────────────────────── */
    .section-eyebrow { display: flex; align-items: center; gap: .7rem; margin-bottom: .7rem; }
    .section-eyebrow-line { width: 20px; height: 1px; background: var(--gold); }
    .section-eyebrow-text { font-size: .58rem; letter-spacing: 3px; text-transform: uppercase; color: var(--gold); font-weight: 500; }
    .section-title { font-family: 'DM Serif Display', serif; font-size: 2.1rem; font-weight: 400; color: var(--ink); margin-bottom: .5rem; }
    .section-sub { font-size: .84rem; color: var(--ink-soft); font-weight: 300; line-height: 1.8; }

    /* ── TRENDING CARDS ──────────────────────────── */
    .trending { padding: 5rem 3rem; }
    .trending-inner { max-width: 1180px; margin: 0 auto; }
    .trending-header { display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 2.8rem; }
    .trending-header a { font-size: .72rem; letter-spacing: 1.5px; text-transform: uppercase; color: var(--gold); text-decoration: none; font-weight: 500; border-bottom: 1px solid transparent; transition: border-color .2s; }
    .trending-header a:hover { border-color: var(--gold); }

    .cards-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.4rem; }

    .product-card {
      background: var(--white); border: 1px solid var(--rule);
      border-radius: 18px; overflow: hidden;
      transition: transform .28s var(--ease), box-shadow .28s var(--ease), border-color .28s var(--ease);
      text-decoration: none; color: inherit;
      display: flex; flex-direction: column;
    }
    .product-card:hover { transform: translateY(-7px); box-shadow: 0 20px 50px rgba(26,23,20,.1); border-color: var(--gold-warm); }
    .product-card-img { height: 230px; overflow: hidden; background: var(--paper-deep); }
    .product-card-img img { width: 100%; height: 100%; object-fit: cover; transition: transform .5s var(--ease); display: block; }
    .product-card:hover .product-card-img img { transform: scale(1.07); }
    .product-card-body { padding: 1.4rem 1.6rem 1.6rem; flex: 1; display: flex; flex-direction: column; }
    .product-card-cat { font-size: .58rem; letter-spacing: 2.5px; text-transform: uppercase; color: var(--gold); font-weight: 500; margin-bottom: .3rem; }
    .product-card-name { font-family: 'DM Serif Display', serif; font-size: 1.2rem; font-weight: 400; color: var(--ink); margin-bottom: .4rem; line-height: 1.3; }
    .product-card-desc { font-size: .78rem; color: var(--ink-soft); font-weight: 300; line-height: 1.7; flex: 1; margin-bottom: 1.2rem; }
    .product-card-footer { display: flex; justify-content: space-between; align-items: center; padding-top: 1rem; border-top: 1px solid var(--rule); }
    .product-card-link { font-size: .72rem; font-weight: 500; letter-spacing: .5px; color: var(--ink); display: flex; align-items: center; gap: .35rem; transition: color .2s; }
    .product-card-link:hover { color: var(--gold); }
    .product-card-link svg { transition: transform .2s; }
    .product-card-link:hover svg { transform: translateX(3px); }

    /* ── SPLIT FEATURE SECTIONS ──────────────────── */
    .split-section {
      padding: 5rem 3rem;
      background: var(--white);
      border-top: 1px solid var(--rule);
      border-bottom: 1px solid var(--rule);
    }
    .split-inner {
      max-width: 1180px; margin: 0 auto;
      display: grid; grid-template-columns: 1fr 1fr;
      gap: 5rem; align-items: center;
    }
    .split-inner.reverse { direction: rtl; }
    .split-inner.reverse > * { direction: ltr; }

    .split-visual {
      position: relative;
    }
    .split-visual-bg {
      background: var(--paper-deep);
      border-radius: 24px; overflow: hidden;
      aspect-ratio: 4/3;
    }
    .split-visual-bg img { width: 100%; height: 100%; object-fit: cover; display: block; }
    .split-badge {
      position: absolute; bottom: -16px; right: -16px;
      background: var(--ink); color: var(--gold);
      border-radius: 50%; width: 90px; height: 90px;
      display: flex; flex-direction: column; align-items: center; justify-content: center;
      font-family: 'DM Serif Display', serif;
      box-shadow: 0 8px 24px rgba(26,23,20,.18);
    }
    .split-badge-num { font-size: 1.5rem; font-weight: 400; line-height: 1; }
    .split-badge-label { font-size: .45rem; letter-spacing: 1.5px; text-transform: uppercase; color: rgba(255,255,255,.5); font-family: 'DM Sans', sans-serif; font-weight: 500; margin-top: .15rem; }

    .split-content { padding: 1rem 0; }
    .split-content .section-title { font-size: 2.4rem; margin-bottom: .8rem; line-height: 1.15; }
    .split-content .section-title em { font-style: italic; color: var(--gold); }
    .split-content .section-sub { margin-bottom: 2rem; max-width: 380px; }

    .perks-list { display: flex; flex-direction: column; gap: .7rem; margin-bottom: 2rem; }
    .perk-item { display: flex; align-items: flex-start; gap: .75rem; }
    .perk-dot { width: 5px; height: 5px; background: var(--gold); border-radius: 50%; flex-shrink: 0; margin-top: .45rem; }
    .perk-text { font-size: .82rem; color: var(--ink-soft); font-weight: 300; line-height: 1.6; }
    .perk-text b { color: var(--ink); font-weight: 500; }

    /* ── WAG CLUB DARK BAND ──────────────────────── */
    .wag-band {
      background: var(--ink); padding: 5rem 3rem;
      position: relative; overflow: hidden;
    }
    .wag-band::before {
      content: ''; position: absolute; inset: 0;
      background: radial-gradient(ellipse 55% 70% at 80% 50%, rgba(184,150,62,.1) 0%, transparent 70%);
      pointer-events: none;
    }
    .wag-inner {
      max-width: 1180px; margin: 0 auto;
      display: flex; align-items: center; justify-content: space-between; gap: 3rem;
      position: relative; z-index: 1;
    }
    .wag-left { max-width: 520px; }
    .wag-eyebrow { display: flex; align-items: center; gap: .7rem; margin-bottom: 1rem; }
    .wag-eyebrow-line { width: 20px; height: 1px; background: var(--gold); }
    .wag-eyebrow-text { font-size: .58rem; letter-spacing: 3px; text-transform: uppercase; color: var(--gold); font-weight: 500; }
    .wag-title { font-family: 'DM Serif Display', serif; font-size: 2.8rem; font-weight: 400; color: var(--white); line-height: 1.1; margin-bottom: .8rem; }
    .wag-title em { font-style: italic; color: var(--gold-warm); }
    .wag-sub { font-size: .85rem; color: rgba(255,255,255,.38); font-weight: 300; line-height: 1.85; }

    .wag-cards { display: flex; flex-direction: column; gap: 1rem; flex-shrink: 0; }
    .wag-card {
      background: rgba(255,255,255,.05); border: 1px solid rgba(255,255,255,.1);
      border-radius: 14px; padding: 1.2rem 1.5rem;
      display: flex; align-items: center; gap: 1rem;
      width: 280px; transition: border-color .2s, background .2s;
      text-decoration: none; color: inherit;
    }
    .wag-card:hover { border-color: rgba(184,150,62,.4); background: rgba(184,150,62,.06); }
    .wag-card-icon { width: 38px; height: 38px; background: rgba(184,150,62,.15); border-radius: 9px; display: grid; place-items: center; font-size: 1rem; flex-shrink: 0; }
    .wag-card-title { font-size: .82rem; font-weight: 500; color: var(--white); margin-bottom: .2rem; }
    .wag-card-sub { font-size: .72rem; color: rgba(255,255,255,.35); font-weight: 300; line-height: 1.4; }

    .wag-cta-wrap { margin-top: 2rem; }

    /* ── MOJOLUX BOX TEASER ──────────────────────── */
    .box-teaser {
      padding: 5rem 3rem;
      background: var(--paper);
    }
    .box-inner {
      max-width: 1180px; margin: 0 auto;
    }
    .box-grid {
      background: var(--gold-faint);
      border: 1px solid var(--gold-pale);
      border-radius: 24px;
      display: grid; grid-template-columns: 1.1fr 1fr;
      overflow: hidden;
    }
    .box-visual { background: var(--paper-deep); min-height: 320px; overflow: hidden; }
    .box-visual img { width: 100%; height: 100%; object-fit: cover; display: block; }
    .box-content { padding: 3rem; display: flex; flex-direction: column; justify-content: center; }
    .box-content .section-title { font-size: 2rem; margin-bottom: .7rem; }
    .box-content .section-title em { font-style: italic; color: var(--gold); }
    .box-content .section-sub { margin-bottom: 1.8rem; }
    .box-plans { display: flex; gap: .8rem; flex-wrap: wrap; margin-bottom: 2rem; }
    .box-plan-pill {
      background: var(--white); border: 1px solid var(--rule);
      border-radius: 50px; padding: .4rem 1rem;
      font-size: .72rem; font-weight: 500; color: var(--ink-soft);
    }
    .box-plan-pill b { color: var(--ink); }

    /* ── FOOTER ──────────────────────────────────── */
    footer {
      background: var(--ink); padding: 2.5rem 3rem;
      display: flex; justify-content: space-between; align-items: center;
      border-top: 1px solid rgba(255,255,255,.06);
    }
    .footer-logo { font-family: 'DM Serif Display', serif; font-size: 1.4rem; color: var(--white); text-decoration: none; }
    .footer-logo em { font-style: italic; color: var(--gold); }
    footer p { font-size: .72rem; color: rgba(255,255,255,.3); font-weight: 300; }

    /* ── ANIMATIONS ──────────────────────────────── */
    @keyframes rise { from { opacity:0; transform: translateY(14px); } to { opacity:1; transform: translateY(0); } }

    /* ── RESPONSIVE ──────────────────────────────── */
    @media (max-width: 1024px) {
      .hero-inner, .split-inner, .wag-inner { grid-template-columns: 1fr; gap: 2.5rem; }
      .split-inner.reverse { direction: ltr; }
      .image-wrap img { width: 100%; max-width: 360px; }
      .wag-inner { flex-direction: column; align-items: flex-start; }
      .wag-cards { flex-direction: row; flex-wrap: wrap; width: 100%; }
      .wag-card { width: auto; flex: 1; min-width: 200px; }
      .box-grid { grid-template-columns: 1fr; }
      .box-visual { min-height: 240px; }
      .cards-grid { grid-template-columns: 1fr 1fr; }
    }
    @media (max-width: 680px) {
      .nav-bar { padding: 0 1.2rem; }
      .nav-links { gap: 1.2rem; }
      .nav-links a { font-size: .65rem; }
      .hero { padding: 60px 1.2rem 50px; }
      .hero-text h1 { font-size: 2.6rem; }
      .trending, .split-section, .wag-band, .box-teaser { padding: 3.5rem 1.2rem; }
      .cards-grid { grid-template-columns: 1fr; }
      footer { flex-direction: column; gap: .8rem; text-align: center; padding: 2rem 1.2rem; }
    }
  </style>
</head>
<body>

  <!-- ── NAV ── -->
  <nav class="nav-bar">
    <a href="{{ route('home') }}" class="logo">Mojo<em>Lux</em></a>

    <div class="nav-links">
      <a href="{{ route('store.index') }}">Collections</a>
      <a href="{{ route('dressup') }}">Style Lab</a>
      <a href="{{ route('wagclub.index') }}">Wag Club</a>
      <a href="{{ route('cart.index') }}">Cart</a>

      @auth
        <div class="nav-profile">
          <button class="nav-profile-trigger">
            Profile
            <svg width="10" height="6" viewBox="0 0 10 6" fill="none">
              <path d="M1 1l4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </button>
          <div class="nav-dropdown">
            <a href="{{ route('profile.index') }}">My Profile</a>
            <a href="{{ route('wagclub.index') }}">Wag Club</a>
            <hr>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="logout">Sign Out</button>
            </form>
          </div>
        </div>
      @else
        <a href="{{ route('login') }}">Sign In</a>
      @endauth
    </div>
  </nav>

  <!-- ── HERO (kept intact, just restyled) ── -->
  <section class="hero">
    <div class="hero-inner">
      <div class="hero-text">
        <div class="hero-eyebrow">
          <span class="hero-eyebrow-line"></span>
          <span class="hero-eyebrow-text">Luxury Dogwear</span>
        </div>
        <h1>
          Crafted for dogs<br>
          who don't <em>blend in.</em>
        </h1>
        <p class="hero-sub">Premium dog fashion made for the pup that turns heads. Every piece is designed with the same attention you'd give yourself.</p>
        <div class="hero-actions">
          <a href="{{ route('store.index') }}" class="btn-primary">
            View Collection
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M2 7h10M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </a>
          @guest
            <a href="{{ route('register') }}" class="btn-ghost">Create Account</a>
          @endguest
        </div>
      </div>

      <div class="hero-image">
        <div class="image-wrap">
          <img src="{{ asset('template_default/images/mojo-img1.png') }}" alt="MojoLux dog">
        </div>
        <div class="hero-accent"></div>
      </div>
    </div>
  </section>

  <!-- ── MARQUEE STRIP ── -->
  <div class="marquee-strip">
    <div class="marquee-track">
      @foreach(range(1, 2) as $i)
        <span class="marquee-item"><span class="marquee-dot"></span>Luxury Dogwear</span>
        <span class="marquee-item"><span class="marquee-dot"></span>Handpicked Drops</span>
        <span class="marquee-item"><span class="marquee-dot"></span>Style Lab</span>
        <span class="marquee-item"><span class="marquee-dot"></span>Wag Club Rewards</span>
        <span class="marquee-item"><span class="marquee-dot"></span>Free Shipping Over $120</span>
        <span class="marquee-item"><span class="marquee-dot"></span>Premium Materials</span>
        <span class="marquee-item"><span class="marquee-dot"></span>New Arrivals Weekly</span>
        <span class="marquee-item"><span class="marquee-dot"></span>MojoLux Box</span>
      @endforeach
    </div>
  </div>

  <!-- ── TRENDING NOW ── -->
  <section class="trending">
    <div class="trending-inner">
      <div class="trending-header">
        <div>
          <div class="section-eyebrow">
            <span class="section-eyebrow-line"></span>
            <span class="section-eyebrow-text">New Arrivals</span>
          </div>
          <div class="section-title">Trending Now</div>
        </div>
        <a href="{{ route('store.index') }}">View all →</a>
      </div>

      <div class="cards-grid">
        <a href="{{ route('store.index') }}" class="product-card">
          <div class="product-card-img">
            <img src="{{ asset('template_default/images/product-1.jpg') }}" alt="Golden Pup Coat">
          </div>
          <div class="product-card-body">
            <div class="product-card-cat">Winter Collection</div>
            <div class="product-card-name">Golden Pup Coat</div>
            <p class="product-card-desc">An exclusive winter outer for your little luxury dog. Insulated, tailored, unforgettable.</p>
            <div class="product-card-footer">
              <span class="product-card-link">
                View Outfit
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M2 7h10M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </span>
            </div>
          </div>
        </a>

        <a href="{{ route('store.index') }}" class="product-card">
          <div class="product-card-img">
            <img src="{{ asset('template_default/images/product-2.jpg') }}" alt="Velvet Bow Tie">
          </div>
          <div class="product-card-body">
            <div class="product-card-cat">Accessories</div>
            <div class="product-card-name">Velvet Bow Tie</div>
            <p class="product-card-desc">Add instant charm and occasion-ready style with a single accessory.</p>
            <div class="product-card-footer">
              <span class="product-card-link">
                View Outfit
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M2 7h10M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </span>
            </div>
          </div>
        </a>

        <a href="{{ route('store.index') }}" class="product-card">
          <div class="product-card-img">
            <img src="{{ asset('template_default/images/product-3.jpg') }}" alt="Cozy Sweater">
          </div>
          <div class="product-card-body">
            <div class="product-card-cat">Knitwear</div>
            <div class="product-card-name">Cozy Sweater</div>
            <p class="product-card-desc">Soft merino-blend knit, built for winter walks and maximum cuddles.</p>
            <div class="product-card-footer">
              <span class="product-card-link">
                View Outfit
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M2 7h10M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </span>
            </div>
          </div>
        </a>
      </div>
    </div>
  </section>

  <!-- ── STYLE LAB SPLIT ── -->
  <section class="split-section">
    <div class="split-inner">
      <div class="split-visual">
        <div class="split-visual-bg">
          <img src="{{ asset('template_default/images/dressup.png') }}" alt="Style Lab">
        </div>
        <div class="split-badge">
          <span class="split-badge-num">∞</span>
          <span class="split-badge-label">Looks</span>
        </div>
      </div>
      <div class="split-content">
        <div class="section-eyebrow">
          <span class="section-eyebrow-line"></span>
          <span class="section-eyebrow-text">Virtual Stylist</span>
        </div>
        <div class="section-title">Style Your<br><em>Dog First.</em></div>
        <p class="section-sub">Mix outfits, try accessories, and preview the full look on your virtual pup before anything ships. Your personal runway — on demand.</p>
        <div class="perks-list">
          <div class="perk-item"><span class="perk-dot"></span><span class="perk-text"><b>Try before you buy</b> — see every item on a dog, not a hanger.</span></div>
          <div class="perk-item"><span class="perk-dot"></span><span class="perk-text"><b>Earn points</b> — every styling session adds to your Wag Club balance.</span></div>
          <div class="perk-item"><span class="perk-dot"></span><span class="perk-text"><b>Save your looks</b> — build a wardrobe and come back to it anytime.</span></div>
        </div>
        <a href="{{ route('dressup') }}" class="btn-primary">Go to Style Lab</a>
      </div>
    </div>
  </section>

  <!-- ── WAG CLUB DARK BAND ── -->
  <section class="wag-band">
    <div class="wag-inner">
      <div class="wag-left">
        <div class="wag-eyebrow">
          <span class="wag-eyebrow-line"></span>
          <span class="wag-eyebrow-text">Rewards Programme</span>
        </div>
        <div class="wag-title">Play. Style.<br><em>Earn.</em></div>
        <p class="wag-sub">Join the Wag Club and every action — styling, shopping, challenges — puts points in your pocket. Spend them at checkout, no expiry.</p>
        <div class="wag-cta-wrap">
          <a href="{{ route('wagclub.index') }}" class="btn-primary">Explore Wag Club</a>
        </div>
      </div>
      <div class="wag-cards">
        <a href="{{ route('dressup') }}" class="wag-card">
          <div class="wag-card-icon">✦</div>
          <div>
            <div class="wag-card-title">Style Lab</div>
            <div class="wag-card-sub">Dress up &amp; earn points per look</div>
          </div>
        </a>
        <a href="{{ route('wagclub.index') }}" class="wag-card">
          <div class="wag-card-icon">◈</div>
          <div>
            <div class="wag-card-title">Mini Challenges</div>
            <div class="wag-card-sub">Weekly quests, instant rewards</div>
          </div>
        </a>
        <a href="{{ route('store.index') }}" class="wag-card">
          <div class="wag-card-icon">◉</div>
          <div>
            <div class="wag-card-title">Shop &amp; Stack</div>
            <div class="wag-card-sub">Points on every order you place</div>
          </div>
        </a>
      </div>
    </div>
  </section>

  <!-- ── MOJOLUX BOX TEASER ── -->
  <section class="box-teaser">
    <div class="box-inner">
      <div class="box-grid">
        <div class="box-visual">
          <img src="{{ asset('template_default/images/mojoluxbox.png') }}" alt="MojoLux Box">
        </div>
        <div class="box-content">
          <div class="section-eyebrow">
            <span class="section-eyebrow-line"></span>
            <span class="section-eyebrow-text">Curated Drops</span>
          </div>
          <div class="section-title">The <em>MojoLux</em><br>Box.</div>
          <p class="section-sub">A handpicked box of premium dog products delivered on your schedule — exclusive items, new-arrival drops, and surprise picks every cycle.</p>
          <div class="box-plans">
            <span class="box-plan-pill"><b>$49</b> / month</span>
            <span class="box-plan-pill"><b>$135</b> / quarter</span>
            <span class="box-plan-pill"><b>$480</b> / year</span>
          </div>
          <a href="{{ route('mojoluxbox') }}" class="btn-primary">Discover the Box</a>
        </div>
      </div>
    </div>
  </section>

  <!-- ── FOOTER ── -->
  <footer>
    <a href="{{ route('home') }}" class="footer-logo">Mojo<em>Lux</em></a>
    <p>&copy; {{ date('Y') }} MojoLux. All rights reserved.</p>
  </footer>

  <script>
    // Profile dropdown — click/tap toggle
    const profileWrap = document.querySelector('.nav-profile');
    const trigger = profileWrap && profileWrap.querySelector('.nav-profile-trigger');

    if (trigger) {
      trigger.addEventListener('click', function(e) {
        e.stopPropagation();
        profileWrap.classList.toggle('open');
      });

      // Close when clicking anywhere else
      document.addEventListener('click', function() {
        profileWrap.classList.remove('open');
      });

      // Prevent clicks inside the dropdown from closing it
      profileWrap.querySelector('.nav-dropdown').addEventListener('click', function(e) {
        e.stopPropagation();
      });
    }
  </script>
</body>
</html>

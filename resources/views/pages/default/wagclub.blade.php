<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>MojoLux — Wag Club</title>

<link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;1,9..40,300&display=swap" rel="stylesheet">
<link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

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
  --nav-h:       74px;
  --ease:        cubic-bezier(.4,0,.2,1);
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
.hero {
  margin-top:var(--nav-h);
  background:var(--ink);
  padding:5rem 3rem 4.5rem;
  position:relative;
  overflow:hidden;
  text-align:center;
}
.hero::before {
  content:'';
  position:absolute;
  inset:0;
  background:radial-gradient(ellipse 60% 50% at 50% 100%, rgba(184,150,62,.1) 0%, transparent 70%);
  pointer-events:none;
}
.hero-eyebrow { display:flex; align-items:center; justify-content:center; gap:.7rem; margin-bottom:1.2rem; animation:rise .5s var(--ease) .1s both; }
.hero-eyebrow-line { width:24px; height:1px; background:var(--gold); }
.hero-eyebrow-text { font-size:.6rem; letter-spacing:3px; text-transform:uppercase; color:var(--gold); font-weight:500; }
.hero-headline { font-family:'DM Serif Display',serif; font-size:3.4rem; font-weight:400; color:var(--white); line-height:1.1; margin-bottom:1rem; animation:rise .5s var(--ease) .2s both; position:relative; }
.hero-headline em { font-style:italic; color:var(--gold-warm); }
.hero-sub { font-size:.9rem; color:rgba(255,255,255,.42); font-weight:300; max-width:480px; margin:0 auto; line-height:1.8; animation:rise .5s var(--ease) .3s both; position:relative; }

/* ── PAGE BODY ── */
.page-body { max-width:1200px; margin:0 auto; padding:4.5rem 3rem 6rem; }

/* ── SECTION LABEL ── */
.section-eyebrow { display:flex; align-items:center; gap:.7rem; margin-bottom:.8rem; }
.section-eyebrow-line { width:20px; height:1px; background:var(--gold); }
.section-eyebrow-text { font-size:.58rem; letter-spacing:3px; text-transform:uppercase; color:var(--gold); font-weight:500; }
.section-title { font-family:'DM Serif Display',serif; font-size:1.9rem; font-weight:400; color:var(--ink); margin-bottom:.5rem; }
.section-sub { font-size:.84rem; color:var(--ink-soft); font-weight:300; line-height:1.75; max-width:520px; margin-bottom:2.5rem; }

/* ── FEATURE CARDS GRID ── */
.feature-grid { display:grid; grid-template-columns:1fr 1fr; gap:1.4rem; margin-bottom:4rem; }

.feature-card {
  background:var(--white);
  border:1px solid var(--rule);
  border-radius:20px;
  overflow:hidden;
  cursor:pointer;
  transition:transform .28s var(--ease), box-shadow .28s var(--ease), border-color .28s var(--ease);
  display:flex;
  flex-direction:column;
  text-decoration:none;
  color:inherit;
}
.feature-card:hover { transform:translateY(-6px); box-shadow:0 20px 50px rgba(26,23,20,.1); border-color:var(--gold-warm); }

/* image area — drop your <img> tag inside .feature-card-img */
.feature-card-img {
  width:100%;
  height:240px;
  background:var(--paper-deep);
  overflow:hidden;
  display:block;
}
.feature-card-img img {
  width:100%;
  height:100%;
  object-fit:cover;
  object-position:top;
  display:block;
  transition:transform .45s var(--ease);
}
.feature-card:hover .feature-card-img img { transform:scale(1.05); }

.feature-card-body { padding:1.5rem 1.8rem 1.8rem; flex:1; display:flex; flex-direction:column; }
.feature-card-cat { font-size:.58rem; letter-spacing:2.5px; text-transform:uppercase; color:var(--gold); font-weight:500; margin-bottom:.35rem; }
.feature-card-title { font-family:'DM Serif Display',serif; font-size:1.25rem; font-weight:400; color:var(--ink); line-height:1.3; margin-bottom:.5rem; }
.feature-card-desc { font-size:.81rem; color:var(--ink-soft); font-weight:300; line-height:1.75; flex:1; margin-bottom:1.3rem; }
.feature-card-footer { padding-top:1.1rem; border-top:1px solid var(--rule); }

.feature-card-btn {
  display:inline-flex; align-items:center; gap:.45rem;
  background:var(--ink); color:var(--white);
  padding:.62rem 1.2rem; border-radius:9px;
  font-size:.74rem; font-weight:500; letter-spacing:.2px;
  text-decoration:none;
  transition:background .2s, color .2s;
  border:none; cursor:pointer; font-family:'DM Sans',sans-serif;
}
.feature-card-btn:hover { background:var(--gold); color:var(--ink); }
.feature-card-btn i { font-size:.8rem; }

/* ── CHALLENGE BANNER ── */
.challenge-banner {
  background:var(--ink);
  border-radius:20px;
  overflow:hidden;
  position:relative;
  display:flex;
  align-items:center;
  justify-content:space-between;
  gap:2rem;
  padding:3rem 3.5rem;
  margin-bottom:4rem;
}
.challenge-banner::before {
  content:'';
  position:absolute; inset:0;
  background:radial-gradient(ellipse 55% 70% at 90% 50%, rgba(184,150,62,.1) 0%, transparent 70%);
  pointer-events:none;
}
.cb-left { position:relative; z-index:1; }
.cb-eyebrow { display:flex; align-items:center; gap:.7rem; margin-bottom:.9rem; }
.cb-eyebrow-line { width:20px; height:1px; background:var(--gold); }
.cb-eyebrow-text { font-size:.6rem; letter-spacing:3px; text-transform:uppercase; color:var(--gold); font-weight:500; }
.cb-title { font-family:'DM Serif Display',serif; font-size:2rem; font-weight:400; color:var(--white); line-height:1.2; margin-bottom:.6rem; }
.cb-title em { font-style:italic; color:var(--gold-warm); }
.cb-sub { font-size:.83rem; color:rgba(255,255,255,.38); font-weight:300; max-width:400px; line-height:1.75; }
.cb-right { position:relative; z-index:1; flex-shrink:0; }
.cb-btn {
  display:inline-flex; align-items:center; gap:.5rem;
  background:var(--gold); color:var(--ink);
  padding:.85rem 2rem; border-radius:50px;
  font-size:.84rem; font-weight:500;
  transition:background .2s, transform .15s, box-shadow .2s;
  border:none; cursor:pointer; font-family:'DM Sans',sans-serif;
  text-decoration:none; white-space:nowrap;
}
.cb-btn:hover { background:var(--gold-warm); transform:translateY(-2px); box-shadow:0 8px 24px rgba(184,150,62,.35); }

/* ── HOW IT WORKS ── */
.steps-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:1.4rem; margin-top:2rem; }
.step-card { background:var(--white); border:1px solid var(--rule); border-radius:16px; padding:1.8rem 1.6rem; transition:border-color .2s; }
.step-card:hover { border-color:var(--gold-warm); }
.step-num { font-family:'DM Serif Display',serif; font-size:3rem; font-weight:400; color:var(--paper-deep); line-height:1; margin-bottom:.9rem; }
.step-title { font-size:.9rem; font-weight:500; color:var(--ink); margin-bottom:.4rem; }
.step-desc { font-size:.78rem; color:var(--ink-soft); font-weight:300; line-height:1.75; }

@keyframes rise { from{opacity:0;transform:translateY(14px);} to{opacity:1;transform:translateY(0);} }

@media(max-width:860px) {
  .feature-grid { grid-template-columns:1fr; }
  .steps-grid { grid-template-columns:1fr; }
  .challenge-banner { flex-direction:column; text-align:center; padding:2.5rem 2rem; }
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
      <a href="{{ route('cart.index') }}">Cart</a>
    </div>
  </div>
</nav>

<!-- HERO -->
<div class="hero">
  <div class="hero-eyebrow">
    <span class="hero-eyebrow-line"></span>
    <span class="hero-eyebrow-text">Rewards &amp; Activities</span>
    <span class="hero-eyebrow-line"></span>
  </div>
  <div class="hero-headline">Play. Style.<br><em>Earn.</em></div>
  <div class="hero-sub">Everything fun lives here. Dress up your pup, discover curated drops, and take on weekly challenges — every action puts points in your pocket.</div>
</div>

<!-- PAGE BODY -->
<div class="page-body">

  <div class="section-eyebrow">
    <span class="section-eyebrow-line"></span>
    <span class="section-eyebrow-text">What's here</span>
  </div>
  <div class="section-title">Pick your activity</div>
  <p class="section-sub">Three ways to have fun and rack up points — jump in wherever you like.</p>

  <div class="feature-grid">

    <!-- Dress Up -->
    <div class="feature-card">
      <div class="feature-card-img">
        {{-- Replace with your image: --}}
        <img src="/images/wagclub/dressup.jpg" alt="Dress Up Your Pet">
      </div>
      <div class="feature-card-body">
        <div class="feature-card-cat">Virtual Stylist</div>
        <div class="feature-card-title">Dress Up Your Pet</div>
        <p class="feature-card-desc">Mix and match outfits, accessories, and looks from the MojoLux collection on your virtual pup. See how it fits before it ships — and earn points every time you style.</p>
        <div class="feature-card-footer">
          <a href="{{ route('dressup') }}" class="feature-card-btn">
            Start Dressing Up <i class="ion-ios-arrow-forward"></i>
          </a>
        </div>
      </div>
    </div>

    <!-- MojoLux Box -->
    <div class="feature-card">
      <div class="feature-card-img">
        {{-- Replace with your image: --}}
        <img src="/images/wagclub/mojoluxbox.jpg" alt="MojoLux Box">
      </div>
      <div class="feature-card-body">
        <div class="feature-card-cat">Curated Drops</div>
        <div class="feature-card-title">MojoLux Box</div>
        <p class="feature-card-desc">A handpicked selection of new arrivals, limited drops, and exclusive discounts — refreshed regularly. Spot something your dog needs before anyone else does.</p>
        <div class="feature-card-footer">
          <a href="{{ route('mojoluxbox') }}" class="feature-card-btn">
            Explore MojoLux Box <i class="ion-ios-arrow-forward"></i>
          </a>
        </div>
      </div>
    </div>

  </div>

  <!-- CHALLENGE BANNER -->
  <div class="challenge-banner">
    <div class="cb-left">
      <div class="cb-eyebrow">
        <span class="cb-eyebrow-line"></span>
        <span class="cb-eyebrow-text">Weekly challenges</span>
      </div>
      <div class="cb-title">Ready for a<br><em>Challenge?</em></div>
      <p class="cb-sub">New mini-games and quests drop every week. Complete them to stack points you can spend at checkout — the more you play, the more you save.</p>
    </div>
    <div class="cb-right">
      <a href="{{ route('quests') }}" class="cb-btn">
        Go to Mini Challenges <i class="ion-ios-arrow-forward"></i>
      </a>
    </div>
  </div>

  <!-- HOW POINTS WORK -->
  <div class="section-eyebrow">
    <span class="section-eyebrow-line"></span>
    <span class="section-eyebrow-text">How points work</span>
  </div>
  <div class="section-title">Every action counts.</div>
  <p class="section-sub">Points stack up across everything you do here — no single path, just more ways to earn.</p>

  <div class="steps-grid">
    <div class="step-card">
      <div class="step-num">01</div>
      <div class="step-title">Do stuff, earn points</div>
      <p class="step-desc">Style your pet, complete challenges, explore the MojoLux Box. Every activity adds points to your account automatically.</p>
    </div>
    <div class="step-card">
      <div class="step-num">02</div>
      <div class="step-title">Shop and keep earning</div>
      <p class="step-desc">Points don't stop at games — every order you place adds to your balance too. The more you shop, the faster they stack.</p>
    </div>
    <div class="step-card">
      <div class="step-num">03</div>
      <div class="step-title">Spend them at checkout</div>
      <p class="step-desc">Redeem your points for discounts on your next order. No expiry, no hoops — just points turning into savings.</p>
    </div>
  </div>

</div>

</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MojoLux - Luxury Dog Fashion</title>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

  <!-- NAVBAR -->
<nav>
    <a href="{{ route('home') }}" class="logo">MojoLux</a>
    <div class="nav-links">
        <a href="{{ route('store.index') }}">Collections</a>
        <a href="{{ route('dressup') }}">Style Lab</a>
        <a href="{{ route('wagclub.index') }}">Wag Club</a>
        <a href="{{ route('cart.index') }}">Cart</a>
        @auth
            <a href="{{ route('profile.index') }}">Profile</a>
        @else
            <a href="{{ route('login') }}">Sign In</a>
        @endauth
    </div>
</nav>

  <!-- HERO SECTION (UNCHANGED) -->
  <section class="hero">
    <div class="hero-inner">
      <div class="hero-text">
        <h2 class="brand">MOJOLUX</h2>
        <p class="tagline">Luxury Dogwear</p>
        <h1>
          Crafted for dogs<br>
          who don’t blend in.
        </h1>
        <div class="hero-actions">
          <a href="{{ route('store.index') }}" class="btn primary">View Collection</a>
          <a href="{{ route('register') }}" class="btn ghost">Sign Up</a>
        </div>
      </div>
      <div class="hero-image">
        <div class="image-wrap">
          <img src="{{ asset('template_default/images/mojo-img1.png') }}" alt="Mojolux dog">
        </div>
        <div class="accent"></div>
      </div>
    </div>
  </section>

  <!-- TRENDING / CARDS SECTION -->
  <section class="cards-section">
    <h2>Trending Now</h2>
    <div class="cards-container">
      <div class="card">
        <div class="card-image"><img src="{{ asset('template_default/images/product-1.jpg') }}" alt="Outfit 1"></div>
        <div class="card-content">
          <h3>Golden Pup Coat</h3>
          <p>Exclusive winter outfit for your little luxury dog.</p>
          <a href="{{ route('store.index') }}" class="card-btn">View Outfit</a>
        </div>
      </div>

      <div class="card">
        <div class="card-image"><img src="{{ asset('template_default/images/product-2.jpg') }}" alt="Outfit 2"></div>
        <div class="card-content">
          <h3>Velvet Bow Tie</h3>
          <p>Add instant charm and style for any occasion.</p>
          <a href="{{ route('store.index') }}" class="card-btn">View Outfit</a>
        </div>
      </div>

      <div class="card">
        <div class="card-image"><img src="{{ asset('template_default/images/product-3.jpg') }}" alt="Outfit 3"></div>
        <div class="card-content">
          <h3>Cozy Sweater</h3>
          <p>Soft, stylish, and perfect for winter walks.</p>
          <a href="{{ route('store.index') }}" class="card-btn">View Outfit</a>
        </div>
      </div>
    </div>
  </section>

  <!-- STYLE YOUR DOG -->
  <section class="action-section style-lab">
    <div class="action-content">
      <h2>Style Your Dog</h2>
      <p>Create the perfect look with our Style Lab.</p>
      <a href="{{ route('dressup') }}" class="btn primary">Go to Style Lab</a>
    </div>
  </section>

  <!-- EARN REWARDS -->
  <section class="action-section wag-club">
    <div class="action-content">
      <h2>Earn Rewards</h2>
      <p>Join the Wag Club and unlock exclusive perks.</p>
      <a href="{{ route('wagclub.index') }}" class="btn primary">Join Wag Club</a>
    </div>
  </section>

  <!-- MOJOLUX BOX BANNER -->
  <section class="banner-section">
    <div class="banner-content">
      <h2>The Mojolux Box</h2>
      <p>Curated outfits, grooming essentials, and a special toy for your pup.</p>
      <a href="{{ route('wagclub.index') }}" class="btn primary">Join Wag Club</a>
    </div>
  </section>

  <!-- FOOTER -->
  <footer>
    <p>&copy; {{ date('Y') }} MojoLux. All rights reserved.</p>
  </footer>

  <!-- CSS -->
  <style>
  /* NAVBAR */
   /* ---------------- NAVBAR ---------------- */
        body { margin:0; font-family: 'Nunito', sans-serif; background:#f6f5f2; }
        nav { position: sticky; top:0; z-index:999; display:flex; justify-content:space-between; align-items:center; padding:1rem 4rem; backdrop-filter: blur(15px); background: rgba(255,255,255,0.3); border-bottom:1px solid rgba(255,255,255,0.2); }
        nav .logo { font-family:'Playfair Display', serif; font-size:1.8rem; font-weight:700; color:#2C2C2C; text-decoration:none; }
        nav .nav-links a { text-decoration:none; color:#2C2C2C; font-weight:600; text-transform:uppercase; margin-left:2rem; letter-spacing:1px; transition: all 0.3s; }
        nav .nav-links a:hover { color:#D4AF37; }

  .navbar .logo {
    font-family: 'Playfair Display', serif;
    font-size: 1.8rem;
    font-weight: 700;
    color: #2C2C2C;
    text-decoration: none;
  }
  .navbar .nav-links a {
    text-decoration: none;
    color: #2C2C2C;
    font-weight: 600;
    text-transform: uppercase;
    margin-left: 2rem;
    letter-spacing: 1px;
    transition: opacity 0.3s;
  }
  .navbar .nav-links a:hover { opacity: 0.8; }

  /* HERO */
  .hero { background: #f6f5f2; padding: 110px 20px; }
  .hero-inner { max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: 1fr 1fr; gap: 40px; align-items: center; }
  .hero-text h1 { font-family: "Cormorant Garamond", serif; font-size: 50px; font-weight: 400; line-height: 1.25; margin-bottom: 32px; }
  .brand { font-family: "Cormorant Garamond", serif; font-size: 64px; letter-spacing: 4px; margin-bottom: 4px; }
  .tagline { font-size: 16px; color: #555; margin-bottom: 28px; }
  .hero-actions { display: flex; gap: 20px; }
  .btn { padding: 14px 34px; font-size: 14px; text-decoration: none; letter-spacing: 1px; border-radius: 12px; transition: all 0.3s; }
  .btn.primary { background: #1c1c1c; color:#fff; }
  .btn.primary:hover { background:#D4AF37; transform: translateY(-2px); }
  .btn.ghost { border: 1px solid #1c1c1c; color:#1c1c1c; }
  .btn.ghost:hover { background:#1c1c1c; color:#fff; transform: translateY(-2px); }
  .hero-image { position: relative; display: flex; justify-content: center; }
  .image-wrap { padding: 18px; background: #fff; border-radius: 24px; position: relative; z-index: 2; }
  .image-wrap img { width: 320px; border-radius: 18px; display: block; }
  .accent { position: absolute; width: 300px; height: 380px; background: rgba(138,154,142,0.28); top:-30px; right:0; border-radius:26px; z-index:1; }

  /* CARDS SECTION */
  .cards-section { padding: 4rem 2rem; background:#f9f7f5; text-align:center; }
  .cards-section h2 { font-family:'Playfair Display', serif; font-size:2.5rem; margin-bottom:3rem; color:#2C2C2C; }
  .cards-container { display:flex; justify-content:center; gap:2rem; flex-wrap:wrap; }
  .card { background: rgba(255,255,255,0.15); backdrop-filter: blur(12px); border-radius:20px; overflow:hidden; width:280px; transition: transform 0.4s, box-shadow 0.4s; cursor:pointer; box-shadow:0 8px 25px rgba(0,0,0,0.1); }
  .card:hover { transform: translateY(-10px) scale(1.05); box-shadow:0 18px 45px rgba(0,0,0,0.2); }
  .card-image img { width:100%; height:220px; object-fit:cover; transition:transform 0.5s; }
  .card:hover img { transform: scale(1.1); }
  .card-content { padding:1.5rem; }
  .card-content h3 { font-family:'Cormorant Garamond', serif; font-size:1.5rem; margin-bottom:0.5rem; }
  .card-content p { font-size:0.95rem; color:#555; margin-bottom:1rem; }
  .card-btn { display:inline-block; padding:0.6rem 1.2rem; border-radius:12px; background:#D4AF37; color:#fff; text-decoration:none; font-weight:600; transition: background 0.3s, transform 0.3s; }
  .card-btn:hover { background:#b7942d; transform: translateY(-2px); }

  /* ACTION SECTIONS */
  .action-section { padding:5rem 2rem; text-align:center; }
  .action-section h2 { font-family:'Playfair Display', serif; font-size:2rem; margin-bottom:1rem; color:#2C2C2C; }
  .action-section p { color:#555; font-size:1rem; margin-bottom:2rem; }
  .banner-section { padding:6rem 2rem; background:#1c1c1c; color:#fff; text-align:center; }
  .banner-section h2 { font-size:2.5rem; margin-bottom:1rem; }
  .banner-section p { font-size:1.2rem; margin-bottom:2rem; }

  footer { text-align:center; padding:2rem; background:#f6f5f2; color:#555; font-size:0.9rem; }

  /* RESPONSIVE */
  @media(max-width:1024px){
    .hero-inner { grid-template-columns:1fr !important; padding:2rem !important; }
    .hero-text h1 { font-size:36px !important; }
    .cards-container { flex-direction:column; gap:2rem; }
    .image-wrap img { width:100%; }
  }
  </style>

</body>
</html>

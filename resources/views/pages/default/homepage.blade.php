<x-mylayouts.layout-default title="MojoLux - Luxury Dog Fashion" :hideBanner="true">

<!-- NAVBAR -->
<nav style="padding:1rem 4rem; display:flex; justify-content:space-between; align-items:center; background:white; box-shadow:0 4px 20px rgba(0,0,0,0.05); position:sticky; top:0; z-index:999;">
    <a href="/" style="font-family:'Playfair Display', serif; font-size:1.8rem; font-weight:700; color:#2C2C2C; text-decoration:none;">MojoLux</a>
    <div style="display:flex; gap:2rem;">
        <a href="{{ route('store.index') }}" style="text-decoration:none; color:#2C2C2C; font-weight:600; text-transform:uppercase; letter-spacing:1px;">Collections</a>
        <a href="#story" style="text-decoration:none; color:#2C2C2C; font-weight:600; text-transform:uppercase; letter-spacing:1px;">Our Story</a>
        <a href="{{ route('login') }}" style="text-decoration:none; color:#2C2C2C; font-weight:600; text-transform:uppercase; letter-spacing:1px;">Sign In</a>
    </div>
</nav>

<!-- HERO SECTION -->
<section class="hero">
  <div class="hero-inner">

    <!-- LEFT TEXT -->
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

    <!-- RIGHT IMAGE -->
    <div class="hero-image">
      <div class="image-wrap">
        <img src="{{ asset('template_default/images/mojo-img1.png') }}" alt="Mojolux dog">
      </div>
      <div class="accent"></div>
    </div>

  </div>
</section>

<!-- FEATURED COLLECTIONS -->
<section style="padding:6rem 5rem; background:white;">
    <h2 style="font-family:'Playfair Display', serif; font-size:3rem; font-weight:600; text-align:center; color:#2C2C2C; margin-bottom:3rem;">Featured Collections</h2>
    <div style="display:flex; justify-content:center; gap:2rem; flex-wrap:wrap;">
        <div style="flex:1 1 300px; border-radius:12px; overflow:hidden; cursor:pointer; transition:transform 0.3s;">
            <img src="{{ asset('template_default/images/mojohero.png') }}" style="width:100%; height:100%; object-fit:cover;">
        </div>
        <div style="flex:1 1 300px; border-radius:12px; overflow:hidden; cursor:pointer; transition:transform 0.3s;">
            <img src="{{ asset('template_default/images/mojo-hero2.jpeg') }}" style="width:100%; height:100%; object-fit:cover;">
        </div>
        <div style="flex:1 1 300px; border-radius:12px; overflow:hidden; cursor:pointer; transition:transform 0.3s;">
            <img src="{{ asset('template_default/images/product-3.jpg') }}" style="width:100%; height:100%; object-fit:cover;">
        </div>
    </div>
</section>

<!-- HERO CSS -->
<style>
.hero {
  background: #f6f5f2;
  padding: 110px 20px;
}

.hero-inner {
  max-width: 1200px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 40px;
  align-items: center;
}

/* LEFT TEXT */
.brand {
  font-family: "Cormorant Garamond", serif;
  font-size: 64px;
  letter-spacing: 4px;
  margin-bottom: 4px;
}

.tagline {
  font-size: 16px;
  color: #555;
  margin-bottom: 28px;
}

.hero-text h1 {
  font-family: "Cormorant Garamond", serif;
  font-size: 50px;
  font-weight: 400;
  line-height: 1.25;
  margin-bottom: 32px;
}

/* BUTTONS */
.hero-actions {
  display: flex;
  gap: 20px;
}

.btn {
  padding: 14px 34px;
  font-size: 14px;
  text-decoration: none;
  letter-spacing: 1px;
  transition: all 0.3s;
}

.btn.primary {
  background: #1c1c1c;
  color: #fff;
}

.btn.primary:hover {
  background: #D4AF37;
  color: #fff;
  transform: translateY(-2px);
}

.btn.ghost {
  border: 1px solid #1c1c1c;
  color: #1c1c1c;
}

.btn.ghost:hover {
  background: #1c1c1c;
  color: #fff;
  transform: translateY(-2px);
}

/* RIGHT IMAGE */
.hero-image {
  position: relative;
  display: flex;
  justify-content: center;
}

/* IMAGE WRAP */
.image-wrap {
  padding: 18px;
  background: #fff;
  border-radius: 24px;
  position: relative;
  z-index: 2;
}

.image-wrap img {
  width: 320px;
  border-radius: 18px;
  display: block;
}

/* ACCENT BLOCK */
.accent {
  position: absolute;
  width: 300px;
  height: 380px;
  background: rgba(138, 154, 142, 0.28);
  top: -30px;
  right: 0;
  border-radius: 26px;
  z-index: 1;
}

/* Hover effect for featured collections */
div[style*="cursor:pointer"]:hover { transform:scale(1.05); }
a:hover { opacity:0.85; transition:all 0.3s; }

/* Responsive */
@media (max-width:1024px){
  .hero-inner { grid-template-columns:1fr !important; padding:2rem !important; }
  .hero-text h1 { font-size:36px !important; }
  section[style*="flex-wrap:wrap"] { flex-direction:column; gap:1.5rem !important; }
  .image-wrap img { width: 100%; }
}
</style>

</x-mylayouts.layout-default>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Purchase Successful - MojoLux</title>

  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>

<!-- NAVBAR -->
<nav>
    <a href="{{ route('home') }}" class="logo">MojoLux</a>

    <div class="nav-links">
        <a href="{{ route('store.index') }}">Collections</a>
        <a href="{{ route('wagclub.index') }}">Wag Club</a>
        <a href="{{ route('cart.index') }}">Cart</a>

        @auth
            <a href="{{ route('profile.index') }}">Profile</a>
        @else
            <a href="{{ route('login') }}">Sign In</a>
        @endauth
    </div>
</nav>

<!-- SUCCESS SECTION -->
<section class="success-section">
    <div class="success-card">

        <div class="checkmark">✓</div>

        <h1>Purchase Successful</h1>

        <p>
            Your order has been placed successfully and is now being prepared with care.
            Luxury is on its way to your doorstep.
        </p>

        <div class="actions">
            <a href="{{ route('store.index') }}" class="btn primary">Continue Shopping</a>
            <a href="{{ route('profile.index') }}" class="btn ghost">View Orders</a>
        </div>

    </div>
</section>

<!-- FOOTER -->
<footer>
  <p>&copy; {{ date('Y') }} MojoLux. All rights reserved.</p>
</footer>

<!-- STYLES -->
<style>

body {
    margin:0;
    font-family: 'Cormorant Garamond', serif;
    background:#f6f5f2;
    color:#2C2C2C;
}

/* NAVBAR */
nav {
    position: sticky;
    top:0;
    z-index:999;
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:1rem 4rem;
    backdrop-filter: blur(15px);
    background: rgba(255,255,255,0.3);
    border-bottom:1px solid rgba(255,255,255,0.2);
}

nav .logo {
    font-family:'Playfair Display', serif;
    font-size:1.8rem;
    font-weight:700;
    color:#2C2C2C;
    text-decoration:none;
}

nav .nav-links a {
    text-decoration:none;
    color:#2C2C2C;
    font-weight:600;
    text-transform:uppercase;
    margin-left:2rem;
    letter-spacing:1px;
    transition: all 0.3s;
}

nav .nav-links a:hover {
    color:#D4AF37;
}

/* SUCCESS SECTION */
.success-section {
    min-height: 70vh;
    display:flex;
    align-items:center;
    justify-content:center;
    padding:4rem 2rem;
}

.success-card {
    background:#fff;
    padding:4rem 3rem;
    border-radius:24px;
    text-align:center;
    max-width:600px;
    box-shadow:0 20px 60px rgba(0,0,0,0.08);
    animation: fadeUp 0.6s ease;
}

.checkmark {
    width:80px;
    height:80px;
    margin:0 auto 1.5rem;
    border-radius:50%;
    background:#D4AF37;
    color:#fff;
    font-size:2.5rem;
    display:flex;
    align-items:center;
    justify-content:center;
    font-weight:bold;
}

.success-card h1 {
    font-family:'Playfair Display', serif;
    font-size:2.5rem;
    margin-bottom:1rem;
}

.success-card p {
    font-size:1.1rem;
    color:#555;
    margin-bottom:2rem;
    line-height:1.6;
}

/* BUTTONS */
.actions {
    display:flex;
    gap:1rem;
    justify-content:center;
    flex-wrap:wrap;
}

.btn {
    padding:14px 28px;
    font-size:14px;
    text-decoration:none;
    letter-spacing:1px;
    border-radius:12px;
    transition: all 0.3s;
    display:inline-block;
}

.btn.primary {
    background:#1c1c1c;
    color:#fff;
}

.btn.primary:hover {
    background:#D4AF37;
    transform:translateY(-2px);
}

.btn.ghost {
    border:1px solid #1c1c1c;
    color:#1c1c1c;
}

.btn.ghost:hover {
    background:#1c1c1c;
    color:#fff;
    transform:translateY(-2px);
}

/* FOOTER */
footer {
    text-align:center;
    padding:2rem;
    color:#777;
    font-size:0.9rem;
}

/* ANIMATION */
@keyframes fadeUp {
    from {
        opacity:0;
        transform:translateY(20px);
    }
    to {
        opacity:1;
        transform:translateY(0);
    }
}

/* RESPONSIVE */
@media(max-width:768px){
    nav {
        padding:1rem 2rem;
        flex-direction:column;
        gap:0.5rem;
    }

    .success-card {
        padding:3rem 2rem;
    }
}

</style>

</body>
</html>

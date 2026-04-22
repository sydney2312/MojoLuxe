<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $data->title }} - MojoLux</title>

<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">

<style>
:root{
    --bg:#f6f5f2;
    --text:#1f1f1f;
    --muted:#777;
    --gold:#D4AF37;
    --shadow: 0 10px 30px rgba(0,0,0,0.08);
    --radius:16px;
}

/* RESET */
*{box-sizing:border-box;margin:0;padding:0;}

body{
    font-family:'Nunito',sans-serif;
    background:var(--bg);
    color:var(--text);
}

/* ───────── NAVBAR ───────── */
.nav-bar{
    position:sticky;
    top:0;
    z-index:1000;
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:1rem 3rem;
    background:rgba(255,255,255,0.85);
    backdrop-filter:blur(12px);
    border-bottom:1px solid rgba(0,0,0,0.06);
}

.logo{
    font-family:'Playfair Display';
    font-size:1.8rem;
    text-decoration:none;
    color:var(--text);
}

.logo em{color:var(--gold);font-style:italic;}

.nav-links{
    display:flex;
    align-items:center;
    gap:1.5rem;
}

.nav-links a{
    text-decoration:none;
    color:var(--text);
    font-weight:600;
    font-size:0.85rem;
}

.nav-links a:hover{
    color:var(--gold);
}

/* PROFILE */
.nav-profile{position:relative;}

.nav-profile-trigger{
    background:none;
    border:none;
    font-size:0.85rem;
    font-weight:600;
    cursor:pointer;
    display:flex;
    align-items:center;
    gap:5px;
}

.nav-dropdown{
    position:absolute;
    top:120%;
    right:0;
    background:white;
    border:1px solid #eee;
    border-radius:12px;
    box-shadow:var(--shadow);
    min-width:160px;
    display:none;
    overflow:hidden;
}

.nav-profile.open .nav-dropdown{
    display:block;
}

.nav-dropdown a,
.nav-dropdown button{
    display:block;
    width:100%;
    padding:10px 14px;
    text-align:left;
    border:none;
    background:none;
    font-size:0.85rem;
    cursor:pointer;
    text-decoration:none;
    color:var(--text);
}

.nav-dropdown a:hover,
.nav-dropdown button:hover{
    background:#faf7f2;
    color:var(--gold);
}

/* ───────── PRODUCT PAGE ───────── */
.container{
    max-width:1100px;
    margin:3rem auto;
    padding:0 1.5rem;
}

.product-grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:3rem;
    align-items:center;
}

.image-box img{
    width:100%;
    border-radius:var(--radius);
    box-shadow:var(--shadow);
}

.details-box h1{
    font-family:'Playfair Display';
    font-size:2.4rem;
}

.meta{
    display:flex;
    gap:1rem;
    color:var(--muted);
    margin:1rem 0;
}

.price{
    font-size:2rem;
    color:var(--gold);
    font-weight:700;
    margin:1rem 0;
}

.desc{
    color:#555;
    margin-bottom:2rem;
}

.qty-box{
    display:flex;
    align-items:center;
    gap:10px;
    margin-bottom:1rem;
}

.qty-box button{
    padding:10px 14px;
    border:none;
    background:#eee;
    border-radius:10px;
    cursor:pointer;
}

.qty-box input{
    width:60px;
    text-align:center;
    padding:8px;
    border:1px solid #ddd;
    border-radius:10px;
}

.btn{
    display:inline-block;
    padding:12px 22px;
    background:#1c1c1c;
    color:white;
    border-radius:12px;
    text-decoration:none;
    cursor:pointer;
}

.btn:hover{
    background:var(--gold);
}

.back-btn{
    display:inline-block;
    margin-top:2rem;
    padding:10px 14px;
    border:1px solid #ddd;
    border-radius:12px;
    text-decoration:none;
    color:var(--text);
}

.back-btn:hover{
    border-color:var(--gold);
    color:var(--gold);
}

/* RESPONSIVE */
@media(max-width:900px){
    .product-grid{
        grid-template-columns:1fr;
    }

    .nav-bar{
        padding:1rem 1.2rem;
    }
}
</style>
</head>

<body>

<!-- NAVBAR -->
<nav class="nav-bar">
    <a href="{{ route('home') }}" class="logo">Mojo<em>Lux</em></a>

    <div class="nav-links">
        <a href="{{ route('store.index') }}">Collections</a>
        <a href="{{ route('dressup') }}">Style Lab</a>
        <a href="{{ route('wagclub.index') }}">Wag Club</a>
        <a href="{{ route('cart.index') }}">Cart</a>

        @auth
        <div class="nav-profile">
            <button class="nav-profile-trigger" onclick="toggleProfile()">
                Profile ▾
            </button>

            <div class="nav-dropdown">
                <a href="{{ route('profile.index') }}">My Profile</a>
                <a href="{{ route('wagclub.index') }}">Wag Club</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Sign Out</button>
                </form>
            </div>
        </div>
        @else
        <a href="{{ route('login') }}">Sign In</a>
        @endauth
    </div>
</nav>

<!-- PRODUCT -->
<div class="container">

    <div class="product-grid">

        <div class="image-box">
            <img src="{{ $data->getImage() }}" alt="{{ $data->title }}">
        </div>

        <div class="details-box">

            <h1>{{ $data->title }}</h1>

            <div class="meta">
                <span>⭐ 5.0</span>
                <span>100 Ratings</span>
                <span>500 Sold</span>
            </div>

            <div class="price">
                ${{ $data->getPrice() }}
            </div>

            <p class="desc">
                {{ $data->short_description }}
            </p>

            <form action="{{ route('cart.store') }}" method="POST">
                @csrf
                @method('PUT')

                <input type="hidden" name="product_id" value="{{ $data->id }}">

                <div class="qty-box">
                    <button type="button" onclick="changeQty(-1)">−</button>
                    <input type="text" id="quantity" name="quantity" value="1">
                    <button type="button" onclick="changeQty(1)">+</button>
                </div>

                <button class="btn">Add to Cart</button>
            </form>

            <a href="{{ route('store.index') }}" class="back-btn">
                ← Back to Collections
            </a>

        </div>
    </div>

</div>

<script>
function changeQty(val){
    let input = document.getElementById('quantity');
    let current = parseInt(input.value) || 1;
    input.value = Math.max(1, current + val);
}

function toggleProfile(){
    document.querySelector('.nav-profile').classList.toggle('open');
}

document.addEventListener('click', function(e){
    const profile = document.querySelector('.nav-profile');
    if(profile && !profile.contains(e.target)){
        profile.classList.remove('open');
    }
});
</script>

</body>
</html>

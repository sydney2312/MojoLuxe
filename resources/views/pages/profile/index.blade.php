<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - MojoLux</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>

<!-- NAVBAR -->
<nav>
    <a href="{{ route('home') }}" class="logo">MojoLux</a>
    <div class="nav-links">
        <a href="{{ route('home.index') }}">Home </a>
        <a href="{{ route('store.index') }}">Collections</a>
        <a href="{{ route('dressup') }}">Style Lab</a>
        <a href="{{ route('wagclub.index') }}">Wag Club</a>
        <a href="{{ route('cart.index') }}">Cart</a>
    </div>
</nav>

<div class="container">

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="flash flash-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="flash flash-error">{{ session('error') }}</div>
    @endif

    <!-- USER PROFILE CARD -->
    <div class="card">
        <h2>Your Profile</h2>
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}">
            </div>
            <button type="submit" class="btn"><i class="fa fa-save"></i> Update Profile</button>
        </form>
    </div>

    <!-- PET CARD -->
    <div class="card">
        <h2>Pet Profile</h2>

        @if($user->pet)
            <div class="pet-info">
                <img src="{{ $user->pet->avatar ? asset('storage/' . $user->pet->avatar) : 'https://via.placeholder.com/120' }}" alt="Pet Avatar" class="avatar">
                <h3>{{ $user->pet->name }}</h3>
                <p class="label">Type: {{ $user->pet->type }}</p>
                @if($user->pet->breed)<p class="label">Breed: {{ $user->pet->breed }}</p>@endif
                @if($user->pet->age)<p class="label">Age: {{ $user->pet->age }}</p>@endif
                @if($user->pet->personality)<p class="label">Personality: {{ $user->pet->personality }}</p>@endif
            </div>

            <button class="btn toggle-form"><i class="fa fa-edit"></i> Edit Pet</button>

            <!-- EDIT PET FORM -->
            <form id="editPetForm" action="{{ route('pets.update', $user->pet) }}" method="POST" enctype="multipart/form-data" class="hidden">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" value="{{ $user->pet->name }}">
                </div>
                <div class="form-group">
                    <label>Type</label>
                    <input type="text" name="type" value="{{ $user->pet->type }}">
                </div>
                <div class="form-group">
                    <label>Breed</label>
                    <input type="text" name="breed" value="{{ $user->pet->breed }}">
                </div>
                <div class="form-group">
                    <label>Age</label>
                    <input type="number" name="age" value="{{ $user->pet->age }}">
                </div>
                <div class="form-group">
                    <label>Personality</label>
                    <textarea name="personality">{{ $user->pet->personality }}</textarea>
                </div>
                <div class="form-group">
                    <label>Avatar</label>
                    <input type="file" name="avatar">
                </div>
                <button type="submit" class="btn"><i class="fa fa-save"></i> Save Pet</button>
            </form>

        @else
            <button class="btn toggle-form"><i class="fa fa-plus"></i> Add Pet</button>

            <!-- ADD PET FORM -->
            <form id="addPetForm" action="{{ route('pets.store') }}" method="POST" enctype="multipart/form-data" class="hidden">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name">
                </div>
                <div class="form-group">
                    <label>Type</label>
                    <input type="text" name="type">
                </div>
                <div class="form-group">
                    <label>Breed</label>
                    <input type="text" name="breed">
                </div>
                <div class="form-group">
                    <label>Age</label>
                    <input type="number" name="age">
                </div>
                <div class="form-group">
                    <label>Personality</label>
                    <textarea name="personality"></textarea>
                </div>
                <div class="form-group">
                    <label>Avatar</label>
                    <input type="file" name="avatar">
                </div>
                <button type="submit" class="btn"><i class="fa fa-save"></i> Create Pet</button>
            </form>
        @endif
    </div>

</div>

<script>
    document.querySelectorAll('.toggle-form').forEach(btn => {
        btn.addEventListener('click', () => {
            const form = btn.nextElementSibling;
            if(form) form.classList.toggle('hidden');
        });
    });
</script>

<style>
    /* ---------------- GLOBAL ---------------- */
    body { margin:0; font-family: 'Nunito', sans-serif; background: linear-gradient(135deg, #f6f5f2, #ffffff); }
    h2, h3 { font-family: 'Playfair Display', serif; color:#2C2C2C; margin-bottom:1rem; }

    /* ---------------- NAVBAR ---------------- */
    nav { position: sticky; top:0; z-index:999; display:flex; justify-content:space-between; align-items:center; padding:1rem 4rem; backdrop-filter: blur(15px); background: rgba(255,255,255,0.3); border-bottom:1px solid rgba(255,255,255,0.2); }
    nav .logo { font-family:'Playfair Display', serif; font-size:1.8rem; font-weight:700; color:#2C2C2C; text-decoration:none; }
    nav .nav-links a { text-decoration:none; color:#2C2C2C; font-weight:600; text-transform:uppercase; margin-left:2rem; letter-spacing:1px; transition: all 0.3s; }
    nav .nav-links a:hover { color:#D4AF37; }

    /* ---------------- CONTAINER ---------------- */
    .container { max-width:800px; margin: 2rem auto; padding: 0 1rem; display:flex; flex-direction:column; gap:2rem; }

    /* ---------------- CARD ---------------- */
    .card { background: #fff; border-radius: 15px; padding: 2rem; box-shadow: 0 6px 15px rgba(0,0,0,0.1); transition: transform 0.3s, box-shadow 0.3s; }
    .card:hover { transform: translateY(-3px); box-shadow: 0 10px 20px rgba(0,0,0,0.15); }

    /* ---------------- AVATAR ---------------- */
    .avatar { width:120px; height:120px; border-radius:50%; object-fit:cover; box-shadow:0 4px 10px rgba(0,0,0,0.1); margin-bottom:1rem; }

    /* ---------------- LABELS ---------------- */
    .label { font-weight:600; color:#555; margin-top:0.5rem; }

    /* ---------------- BUTTONS ---------------- */
    .btn { padding:0.6rem 1.2rem; background:#D4AF37; color:#fff; border:none; border-radius:8px; cursor:pointer; font-weight:600; transition: all 0.3s; display:inline-flex; align-items:center; }
    .btn:hover { background:#b8932f; transform: scale(1.05); }
    .btn i { margin-right:0.5rem; }

    /* ---------------- FORM ---------------- */
    .form-group { margin-bottom:1rem; }
    .form-group label { display:block; font-weight:600; margin-bottom:0.3rem; }
    .form-group input, .form-group select, .form-group textarea { width:100%; padding:0.5rem; border-radius:6px; border:1px solid #ccc; }

    /* ---------------- FLASH MESSAGES ---------------- */
    .flash { padding:1rem 2rem; border-radius:8px; margin-bottom:1rem; animation: fadein 0.5s; }
    .flash-success { background:#d4edda; color:#155724; }
    .flash-error { background:#f8d7da; color:#721c24; }
    @keyframes fadein { from { opacity:0; } to { opacity:1; } }

    /* ---------------- HIDDEN ---------------- */
    .hidden { display:none; }

    /* ---------------- RESPONSIVE ---------------- */
    @media(max-width:600px) {
        nav { flex-direction: column; padding:1rem; }
        nav .nav-links { margin-top:0.5rem; display:flex; flex-wrap:wrap; gap:0.5rem; }
    }
</style>

</body>
</html>

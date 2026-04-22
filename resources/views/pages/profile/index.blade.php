<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - MojoLux</title>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;600;700&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        :root {
            --gold: #C9A84C;
            --gold-light: #E8CC7A;
            --gold-pale: #F5EDD4;
            --ink: #1A1612;
            --ink-muted: #6B5E4E;
            --cream: #FAF7F2;
            --cream-dark: #F0EAE0;
            --white: #FFFFFF;
            --success-bg: #E8F5E9;
            --success-text: #2E7D32;
            --danger-bg: #FDECEA;
            --danger-text: #C62828;
            --radius: 14px;
            --shadow: 0 4px 24px rgba(26,22,18,0.08);
            --shadow-hover: 0 8px 40px rgba(26,22,18,0.14);
            --transition: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--cream);
            color: var(--ink);
            min-height: 100vh;
        }

        /* ── NAVBAR ─────────────────────────────────────── */
        nav {
            position: sticky;
            top: 0;
            z-index: 100;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 3rem;
            height: 68px;
            background: rgba(250, 247, 242, 0.92);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(201, 168, 76, 0.18);
        }

        .logo {
            font-family: 'Cormorant Garamond', serif;
            font-weight: 700;
            font-size: 1.7rem;
            color: var(--ink);
            text-decoration: none;
            letter-spacing: 0.04em;
        }
        .logo span { color: var(--gold); }

        .nav-links {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        .nav-links a {
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--ink-muted);
            letter-spacing: 0.03em;
            transition: color var(--transition);
            position: relative;
        }
        .nav-links a::after {
            content: '';
            position: absolute;
            left: 0; bottom: -3px;
            width: 0; height: 1.5px;
            background: var(--gold);
            transition: width var(--transition);
        }
        .nav-links a:hover { color: var(--ink); }
        .nav-links a:hover::after { width: 100%; }

        .nav-actions form button {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.8rem;
            font-weight: 500;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            background: transparent;
            border: 1.5px solid var(--gold);
            color: var(--gold);
            padding: 0.45rem 1.2rem;
            border-radius: 50px;
            cursor: pointer;
            transition: all var(--transition);
        }
        .nav-actions form button:hover {
            background: var(--gold);
            color: var(--white);
        }

        /* ── LAYOUT ──────────────────────────────────────── */
        .container {
            max-width: 860px;
            margin: 0 auto;
            padding: 3rem 1.5rem 5rem;
            display: grid;
            gap: 1.5rem;
        }

        /* ── PAGE TITLE ──────────────────────────────────── */
        .page-heading {
            padding-bottom: 0.5rem;
        }
        .page-heading h1 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2.6rem;
            font-weight: 600;
            line-height: 1.1;
            color: var(--ink);
        }
        .page-heading p {
            margin-top: 0.4rem;
            font-size: 0.875rem;
            color: var(--ink-muted);
        }

        /* ── FLASH ───────────────────────────────────────── */
        .flash {
            padding: 0.9rem 1.2rem;
            border-radius: var(--radius);
            font-size: 0.875rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.6rem;
            animation: fadeSlideIn 0.4s ease both;
        }
        .flash-success { background: var(--success-bg); color: var(--success-text); }
        .flash-error   { background: var(--danger-bg);  color: var(--danger-text); }
        .flash::before { font-size: 1rem; }
        .flash-success::before { content: '✓'; }
        .flash-error::before   { content: '✕'; }

        @keyframes fadeSlideIn {
            from { opacity: 0; transform: translateY(-8px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* ── CARD ────────────────────────────────────────── */
        .card {
            background: var(--white);
            border-radius: var(--radius);
            border: 1px solid var(--cream-dark);
            box-shadow: var(--shadow);
            padding: 2rem 2.2rem;
            transition: box-shadow var(--transition);
            animation: fadeSlideIn 0.5s ease both;
        }
        .card:hover { box-shadow: var(--shadow-hover); }

        .card h2 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.55rem;
            font-weight: 600;
            color: var(--ink);
            margin-bottom: 1.5rem;
            padding-bottom: 0.8rem;
            border-bottom: 1.5px solid var(--cream-dark);
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }
        .card h2 .icon {
            width: 32px; height: 32px;
            background: var(--gold-pale);
            border-radius: 8px;
            display: grid; place-items: center;
            font-size: 0.95rem;
        }

        /* ── FORM ────────────────────────────────────────── */
        .form-group {
            margin-bottom: 1.1rem;
        }
        .form-group label {
            display: block;
            font-size: 0.78rem;
            font-weight: 500;
            letter-spacing: 0.07em;
            text-transform: uppercase;
            color: var(--ink-muted);
            margin-bottom: 0.4rem;
        }
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 0.72rem 1rem;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.9rem;
            color: var(--ink);
            background: var(--cream);
            border: 1.5px solid var(--cream-dark);
            border-radius: 9px;
            outline: none;
            transition: border-color var(--transition), box-shadow var(--transition);
        }
        .form-group input:focus,
        .form-group textarea:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(201,168,76,0.14);
        }
        .form-group textarea { resize: vertical; min-height: 80px; }

        /* ── BUTTONS ─────────────────────────────────────── */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.83rem;
            font-weight: 500;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            background: var(--ink);
            color: var(--white);
            border: none;
            padding: 0.65rem 1.5rem;
            border-radius: 50px;
            cursor: pointer;
            transition: all var(--transition);
            margin-top: 0.5rem;
        }
        .btn:hover { background: var(--gold); transform: translateY(-1px); }
        .btn:active { transform: translateY(0); }

        .btn-outline {
            background: transparent;
            color: var(--ink);
            border: 1.5px solid var(--cream-dark);
        }
        .btn-outline:hover { border-color: var(--gold); color: var(--gold); background: transparent; }

        /* ── PET INFO ────────────────────────────────────── */
        .pet-info {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
            padding: 1.2rem;
            background: var(--cream);
            border-radius: 12px;
        }

        .avatar {
            width: 80px; height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--gold-pale);
            box-shadow: 0 0 0 1px var(--gold);
            flex-shrink: 0;
        }

        .pet-details h3 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.35rem;
            font-weight: 600;
            margin-bottom: 0.4rem;
        }

        .pet-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 0.4rem;
        }

        .tag {
            font-size: 0.75rem;
            font-weight: 500;
            background: var(--gold-pale);
            color: var(--ink-muted);
            padding: 0.25rem 0.7rem;
            border-radius: 50px;
        }

        /* ── HIDDEN ──────────────────────────────────────── */
        .hidden { display: none; }

        .edit-form {
            margin-top: 1.2rem;
            padding-top: 1.2rem;
            border-top: 1.5px dashed var(--cream-dark);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0 1rem;
        }

        /* ── ORDER HISTORY ───────────────────────────────── */
        .orders-list { display: grid; gap: 0.9rem; }

        .order-box {
            border: 1.5px solid var(--cream-dark);
            border-radius: 12px;
            padding: 1.1rem 1.3rem;
            transition: border-color var(--transition), box-shadow var(--transition);
        }
        .order-box:hover {
            border-color: var(--gold-light);
            box-shadow: 0 2px 16px rgba(201,168,76,0.1);
        }

        .order-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.6rem;
        }

        .order-num {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.05rem;
            font-weight: 700;
        }

        .order-meta {
            display: flex;
            gap: 1.5rem;
            font-size: 0.85rem;
            color: var(--ink-muted);
            margin-bottom: 0.6rem;
        }

        .status {
            font-size: 0.73rem;
            font-weight: 600;
            letter-spacing: 0.07em;
            text-transform: uppercase;
            padding: 0.3rem 0.8rem;
            border-radius: 50px;
        }
        .status.paid   { background: var(--success-bg); color: var(--success-text); }
        .status.unpaid { background: var(--danger-bg);  color: var(--danger-text); }
        .status.pending { background: #FFF8E1; color: #F57F17; }

        details summary {
            font-size: 0.8rem;
            color: var(--gold);
            font-weight: 500;
            cursor: pointer;
            list-style: none;
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            transition: opacity var(--transition);
            margin-top: 0.3rem;
        }
        details summary::-webkit-details-marker { display: none; }
        details summary::before { content: '▸'; font-size: 0.7rem; transition: transform 0.2s; }
        details[open] summary::before { transform: rotate(90deg); }
        details summary:hover { opacity: 0.75; }

        .detail-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.4rem;
            margin-top: 0.8rem;
            padding: 0.9rem;
            background: var(--cream);
            border-radius: 8px;
        }
        .detail-grid p {
            font-size: 0.8rem;
            color: var(--ink-muted);
        }
        .detail-grid p strong { color: var(--ink); }

        .empty-state {
            text-align: center;
            padding: 2rem;
            color: var(--ink-muted);
            font-size: 0.9rem;
        }
        .empty-state .empty-icon {
            font-size: 2rem;
            margin-bottom: 0.6rem;
            opacity: 0.4;
        }

        /* ── RESPONSIVE ──────────────────────────────────── */
        @media (max-width: 640px) {
            nav { padding: 0 1rem; }
            .nav-links { gap: 1rem; }
            .nav-links a { font-size: 0.78rem; }
            .container { padding: 2rem 1rem 4rem; }
            .card { padding: 1.5rem; }
            .form-row { grid-template-columns: 1fr; }
            .pet-info { flex-direction: column; text-align: center; }
            .pet-tags { justify-content: center; }
            .detail-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav>
        <a href="{{ route('home') }}" class="logo">Mojo<span>Lux</span></a>

        <div class="nav-links">
            <a href="{{ route('home.index') }}">Home</a>
            <a href="{{ route('store.index') }}">Collections</a>
            <a href="{{ route('dressup') }}">Style Lab</a>
            <a href="{{ route('wagclub.index') }}">Wag Club</a>
            <a href="{{ route('cart.index') }}">Cart</a>
        </div>

        <div class="nav-actions">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container">

        <!-- PAGE HEADING -->
        <div class="page-heading">
            <h1>Your Profile</h1>
            <p>Manage your account, pet details &amp; order history.</p>
        </div>

        <!-- FLASH MESSAGES -->
        @if (session('success'))
            <div class="flash flash-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="flash flash-error">{{ session('error') }}</div>
        @endif

        <!-- ACCOUNT CARD -->
        <div class="card">
            <h2>
                <span class="icon">👤</span> Account Details
            </h2>

            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}">
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}">
                    </div>
                </div>
                <button type="submit" class="btn">Save Changes</button>
            </form>
        </div>

        <!-- PET CARD -->
        <div class="card">
            <h2>
                <span class="icon">🐾</span> Pet Profile
            </h2>

            @if ($user->pet)
                <div class="pet-info">
                    <img src="{{ $user->pet->avatar ? asset('storage/' . $user->pet->avatar) : 'https://via.placeholder.com/80' }}"
                        class="avatar" alt="{{ $user->pet->name }}">
                    <div class="pet-details">
                        <h3>{{ $user->pet->name }}</h3>
                        <div class="pet-tags">
                            <span class="tag">{{ $user->pet->type }}</span>
                            @if ($user->pet->breed)<span class="tag">{{ $user->pet->breed }}</span>@endif
                            @if ($user->pet->age)<span class="tag">Age {{ $user->pet->age }}</span>@endif
                            @if ($user->pet->personality)<span class="tag">{{ $user->pet->personality }}</span>@endif
                        </div>
                    </div>
                </div>

                <button class="btn btn-outline toggle-form">✏️ Edit Pet</button>

                <div id="editPetForm" class="edit-form hidden">
                    <form action="{{ route('pets.update', $user->pet) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="form-group">
                                <label>Pet Name</label>
                                <input name="name" value="{{ $user->pet->name }}">
                            </div>
                            <div class="form-group">
                                <label>Type</label>
                                <input name="type" value="{{ $user->pet->type }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label>Breed</label>
                                <input name="breed" value="{{ $user->pet->breed }}">
                            </div>
                            <div class="form-group">
                                <label>Age</label>
                                <input name="age" value="{{ $user->pet->age }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Personality</label>
                            <textarea name="personality">{{ $user->pet->personality }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Profile Photo</label>
                            <input type="file" name="avatar">
                        </div>
                        <button class="btn">Save Pet Profile</button>
                    </form>
                </div>

            @else
                <button class="btn toggle-form">🐶 Add Your Pet</button>

                <div id="addPetForm" class="edit-form hidden">
                    <form action="{{ route('pets.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group">
                                <label>Pet Name</label>
                                <input name="name" placeholder="e.g. Biscuit">
                            </div>
                            <div class="form-group">
                                <label>Type</label>
                                <input name="type" placeholder="Dog, Cat…">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label>Breed</label>
                                <input name="breed">
                            </div>
                            <div class="form-group">
                                <label>Age</label>
                                <input name="age">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Personality</label>
                            <textarea name="personality" placeholder="Playful, cuddly, feisty…"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Profile Photo</label>
                            <input type="file" name="avatar">
                        </div>
                        <button class="btn">Create Pet Profile</button>
                    </form>
                </div>
            @endif
        </div>

        <!-- ORDER HISTORY CARD -->
        <div class="card">
            <h2>
                <span class="icon">🧾</span> Order History
            </h2>

            @if ($user->orders->count())
                <div class="orders-list">
                    @foreach ($user->orders as $order)
                        <div class="order-box">
                            <div class="order-header">
                                <span class="order-num">#{{ $order->order_no }}</span>
                                <span class="status {{ $order->payment_status }}">
                                    {{ ucfirst($order->payment_status) }}
                                </span>
                            </div>
                            <div class="order-meta">
                                <span>Total: <strong>${{ $order->total }}</strong></span>
                                <span>{{ $order->created_at->format('d M Y') }}</span>
                            </div>
                            <details>
                                <summary>View Details</summary>
                                <div class="detail-grid">
                                    <p><strong>Subtotal</strong><br>${{ $order->subtotal }}</p>
                                    <p><strong>Payment ID</strong><br>{{ $order->payment_id }}</p>
                                    <p><strong>Provider</strong><br>{{ $order->payment_provider }}</p>
                                </div>
                            </details>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state">
                    <div class="empty-icon">🛍️</div>
                    <p>No orders yet — browse the collection!</p>
                </div>
            @endif
        </div>

    </div>

    <script>
        document.querySelectorAll('.toggle-form').forEach(btn => {
            btn.addEventListener('click', () => {
                const form = btn.nextElementSibling;
                if (form) form.classList.toggle('hidden');
                btn.textContent = form.classList.contains('hidden')
                    ? (btn.dataset.addLabel || btn.textContent)
                    : '✕ Close';
            });
        });
    </script>

</body>
</html>

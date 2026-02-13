<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MojoLux') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Cormorant+Garamond:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>

    <style>
        body {
            margin: 0;
            font-family: 'Montserrat', sans-serif;
            background: #f6f5f2;
        }

        /* Glass Navbar */
        .glass-navbar {
            padding: 1rem 4rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            backdrop-filter: blur(12px);
            background: rgba(255,255,255,0.75);
            position: sticky;
            top: 0;
            z-index: 999;
            border-bottom: 1px solid rgba(0,0,0,0.05);
        }

        .glass-navbar .brand {
            font-family:'Playfair Display', serif;
            font-size:1.8rem;
            font-weight:700;
            color:#2C2C2C;
            text-decoration:none;
        }

        .glass-navbar a {
            text-decoration: none;
            color: #2C2C2C;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-left: 1.5rem;
            transition: all 0.3s;
        }

        .glass-navbar a:hover {
            color: #D4AF37;
        }

        .nav-right {
            display: flex;
            align-items: center;
        }

        .icon-btn {
            font-size: 1.2rem;
            margin-left: 1rem;
        }
    </style>
</head>
<body>
    <div id="app">
        <!-- Custom Glass Navbar -->
        <nav class="glass-navbar">
            <a href="{{ route('home') }}" class="brand">{{ config('app.name', 'MojoLux') }}</a>

            <div class="nav-right">
                <a href="{{ route('home.index') }}">Home</a>
                <a href="{{ route('store.index') }}">Collections</a>
                <a href="{{ route('stylelab') }}">Style Lab</a>
                <a href="{{ route('wagclub') }}">Wag Club</a>

                @guest
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}">Login</a>
                    @endif

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @else
                    <a href="{{ route('cart.index') }}" class="icon-btn"><i class="fas fa-shopping-cart"></i></a>
                    <a href="{{ route('profile.index') }}" class="icon-btn"><i class="fas fa-user"></i></a>

                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endguest
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>

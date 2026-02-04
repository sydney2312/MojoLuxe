<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MojoLux - Collections</title>

    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600;700&family=Montserrat:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">


















    <style>
        :root {
            --gold: #D4AF37;
            --charcoal: #2C2C2C;
            --white: #FFFFFF;
            --cream: #FAF6F0;
            --dark-gold: #B8941F;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background: var(--cream);
            color: var(--charcoal);
        }

        /* NAVIGATION */
        .nav-bar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(212, 175, 55, 0.2);
            padding: 1.5rem 3rem;
        }

        .nav-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1800px;
            margin: 0 auto;
        }

        .logo {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            font-weight: 700;
            letter-spacing: 3px;
            color: var(--charcoal);
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            gap: 3rem;
            align-items: center;
        }

        .nav-links a {
            font-size: 0.75rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--charcoal);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: var(--gold);
        }

        /* MAIN CONTENT */
        .main-content {
            margin-top: 100px;
            padding: 3rem;
            max-width: 1800px;
            margin-left: auto;
            margin-right: auto;
        }

        /* QUEST BANNER - Gamification */
        .quest-banner {
            background: linear-gradient(135deg, #2C2C2C 0%, #1a1a1a 100%);
            color: white;
            padding: 2.5rem;
            border-radius: 16px;
            margin-bottom: 3rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 20px 60px rgba(0,0,0,0.2);
            position: relative;
            overflow: hidden;
        }

        .quest-banner::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(212, 175, 55, 0.15), transparent);
            border-radius: 50%;
        }

        .quest-info {
            flex: 1;
            position: relative;
            z-index: 2;
        }

        .quest-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .quest-icon {
            font-size: 2rem;
        }

        .quest-desc {
            color: rgba(255,255,255,0.8);
            font-size: 0.95rem;
            margin-bottom: 1rem;
        }

        .quest-progress {
            background: rgba(255,255,255,0.2);
            height: 10px;
            border-radius: 10px;
            overflow: hidden;
            margin-top: 1rem;
            position: relative;
        }

        .quest-progress-bar {
            background: linear-gradient(90deg, var(--gold), var(--dark-gold));
            height: 100%;
            width: 65%;
            transition: width 0.6s ease;
            box-shadow: 0 0 20px rgba(212, 175, 55, 0.5);
        }

        .quest-progress-text {
            font-size: 0.75rem;
            margin-top: 0.5rem;
            color: rgba(255,255,255,0.7);
        }

        .quest-reward {
            text-align: center;
            background: rgba(212, 175, 55, 0.15);
            padding: 2rem;
            border-radius: 12px;
            border: 2px solid var(--gold);
            position: relative;
            z-index: 2;
        }

.quest-link {
    display: inline-block;
    margin-top: 1rem;
    padding: 0.4rem 0.8rem;
    background: rgba(212, 175, 55, 0.15); /* subtle gold */
    color: var(--gold);
    font-size: 0.8rem;
    font-weight: 600;
    border-radius: 8px;
    cursor: pointer;
    text-decoration: none;
    transition: background 0.3s;
}

.quest-link:hover {
    background: rgba(212, 175, 55, 0.25);
}


/* FEATURE BUTTONS - match site theme */
.feature-card {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #2C2C2C 0%, #1a1a1a 100%);
    color: white;
    padding: 2rem;
    border-radius: 16px;
    text-decoration: none;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    transition: transform 0.3s, box-shadow 0.3s;
    min-width: 200px;
}

.feature-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(212, 175, 55, 0.5);
}

.feature-icon {
    font-size: 3rem;
    margin-bottom: 0.5rem;
}

.feature-title {
    font-size: 1.2rem;
    font-weight: 700;
    margin-bottom: 0.3rem;
    color: var(--gold);
}

.feature-desc {
    font-size: 0.9rem;
    color: rgba(255,255,255,0.8);
    text-align: center;
}



        .reward-icon {
            font-size: 3.5rem;
            margin-bottom: 0.5rem;
        }

        .reward-text {
            font-size: 0.75rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: var(--gold);
            font-weight: 600;
        }

        .reward-value {
            font-size: 1.2rem;
            font-weight: 700;
            color: white;
            margin-top: 0.3rem;
        }

        /* INTERACTIVE FEATURES TOOLBAR */
        .features-toolbar {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 4rem;
        }

        .feature-card {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            text-align: center;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: 2px solid transparent;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }

        .feature-card:hover {
            transform: translateY(-8px);
            border-color: var(--gold);
            box-shadow: 0 12px 40px rgba(212, 175, 55, 0.3);
        }

        .feature-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .feature-title {
            font-size: 0.9rem;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: var(--charcoal);
            margin-bottom: 0.5rem;
        }

        .feature-desc {
            font-size: 0.8rem;
            color: #666;
            line-height: 1.5;
        }

        /* CATEGORY FILTERS - Clean Circles */
        .categories-section {
            margin-bottom: 4rem;
            text-align: center;
        }

        .categories-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            margin-bottom: 3rem;
            font-weight: 400;
        }

        .categories-grid {
            display: flex;
            justify-content: center;
            gap: 2rem;
            flex-wrap: wrap;
        }

        .category-circle {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.4s ease;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            border: 3px solid transparent;
        }

        .category-circle:hover,
        .category-circle.active {
            transform: translateY(-5px) scale(1.05);
            border-color: var(--gold);
            box-shadow: 0 12px 30px rgba(212, 175, 55, 0.3);
        }

        .category-icon {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }

        .category-name {
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
        }

        /* AI RECOMMENDATIONS SECTION */
        .ai-section {
            background: linear-gradient(135deg, #6B2737 0%, #8B3A4A 100%);
            color: white;
            padding: 3rem;
            border-radius: 16px;
            margin-bottom: 3rem;
        }

        .ai-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .ai-icon {
            font-size: 2.5rem;
        }

        .ai-title {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
        }

        .ai-subtitle {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        /* PRODUCTS GRID */
        .products-section {
            margin-top: 4rem;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 3rem;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            font-weight: 400;
        }

        .filter-dropdown {
            padding: 0.8rem 1.5rem;
            border: 2px solid var(--gold);
            border-radius: 50px;
            background: white;
            font-size: 0.75rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            font-weight: 600;
            cursor: pointer;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 2.5rem;
        }

        .product-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            position: relative;
        }

        .product-card:hover {
            transform: translateY(-12px);
            box-shadow: 0 20px 60px rgba(0,0,0,0.15);
        }

        .product-image-wrap {
            position: relative;
            width: 100%;
            padding-bottom: 125%;
            overflow: hidden;
            background: #f5f5f5;
        }

        .product-image-wrap img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s;
        }

        .product-card:hover .product-image-wrap img {
            transform: scale(1.1);
        }

        .product-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: var(--gold);
            color: white;
            padding: 0.5rem 1rem;
            font-size: 0.65rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            font-weight: 600;
            border-radius: 20px;
            z-index: 5;
        }

        .ai-badge {
            position: absolute;
            top: 1rem;
            left: 1rem;
            background: #6B2737;
            color: white;
            padding: 0.5rem 1rem;
            font-size: 0.65rem;
            letter-spacing: 1px;
            font-weight: 600;
            border-radius: 20px;
            z-index: 5;
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        .product-info {
            padding: 1.5rem;
        }

        .product-category {
            font-size: 0.65rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #999;
            margin-bottom: 0.5rem;
        }

        .product-name {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.8rem;
            color: var(--charcoal);
        }

        .product-rating {
            display: flex;
            gap: 0.2rem;
            margin-bottom: 0.8rem;
            color: var(--gold);
        }

        .product-price {
            font-size: 1.4rem;
            color: var(--gold);
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .product-actions {
            display: flex;
            gap: 0.5rem;
        }

        .btn-add-cart {
            flex: 1;
            padding: 0.9rem;
            background: var(--charcoal);
            color: white;
            border: none;
            font-size: 0.7rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            border-radius: 50px;
        }

        .btn-add-cart:hover {
            background: var(--gold);
        }

        .btn-quick-view {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: white;
            border: 2px solid var(--charcoal);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
        }

        .btn-quick-view:hover {
            background: var(--charcoal);
            color: white;
        }

        /* MODAL STYLES */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.85);
            z-index: 2000;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            overflow-y: auto;
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background: white;
            padding: 3rem;
            border-radius: 20px;
            max-width: 1000px;
            width: 100%;
            max-height: 90vh;
            overflow-y: auto;
            position: relative;
            animation: modalSlideIn 0.4s ease-out;
        }

        @keyframes modalSlideIn {
            from {
                transform: translateY(50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .modal-close {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            font-size: 2rem;
            cursor: pointer;
            color: var(--charcoal);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
        }

        .modal-close:hover {
            background: var(--cream);
            transform: rotate(90deg);
        }

        .modal-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            margin-bottom: 2rem;
            color: var(--charcoal);
        }

        /* PET PROFILE MODAL */
        .profile-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--charcoal);
        }

        .form-group input,
        .form-group select {
            padding: 1rem;
            border: 2px solid #E8E6E3;
            border-radius: 8px;
            font-size: 1rem;
            transition: border 0.3s;
            font-family: 'Montserrat', sans-serif;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: var(--gold);
            outline: none;
        }

        .personality-section {
            grid-column: span 2;
        }

        .personality-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(130px, 1fr));
            gap: 1rem;
            margin-top: 1rem;
        }

        .personality-option {
            padding: 1.5rem 1rem;
            border: 2px solid #E8E6E3;
            border-radius: 12px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
            background: white;
        }

        .personality-option:hover,
        .personality-option.selected {
            border-color: var(--gold);
            background: #FFF9E6;
            transform: translateY(-3px);
        }

        .personality-emoji {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }

        .personality-name {
            font-size: 0.8rem;
            font-weight: 600;
        }

        .submit-button {
            grid-column: span 2;
            padding: 1.2rem;
            background: var(--gold);
            color: white;
            border: none;
            border-radius: 50px;
            font-size: 0.8rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 1rem;
        }

        .submit-button:hover {
            background: var(--dark-gold);
            transform: translateY(-2px);
        }

        /* DRESS UP CANVAS */
        .dress-container {
            display: grid;
            grid-template-columns: 200px 1fr 200px;
            gap: 2rem;
            margin-top: 2rem;
        }

        .dress-sidebar {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .dress-category {
            padding: 1rem;
            background: var(--cream);
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
            text-align: center;
            border: 2px solid transparent;
        }

        .dress-category:hover,
        .dress-category.active {
            background: var(--gold);
            color: white;
            border-color: var(--dark-gold);
        }

        .dress-category-icon {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .dress-category-name {
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .pet-canvas {
            background: linear-gradient(135deg, #f5f5f5 0%, #e8e8e8 100%);
            border-radius: 16px;
            min-height: 500px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 3px dashed #ddd;
            position: relative;
            overflow: hidden;
        }

        .pet-silhouette {
            font-size: 18rem;
            opacity: 0.2;
            filter: grayscale(1);
        }

        .canvas-hint {
            position: absolute;
            bottom: 2rem;
            left: 50%;
            transform: translateX(-50%);
            background: white;
            padding: 1rem 2rem;
            border-radius: 50px;
            font-size: 0.8rem;
            color: #666;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }

        /* SUBSCRIPTION BOX */
        .subscription-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .box-option {
            background: linear-gradient(135deg, #FAF6F0 0%, white 100%);
            padding: 2.5rem;
            border-radius: 16px;
            border: 3px solid transparent;
            cursor: pointer;
            transition: all 0.4s;
            position: relative;
            overflow: hidden;
        }

        .box-option::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(212, 175, 55, 0.1), transparent);
            opacity: 0;
            transition: opacity 0.4s;
        }

        .box-option:hover,
        .box-option.selected {
            border-color: var(--gold);
            transform: translateY(-8px);
            box-shadow: 0 20px 60px rgba(212, 175, 55, 0.3);
        }

        .box-option:hover::before {
            opacity: 1;
        }

        .box-popular {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: var(--gold);
            color: white;
            padding: 0.4rem 1rem;
            border-radius: 20px;
            font-size: 0.65rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            font-weight: 600;
        }

        .box-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            margin-bottom: 1rem;
            color: var(--charcoal);
        }

        .box-price {
            font-size: 2.5rem;
            color: var(--gold);
            font-weight: 700;
            margin: 1.5rem 0;
        }

        .box-price span {
            font-size: 1rem;
            color: #666;
            font-weight: 400;
        }

        .box-features {
            list-style: none;
            margin: 2rem 0;
        }

        .box-features li {
            padding: 0.8rem 0;
            border-bottom: 1px solid #E8E6E3;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .box-features li:last-child {
            border-bottom: none;
        }

        .check-icon {
            color: var(--gold);
            font-size: 1.2rem;
        }

        /* RESPONSIVE */
        @media (max-width: 1024px) {
            .nav-content {
                padding: 1rem;
            }

            .main-content {
                padding: 1.5rem;
            }

            .quest-banner {
                flex-direction: column;
                gap: 2rem;
            }

            .features-toolbar {
                grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            }

            .products-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }

            .dress-container {
                grid-template-columns: 1fr;
            }

            .profile-grid {
                grid-template-columns: 1fr;
            }

            .personality-section {
                grid-column: span 1;
            }

            .submit-button {
                grid-column: span 1;
            }
        }
    </style>
</head>
<body>
    <!-- Nav -->
   <!-- Nav -->
<nav class="nav-bar">
    <div class="nav-content">
        <a href="{{ route('home') }}" class="logo">MOJOLUX</a>
        <div class="nav-links">
            <a href="{{ route('home') }}">Home</a>
            <a href="#" style="color: var(--gold);">Collections</a>
            <a href="#">About</a>
            <a href="{{ route('cart.index') }}" style="position: relative;">
                <i class="ion-ios-cart" style="font-size: 1.2rem;"></i>
                <!-- optional: cart item count badge -->
                {{-- <span style="position:absolute; top:-8px; right:-8px; background:var(--gold); color:white; font-size:0.65rem; padding:2px 6px; border-radius:50%;">3</span> --}}
            </a>
            <a href="{{ route('shop.index') }}">Shop</a>
            <a href="{{ route('store.index') }}">Store</a>
        </div>
    </div>
</nav>

    <!-- Main Content -->
    <div class="main-content">

        <!-- GAMIFICATION: Quest Banner -->
<div class="quest-banner">
    <div class="quest-info">
        <div class="quest-title">
            <span class="quest-icon">🎯</span>
            <span>Style Challenge: Create Your Perfect Look</span>
        </div>
        <div class="quest-desc">
            Purchase 3 items from different categories to unlock your reward!
        </div>
        <div class="quest-progress">
            <div class="quest-progress-bar"></div>
        </div>
        <div class="quest-progress-text">2 of 3 completed • 65% there!</div>

        <!-- Clickable link/div for quests -->
        <div class="quest-link" onclick="location.href='/quests'">
            View All Quests
        </div>
    </div>

    <div class="quest-reward">
        <div class="reward-icon">🎁</div>
        <div class="reward-text">Unlock Reward</div>
        <div class="reward-value">Free Premium Grooming Kit</div>
        <div style="font-size: 0.7rem; margin-top: 0.3rem; opacity: 0.7;">Worth $150</div>
    </div>
</div>

        <!-- INTERACTIVE FEATURES TOOLBAR -->
        <div class="features-toolbar">
            <div class="feature-card" onclick="openModal('profile')">
                <div class="feature-icon">🐕</div>
                <div class="feature-title">Pet Profile</div>
                <div class="feature-desc">Create personalized profile for AI recommendations</div>
            </div>

            <div class="feature-card" onclick="openModal('dress')">
                <div class="feature-icon">👗</div>
                <div class="feature-title">Dress Up</div>
                <div class="feature-desc">Style your virtual pet with our collection</div>
            </div>

            <div class="feature-card" onclick="openModal('subscription')">
                <div class="feature-icon">📦</div>
                <div class="feature-title">Surprise Box</div>
                <div class="feature-desc">Monthly curated luxury delivered</div>
            </div>

            <div class="feature-card" onclick="showQuests()">
                <div class="feature-icon">🏆</div>
                <div class="feature-title">Quests</div>
                <div class="feature-desc">Earn rewards & unlock exclusives</div>
            </div>
        </div>

        <!-- AI RECOMMENDATION SECTION -->
        <div class="ai-section">
            <div class="ai-header">
                <div class="ai-icon">✨</div>
                <div>
                    <div class="ai-title">Picked Just for Max</div>
                    <div class="ai-subtitle">Based on your poodle's profile: Playful, Diva, Winter-lover</div>
                </div>
            </div>
            <div style="font-size: 0.85rem; opacity: 0.9;">AI analyzed 2,500+ products to find these perfect matches 🧠</div>
        </div>

        <!-- FEATURED CATEGORIES - Editorial Cards -->



  <div style="margin-bottom: 5rem;">
            <div style="text-align: center; margin-bottom: 4rem;">
                <p style="font-size: 0.7rem; letter-spacing: 4px; text-transform: uppercase; color: var(--gold); font-weight: 600; margin-bottom: 1rem;">Beyond Fashion</p>
                <h2 style="font-family: 'Playfair Display', serif; font-size: 3rem; font-weight: 400; margin-bottom: 1rem;">Complete the Look</h2>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; max-width: 1400px; margin: 0 auto;">

                <!-- Accessories Card -->
                <div style="position: relative; overflow: hidden; border-radius: 16px; cursor: pointer; min-height: 400px; background: linear-gradient(135deg, #FAF6F0 0%, #E8E1D9 100%); box-shadow: 0 10px 40px rgba(0,0,0,0.1); transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);"
                     onmouseenter="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 20px 60px rgba(212, 175, 55, 0.3)';"
                     onmouseleave="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 40px rgba(0,0,0,0.1)';">

                    <!-- Background Pattern -->
                    <div style="position: absolute; top: -50px; right: -50px; width: 300px; height: 300px; background: radial-gradient(circle, rgba(212, 175, 55, 0.1), transparent); border-radius: 50%;"></div>

                    <!-- Content -->
                    <div style="position: relative; z-index: 2; padding: 3rem; display: flex; flex-direction: column; justify-content: space-between; height: 100%;">
                        <div>
                            <div style="width: 60px; height: 3px; background: var(--gold); margin-bottom: 2rem;"></div>
                            <h3 style="font-family: 'Playfair Display', serif; font-size: 2.5rem; font-weight: 600; color: var(--charcoal); margin-bottom: 1rem; line-height: 1.2;">
                                Luxury<br>Accessories
                            </h3>
                            <p style="color: #666; font-size: 1rem; line-height: 1.8; max-width: 350px; margin-bottom: 2rem;">
                                Handcrafted collars, silk bows, Italian leather leashes, and gold-plated tags.
                            </p>
                        </div>

                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div style="font-size: 0.75rem; letter-spacing: 2px; text-transform: uppercase; color: var(--gold); font-weight: 600; display: flex; align-items: center; gap: 0.5rem;">
                                Explore Collection
                                <span style="font-size: 1.2rem;">→</span>
                            </div>
                            <div style="font-size: 3.5rem; opacity: 0.15;">⭐</div>
                        </div>
                    </div>

                    <!-- Stats -->
                    <div style="position: absolute; top: 2rem; right: 2rem; background: white; padding: 1rem 1.5rem; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.1);">
                        <div style="font-family: 'Playfair Display', serif; font-size: 2rem; font-weight: 700; color: var(--gold);">120+</div>
                        <div style="font-size: 0.7rem; color: #999; text-transform: uppercase; letter-spacing: 1px;">Items</div>
                    </div>
                </div>

                <!-- Grooming Card -->
                <div style="position: relative; overflow: hidden; border-radius: 16px; cursor: pointer; min-height: 400px; background: linear-gradient(135deg, #2C2C2C 0%, #1a1a1a 100%); box-shadow: 0 10px 40px rgba(0,0,0,0.1); transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);"
                     onmouseenter="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 20px 60px rgba(212, 175, 55, 0.3)';"
                     onmouseleave="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 40px rgba(0,0,0,0.1)';">

                    <!-- Background Pattern -->
                    <div style="position: absolute; top: -50px; left: -50px; width: 300px; height: 300px; background: radial-gradient(circle, rgba(212, 175, 55, 0.2), transparent); border-radius: 50%;"></div>

                    <!-- Content -->
                    <div style="position: relative; z-index: 2; padding: 3rem; display: flex; flex-direction: column; justify-content: space-between; height: 100%;">
                        <div>
                            <div style="width: 60px; height: 3px; background: var(--gold); margin-bottom: 2rem;"></div>
                            <h3 style="font-family: 'Playfair Display', serif; font-size: 2.5rem; font-weight: 600; color: white; margin-bottom: 1rem; line-height: 1.2;">
                                Premium<br>Grooming
                            </h3>
                            <p style="color: rgba(255,255,255,0.8); font-size: 1rem; line-height: 1.8; max-width: 350px; margin-bottom: 2rem;">
                                Gold-infused shampoos, silk brushes, organic treatments, and spa essentials.
                            </p>
                        </div>

                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div style="font-size: 0.75rem; letter-spacing: 2px; text-transform: uppercase; color: var(--gold); font-weight: 600; display: flex; align-items: center; gap: 0.5rem;">
                                Shop Grooming
                                <span style="font-size: 1.2rem;">→</span>
                            </div>
                            <div style="font-size: 3.5rem; opacity: 0.15;">✨</div>
                        </div>
                    </div>

                    <!-- Stats -->
                    <div style="position: absolute; top: 2rem; right: 2rem; background: rgba(212, 175, 55, 0.2); backdrop-filter: blur(10px); padding: 1rem 1.5rem; border-radius: 12px; border: 1px solid var(--gold);">
                        <div style="font-family: 'Playfair Display', serif; font-size: 2rem; font-weight: 700; color: var(--gold);">85+</div>
                        <div style="font-size: 0.7rem; color: rgba(255,255,255,0.8); text-transform: uppercase; letter-spacing: 1px;">Products</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- PRODUCTS SECTION -->
        <!-- PRODUCTS SECTION -->
<div class="products-section">
    <div class="section-header">
        <h2 class="section-title">All Products</h2>
        <select class="filter-dropdown">
            <option>Sort by: Recommended</option>
            <option>Price: Low to High</option>
            <option>Price: High to Low</option>
            <option>Newest First</option>
            <option>Best Rated</option>
        </select>
    </div>

    <div class="products-grid">
        @foreach ($product_data as $data)
        <div class="product-card">
            <div class="product-image-wrap">
                <img src="{{ $data->getImage() }}" alt="{{ $data->title }}">

                {{-- Badge logic --}}
                @if($data->is_ai_pick)
                    <div class="ai-badge">
                        <span>✨</span>
                        {{ $data->ai_badge_text ?? "Perfect Match" }}
                    </div>
                @elseif($data->is_new)
                    <div class="product-badge">New</div>
                @elseif($data->is_limited)
                    <div class="product-badge">Limited</div>
                @endif
            </div>

            <div class="product-info">
                <div class="product-category">
                    {{ $data->category }}{{ $data->is_ai_pick ? ' • AI Pick' : '' }}
                </div>
                <div class="product-name">{{ $data->title }}</div>

                <div class="product-rating">
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $data->rating)
                            <i class="ion-ios-star"></i>
                        @else
                            <i class="ion-ios-star-outline"></i>
                        @endif
                    @endfor
                </div>

                <div class="product-price">${{ $data->getPrice() }}</div>

                <div class="product-actions">
                    <a href="{{ route('cart.addfromstorepage', ['id' => $data->id]) }}" class="btn-add-cart">Add to Cart</a>
                    <a href="{{ $data->getLink() }}" class="btn-quick-view">
                        <i class="ion-ios-eye"></i>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>



    <!-- PET PROFILE MODAL -->
    <div class="modal" id="profileModal">
        <div class="modal-content">
            <span class="modal-close" onclick="closeModal('profile')">&times;</span>
            <h2 class="modal-title">Create Your Pet's Profile</h2>
            <p style="color: #666; margin-bottom: 2rem;">Help us personalize your shopping experience with AI-powered recommendations</p>

            <form class="profile-grid">
                <div class="form-group">
                    <label>Pet Name *</label>
                    <input type="text" placeholder="e.g., Max" required>
                </div>

                <div class="form-group">
                    <label>Breed *</label>
                    <select required>
                        <option>Select Breed</option>
                        <option>Poodle</option>
                        <option>French Bulldog</option>
                        <option>Chihuahua</option>
                        <option>Pomeranian</option>
                        <option>Yorkshire Terrier</option>
                        <option>Shih Tzu</option>
                        <option>Other</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Size *</label>
                    <select required>
                        <option>Select Size</option>
                        <option>XS (2-5 lbs)</option>
                        <option>S (5-10 lbs)</option>
                        <option>M (10-20 lbs)</option>
                        <option>L (20-40 lbs)</option>
                        <option>XL (40+ lbs)</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Age</label>
                    <input type="number" placeholder="Years" min="0" max="25">
                </div>

                <div class="form-group personality-section">
                    <label>Personality Traits (Select all that apply)</label>
                    <div class="personality-grid">
                        <div class="personality-option" onclick="togglePersonality(this)">
                            <div class="personality-emoji">🎭</div>
                            <div class="personality-name">Playful</div>
                        </div>
                        <div class="personality-option" onclick="togglePersonality(this)">
                            <div class="personality-emoji">😌</div>
                            <div class="personality-name">Calm</div>
                        </div>
                        <div class="personality-option" onclick="togglePersonality(this)">
                            <div class="personality-emoji">⚡</div>
                            <div class="personality-name">Energetic</div>
                        </div>
                        <div class="personality-option" onclick="togglePersonality(this)">
                            <div class="personality-emoji">👑</div>
                            <div class="personality-name">Diva</div>
                        </div>
                        <div class="personality-option" onclick="togglePersonality(this)">
                            <div class="personality-emoji">🤗</div>
                            <div class="personality-name">Friendly</div>
                        </div>
                        <div class="personality-option" onclick="togglePersonality(this)">
                            <div class="personality-emoji">😴</div>
                            <div class="personality-name">Lazy</div>
                        </div>
                        <div class="personality-option" onclick="togglePersonality(this)">
                            <div class="personality-emoji">🎀</div>
                            <div class="personality-name">Fancy</div>
                        </div>
                        <div class="personality-option" onclick="togglePersonality(this)">
                            <div class="personality-emoji">🏃</div>
                            <div class="personality-name">Athletic</div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="submit-button">Save Profile & Get AI Recommendations</button>
            </form>
        </div>
    </div>

    <!-- DRESS UP MODAL -->
    <div class="modal" id="dressModal">
        <div class="modal-content" style="max-width: 1200px;">
            <span class="modal-close" onclick="closeModal('dress')">&times;</span>
            <h2 class="modal-title">Virtual Pet Designer Studio</h2>
            <p style="color: #666; margin-bottom: 2rem;">Create the perfect look for your furry friend!</p>

            <div class="dress-container">
                <!-- Left Sidebar -->
                <div class="dress-sidebar">
                    <div class="dress-category active">
                        <div class="dress-category-icon">🧥</div>
                        <div class="dress-category-name">Outerwear</div>
                    </div>
                    <div class="dress-category">
                        <div class="dress-category-icon">👕</div>
                        <div class="dress-category-name">Tops</div>
                    </div>
                    <div class="dress-category">
                        <div class="dress-category-icon">👗</div>
                        <div class="dress-category-name">Dresses</div>
                    </div>
                    <div class="dress-category">
                        <div class="dress-category-icon">🎀</div>
                        <div class="dress-category-name">Accessories</div>
                    </div>
                    <div class="dress-category">
                        <div class="dress-category-icon">⭐</div>
                        <div class="dress-category-name">Collars</div>
                    </div>
                </div>

                <!-- Canvas -->
                <div class="pet-canvas">
                    <div class="pet-silhouette">🐕</div>
                    <div class="canvas-hint">
                        Select a category to start styling →
                    </div>
                </div>

                <!-- Right Sidebar -->
                <div class="dress-sidebar">
                    <div style="background: var(--cream); padding: 1.5rem; border-radius: 12px; text-align: center;">
                        <div style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; color: #999; margin-bottom: 0.5rem;">Your Look</div>
                        <div style="font-size: 1.2rem; font-weight: 600; margin-bottom: 1rem;">Untitled</div>
                        <button class="submit-button" style="width: 100%; grid-column: auto;">Save Look</button>
                    </div>

                    <div style="background: var(--cream); padding: 1.5rem; border-radius: 12px; margin-top: 1rem;">
                        <div style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; color: #999; margin-bottom: 1rem;">Quick Actions</div>
                        <button style="width: 100%; padding: 0.8rem; background: white; border: 2px solid var(--gold); color: var(--charcoal); border-radius: 8px; font-size: 0.75rem; font-weight: 600; cursor: pointer; margin-bottom: 0.5rem;">
                            Shop This Look
                        </button>
                        <button style="width: 100%; padding: 0.8rem; background: white; border: 2px solid #ddd; color: var(--charcoal); border-radius: 8px; font-size: 0.75rem; font-weight: 600; cursor: pointer;">
                            Reset
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SUBSCRIPTION MODAL -->
    <div class="modal" id="subscriptionModal">
        <div class="modal-content">
            <span class="modal-close" onclick="closeModal('subscription')">&times;</span>
            <h2 class="modal-title">MojoLux Surprise Boxes</h2>
            <p style="color: #666; margin-bottom: 1rem; font-size: 1.1rem;">Curated luxury delivered monthly. Personalized for your pet's unique style.</p>
            <p style="color: #999; margin-bottom: 3rem; font-size: 0.9rem;">Cancel anytime • Free shipping • Exclusive items</p>

            <div class="subscription-grid">
                <div class="box-option">
                    <h3 class="box-title">Essential</h3>
                    <div class="box-price">$95<span>/month</span></div>
                    <ul class="box-features">
                        <li><span class="check-icon">✓</span> 3-4 Premium Items</li>
                        <li><span class="check-icon">✓</span> Seasonal Pieces</li>
                        <li><span class="check-icon">✓</span> Grooming Sample</li>
                        <li><span class="check-icon">✓</span> Free Shipping</li>
                    </ul>
                    <button class="submit-button" style="grid-column: auto;">Select Essential</button>
                </div>

                <div class="box-option selected">
                    <div class="box-popular">Most Popular</div>
                    <h3 class="box-title">Deluxe</h3>
                    <div class="box-price">$185<span>/month</span></div>
                    <ul class="box-features">
                        <li><span class="check-icon">✓</span> 5-6 Luxury Items</li>
                        <li><span class="check-icon">✓</span> Exclusive Designs</li>
                        <li><span class="check-icon">✓</span> Full-Size Grooming</li>
                        <li><span class="check-icon">✓</span> Accessories Included</li>
                        <li><span class="check-icon">✓</span> Priority Shipping</li>
                        <li><span class="check-icon">✓</span> 10% Store Credit</li>
                    </ul>
                    <button class="submit-button" style="grid-column: auto;">Select Deluxe</button>
                </div>

                <div class="box-option">
                    <h3 class="box-title">Ultimate</h3>
                    <div class="box-price">$395<span>/month</span></div>
                    <ul class="box-features">
                        <li><span class="check-icon">✓</span> 8-10 Elite Items</li>
                        <li><span class="check-icon">✓</span> Limited Editions</li>
                        <li><span class="check-icon">✓</span> Spa Treatment Kit</li>
                        <li><span class="check-icon">✓</span> Personalized Note</li>
                        <li><span class="check-icon">✓</span> VIP Concierge</li>
                        <li><span class="check-icon">✓</span> 20% Store Credit</li>
                        <li><span class="check-icon">✓</span> Early Access</li>
                    </ul>
                    <button class="submit-button" style="grid-column: auto;">Select Ultimate</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Modal Functions
        function openModal(type) {
            document.getElementById(type + 'Modal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeModal(type) {
            document.getElementById(type + 'Modal').classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        // Toggle Personality
        function togglePersonality(element) {
            element.classList.toggle('selected');
        }

        // Filter Category
        function filterCategory(category) {
            document.querySelectorAll('.category-circle').forEach(circle => {
                circle.classList.remove('active');
            });
            event.currentTarget.classList.add('active');
            console.log('Filtering by:', category);
        }

        // Show Quests
        function showQuests() {
            alert('Quest System activated! Complete daily challenges to earn rewards.');
        }

        // Close modal on outside click
        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                event.target.classList.remove('active');
                document.body.style.overflow = 'auto';
            }
        }

        // Dress Category Selection
        document.querySelectorAll('.dress-category').forEach(cat => {
            cat.addEventListener('click', function() {
                document.querySelectorAll('.dress-category').forEach(c => c.classList.remove('active'));
                this.classList.add('active');
            });
        });
    </script>
</body>
</html>

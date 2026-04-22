<?php

use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CheckoutPaymentController;
use App\Http\Controllers\CheckoutSuccessController;
use App\Http\Controllers\DailyQuizController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\DressUpController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MojoluxBoxController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home.index');

// Store / Shop
Route::get('/store', [ProductController::class, 'index'])->name('store.index');
Route::get('/shop', [ProductController::class, 'index'])->name('shop.index');

// Product Details
Route::get('/store/details/{id}', [DetailController::class, 'index'])->name('store.details');
Route::get('/shop/details/{id}', [DetailController::class, 'index'])->name('shop.details');

// Static pages
Route::get('/wag-club', fn () => view('pages.default.wagclub'))->name('wagclub.index');
Route::get('/mojoluxbox', fn () => view('pages.default.mojoluxbox'))->name('mojoluxbox');

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Pet routes
    Route::post('/pets', [PetController::class, 'store'])->name('pets.store');
    Route::put('/pets/{pet}', [PetController::class, 'update'])->name('pets.update');
    Route::get('/pets/{pet}/edit', [PetController::class, 'edit'])->name('pets.edit');

    // Cart
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::put('/cart', [CartController::class, 'store'])->name('cart.store');
    Route::get('/cart/add/{id}', [CartController::class, 'addToCartFromStore'])->name('cart.addfromstorepage');
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');

    // Checkout
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout/points', [CheckoutController::class, 'points'])->name('checkout.points');
    Route::post('/checkout/payment/{payment}/1', [CheckoutPaymentController::class, 'index'])->name('checkout.stripe');
    Route::get('/checkout/{payment}/testing', [CheckoutPaymentController::class, 'index'])->name('checkout.success.testing');
    Route::get('/checkout/success/{id}', [CheckoutSuccessController::class, 'index'])->name('checkout.success');
    Route::get('/checkout/points-preview', [CheckoutController::class, 'pointsPreview'])->name('checkout.points-preview');

    // DressUp
    Route::get('/dressup', [DressUpController::class, 'index'])->name('dressup');

    // Mojolux Box
    Route::post('/mojoluxbox/subscribe', [MojoluxBoxController::class, 'subscribe'])->name('mojoluxbox.subscribe');
    Route::get('/mojoluxbox/success', [MojoluxBoxController::class, 'success'])->name('mojoluxbox.success');
    Route::post('/mojoluxbox/cancel', [MojoluxBoxController::class, 'cancel'])->name('mojoluxbox.cancel');

    // Quests
    Route::get('/quests', [DailyQuizController::class, 'showQuests'])->name('quests');
    Route::post('/quests/memory', [GamesController::class, 'submitMemoryScore'])->name('quests.memory');
    Route::post('/quests/daily-quiz/submit', [DailyQuizController::class, 'submitQuizAnswer'])->name('quests.quiz.submit');
    Route::post('/quests/other', [GamesController::class, 'submitOtherGameScore'])->name('quests.other');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    /*
    |--------------------------------------------------------------------------
    | Dashboard (NOW USES CONTROLLER FOR ANALYTICS)
    |--------------------------------------------------------------------------
    */
    Route::get('/dashboard', [ProductController::class, 'adminDashboard'])
        ->name('admin.dashboard');

    /*
    |--------------------------------------------------------------------------
    | PRODUCTS
    |--------------------------------------------------------------------------
    */
    Route::get('/products', [ProductController::class, 'indexAdmin'])
        ->name('admin.products.index');

    Route::get('/products/create', [ProductController::class, 'create'])
        ->name('admin.products.create');

    Route::post('/products', [ProductController::class, 'store'])
        ->name('admin.products.store');

    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])
        ->name('admin.products.edit');

    Route::put('/products/{id}', [ProductController::class, 'update'])
        ->name('admin.products.update');

    Route::delete('/products/{id}', [ProductController::class, 'destroy'])
        ->name('admin.products.destroy');

    // Users
    Route::get('/users', [UserAdminController::class, 'index'])->name('admin.users.index');
    Route::patch('/users/{user}/role', [UserAdminController::class, 'updateRole'])->name('admin.users.role');

    // Quiz
    Route::get('/quiz', [QuizController::class, 'index'])->name('admin.quiz.index');
    Route::get('/quiz/create', [QuizController::class, 'create'])->name('admin.quiz.create');
    Route::post('/quiz', [QuizController::class, 'store'])->name('admin.quiz.store');
    Route::get('/quiz/{quiz}/edit', [QuizController::class, 'edit'])->name('admin.quiz.edit');
    Route::put('/quiz/{quiz}', [QuizController::class, 'update'])->name('admin.quiz.update');
    Route::delete('/quiz/{quiz}', [QuizController::class, 'destroy'])->name('admin.quiz.destroy');
});

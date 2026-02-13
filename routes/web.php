<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CheckoutPaymentController;
use App\Http\Controllers\CheckoutSuccessController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;
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
Route::get('/wag-club', fn () => view('pages.default.wagclub'))->name('wagclub');
Route::get('/style-lab', fn () => view('pages.default.stylelab'))->name('stylelab');
Route::get('/quests', fn () => view('pages.default.quests'))->name('quests');

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
});

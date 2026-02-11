<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/lang/{locale}', [App\Http\Controllers\LanguageController::class, 'switch'])->name('lang.switch');

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::resource('products', ProductController::class)->only(['index', 'show']);
Route::resource('categories', CategoryController::class)->only(['index', 'show']);
Route::get('/shop/{slug}', [App\Http\Controllers\ShopController::class, 'show'])->name('shop.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Addresses
    Route::resource('addresses', App\Http\Controllers\AddressController::class);

    // Checkout & Orders
    Route::get('/checkout', [App\Http\Controllers\OrderController::class, 'checkout'])->name('checkout');
    Route::post('/checkout', [App\Http\Controllers\OrderController::class, 'store'])->name('checkout.store');
    Route::get('/orders', [App\Http\Controllers\OrderController::class, 'index'])->name('orders.index');
    Route::get('/checkout/finish', [App\Http\Controllers\OrderController::class, 'finish'])->name('checkout.finish');
    Route::get('/orders/{order}', [App\Http\Controllers\OrderController::class, 'show'])->name('orders.show');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Admin Login Routes (before middleware)
Route::get('/admin/login', [App\Http\Controllers\Admin\LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [App\Http\Controllers\Admin\LoginController::class, 'login'])->name('admin.login.store');
Route::post('/admin/logout', [App\Http\Controllers\Admin\LoginController::class, 'logout'])->name('admin.logout');

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('products', App\Http\Controllers\Admin\ProductController::class);
    Route::delete('/products/images/{id}', [App\Http\Controllers\Admin\ProductController::class, 'destroyImage'])->name('products.images.destroy');
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('vendors', App\Http\Controllers\Admin\VendorController::class)->only(['index', 'edit', 'update']);
    Route::resource('orders', App\Http\Controllers\Admin\OrderController::class)->only(['index', 'show']);
    Route::post('/orders/{order}/confirm-payment', [App\Http\Controllers\Admin\OrderController::class, 'confirmPayment'])->name('orders.confirm-payment');
    Route::resource('payouts', App\Http\Controllers\Admin\PayoutController::class)->only(['index', 'update']);
    Route::resource('contacts', App\Http\Controllers\ContactController::class)->only(['index', 'show', 'destroy']);
    Route::patch('/contacts/{id}/read', [App\Http\Controllers\ContactController::class, 'markAsRead'])->name('contacts.read');
});

Route::post('/contact', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');

Route::get('auth/{provider}/redirect', [App\Http\Controllers\Auth\SocialController::class, 'redirect'])->name('social.redirect');
Route::get('auth/{provider}/callback', [App\Http\Controllers\Auth\SocialController::class, 'callback'])->name('social.callback');

// Vendor Routes
Route::get('/vendor/register', [App\Http\Controllers\Vendor\AuthController::class, 'showRegisterForm'])->name('vendor.register');
Route::post('/vendor/register', [App\Http\Controllers\Vendor\AuthController::class, 'register'])->name('vendor.register.store');

Route::middleware(['auth', 'vendor'])->prefix('vendor')->name('vendor.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Vendor\DashboardController::class, 'index'])->name('dashboard');
    Route::put('/dashboard/settings', [App\Http\Controllers\Vendor\DashboardController::class, 'update'])->name('settings.update');
    Route::resource('products', App\Http\Controllers\Vendor\ProductController::class);
    Route::resource('orders', App\Http\Controllers\Vendor\OrderController::class)->only(['index', 'show', 'update']);
    Route::get('/wallet', [App\Http\Controllers\Vendor\WalletController::class, 'index'])->name('wallet.index');
    Route::post('/wallet', [App\Http\Controllers\Vendor\WalletController::class, 'store'])->name('wallet.store');
});

Route::post('/payments/midtrans-notification', [App\Http\Controllers\MidtransNotificationController::class, 'handle']);

require __DIR__ . '/auth.php';

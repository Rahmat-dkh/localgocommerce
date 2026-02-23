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

// Sitemap
Route::get('/sitemap.xml', function () {
    $products = \App\Models\Product::latest()->get();
    $categories = \App\Models\Category::all();

    return response()->view('sitemap', [
        'products' => $products,
        'categories' => $categories,
    ])->header('Content-Type', 'text/xml');
});

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

// Temporary Fix for Storage Link (Visit: yourdomain.com/link-storage)
Route::get('/link-storage', function () {
    try {
        \Illuminate\Support\Facades\Artisan::call('storage:link');
        $msg = "Artisan storage:link executed. ";
    } catch (\Exception $e) {
        $msg = "Artisan storage:link failed: " . $e->getMessage() . ". ";
    }

    // Manual Symlink fallback for some hostings
    $target = storage_path('app/public');
    $shortcut = public_path('storage');

    if (!file_exists($shortcut)) {
        if (symlink($target, $shortcut)) {
            $msg .= "Manual symlink created successfully!";
        } else {
            $msg .= "Manual symlink failed. Contact hosting support.";
        }
    } else {
        $msg .= "Storage shortcut already exists.";
    }

    return $msg;
});

// Diagnostic route for images
Route::get('/debug-images', function () {
    $products = \App\Models\Product::take(10)->get();
    $output = "<h1>Image Diagnostics</h1><table border='1'><tr><th>ID</th><th>Name</th><th>DB Path</th><th>Resolved URL</th></tr>";
    foreach ($products as $p) {
        $output .= "<tr><td>{$p->id}</td><td>{$p->name}</td><td>{$p->image}</td><td>{$p->image_url}</td></tr>";
    }
    $output .= "</table>";
    return $output;
});

// Reset Products Route (Visit: yourdomain.com/reset-produk)
Route::get('/reset-produk', function () {
    try {
        \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // 1. Delete physical files ONLY from 'products' storage folder
        $files = \Illuminate\Support\Facades\Storage::disk('public')->allFiles('products');
        \Illuminate\Support\Facades\Storage::disk('public')->delete($files);

        // 2. Clear Database Tables
        \App\Models\Review::truncate();      // Clear old reviews
        \App\Models\OrderItem::truncate();   // Clear old order items to avoid errors
        \App\Models\ProductImage::truncate();
        \App\Models\Product::truncate();

        \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        return "Reset Berhasil! Produk, Gambar, dan Ulasan telah dikosongkan total.";
    } catch (\Exception $e) {
        return "Gagal Reset: " . $e->getMessage();
    }
});

require __DIR__ . '/auth.php';

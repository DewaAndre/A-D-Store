<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\ImagesController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CheckoutsController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminAuthController;




// Halaman utama
Route::get('/', [HomeController::class, 'index']);

// Login dan Register
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// arival
Route::get('/image/detail/{id_image}', [ImageController::class, 'detail'])->name('image.detail');

// Koleksi produk
Route::get('/collection', [CollectionController::class, 'index'])->name('collection.index');

// Halaman detail gambar berdasarkan ID
Route::get('/detail/{id}', [ImageController::class, 'show'])->name('image.detail');

// Rute keranjang belanja (menggunakan middleware auth)
// In routes/web.php
Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::delete('/cart/remove/{itemId}', [CartController::class, 'deleteItem'])->name('cart.remove');
    Route::post('/cart/update/{itemId}/{action}', [CartController::class, 'updateItemQuantity'])->name('cart.update');
    Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('checkout');
});

Route::get('/cart/count', function () {
    $userId = auth()->id();

    $cartItems = DB::table('cart_items')
                   ->join('images', 'cart_items.id_image', '=', 'images.id')
                   ->where('cart_items.id_cart', function ($query) use ($userId) {
                       $query->select('id')
                             ->from('carts')
                             ->where('id_user', $userId)
                             ->limit(1);
                   })
                   ->select('images.id', DB::raw('SUM(cart_items.quantity) as total_quantity'))
                   ->groupBy('images.id')
                   ->get();

    return response()->json($cartItems);
});

Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout.show');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

// Halaman sukses setelah order
Route::get('/order', [OrderController::class, 'showOrders'])->name('order.index');
Route::get('/order/success', [OrderController::class, 'success'])->name('order.success');



// Admin
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.index'); 
    })->name('admin.index');

    // Route untuk menampilkan halaman login
    Route::get('/login', [AdminLoginController::class, 'index'])->name('admin.login');
    
    // Route untuk menangani login (POST)
    Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');

    // Route untuk logout
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

    
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');

    Route::get('images', [ImagesController::class, 'index'])->name('images');
    Route::get('image', [ImagesController::class, 'index'])->name('admin.image');
    Route::get('images/{id}/edit', [ImagesController::class, 'edit'])->name('images.edit');
    Route::put('images/{id}', [ImagesController::class, 'update'])->name('images.update');
    Route::delete('images/{id}', [ImagesController::class, 'destroy'])->name('images.destroy');
    Route::get('create', [ImagesController::class, 'create'])->name('images.create');
    Route::post('store', [ImagesController::class, 'store'])->name('images.store');

    Route::get('/user', [UserController::class, 'index'])->name('admin.user');
    Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('admin.edit-user');
    Route::delete('users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');

    Route::get('/checkout', [CheckoutsController::class, 'index'])->name('admin.checkout');
    Route::get('/checkouts', [CheckoutsController::class, 'index'])->name('admin.checkouts.index');
    Route::get('checkouts/{checkout}', [CheckoutsController::class, 'show'])->name('admin.checkouts.show');
    Route::put('admin/checkouts/{checkout}/markAsPaid', [CheckoutsController::class, 'markAsPaid'])->name('admin.checkouts.markAsPaid');
    Route::put('admin/checkout/{id}/markAsPaid', [CheckoutsController::class, 'markAsPaid'])->name('admin.checkouts.markAsPaid');

});



<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    $products = Product::limit(6)->get(); // Only show 6 featured products on homepage
    return view('welcome', compact('products'));
});

// Products routes
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// Cart routes
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::get('/cart', [CartController::class, 'get'])->name('cart.get');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

// Debug route to clear cart session (remove in production)
Route::get('/debug/clear-cart', function() {
    session()->forget('cart');
    return response()->json(['message' => 'Cart session cleared', 'success' => true]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin routes - protected with authentication
Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/products', [AdminController::class, 'products'])->name('products');
    Route::get('/products/create', [AdminController::class, 'createProduct'])->name('products.create');
    Route::post('/products', [AdminController::class, 'storeProduct'])->name('products.store');
    Route::get('/products/{product}/edit', [AdminController::class, 'editProduct'])->name('products.edit');
    Route::put('/products/{product}', [AdminController::class, 'updateProduct'])->name('products.update');
    Route::delete('/products/{product}', [AdminController::class, 'deleteProduct'])->name('products.destroy');
    
    // API routes for real-time features
    Route::get('/api/stats', [AdminController::class, 'getStats'])->name('api.stats');
    Route::get('/api/activity', [AdminController::class, 'getActivity'])->name('api.activity');
});

require __DIR__.'/auth.php';

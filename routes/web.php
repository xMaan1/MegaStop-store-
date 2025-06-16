<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    $products = Product::all();
    return view('welcome', compact('products'));
});

// Cart routes
Route::get('/cart', function () {
    return session('cart', []);
});

Route::post('/cart/add', function (\Illuminate\Http\Request $request) {
    $cart = session('cart', []);
    $id = $request->input('id');
    $cart[$id] = ($cart[$id] ?? 0) + 1;
    session(['cart' => $cart]);
    return $cart;
});

Route::post('/cart/remove', function (\Illuminate\Http\Request $request) {
    $cart = session('cart', []);
    $id = $request->input('id');
    if (isset($cart[$id])) {
        $cart[$id]--;
        if ($cart[$id] <= 0) unset($cart[$id]);
    }
    session(['cart' => $cart]);
    return $cart;
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

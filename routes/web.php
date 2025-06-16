<?php

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

// Admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/products', [AdminController::class, 'products'])->name('products');
    Route::get('/products/create', [AdminController::class, 'createProduct'])->name('products.create');
    Route::post('/products', [AdminController::class, 'storeProduct'])->name('products.store');
    Route::get('/products/{product}/edit', [AdminController::class, 'editProduct'])->name('products.edit');
    Route::put('/products/{product}', [AdminController::class, 'updateProduct'])->name('products.update');
    Route::delete('/products/{product}', [AdminController::class, 'deleteProduct'])->name('products.destroy');
});

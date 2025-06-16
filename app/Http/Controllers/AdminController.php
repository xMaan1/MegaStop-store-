<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        $totalProducts = Product::count();
        $totalRevenue = 0; // You can calculate this based on orders
        $lowStockProducts = Product::where('stock', '<', 5)->count();
        
        return view('admin.dashboard', compact('products', 'totalProducts', 'totalRevenue', 'lowStockProducts'));
    }

    public function products()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.products', compact('products'));
    }

    public function createProduct()
    {
        return view('admin.create-product');
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|url'
        ]);

        Product::create($request->all());

        return redirect()->route('admin.products')->with('success', 'Product created successfully!');
    }

    public function editProduct(Product $product)
    {
        return view('admin.edit-product', compact('product'));
    }

    public function updateProduct(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|url'
        ]);

        $product->update($request->all());

        return redirect()->route('admin.products')->with('success', 'Product updated successfully!');
    }

    public function deleteProduct(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products')->with('success', 'Product deleted successfully!');
    }

    // API methods for real-time features
    public function getStats()
    {
        $totalProducts = Product::count();
        $totalRevenue = rand(25000, 50000); // Simulated - replace with actual order calculations
        $totalOrders = rand(150, 300); // Simulated - replace with actual order count
        $lowStockProducts = Product::where('stock', '<', 5)->count();

        return response()->json([
            'totalProducts' => $totalProducts,
            'totalRevenue' => $totalRevenue,
            'totalOrders' => $totalOrders,
            'lowStockProducts' => $lowStockProducts,
        ]);
    }

    public function getActivity()
    {
        // Simulated activity feed - replace with actual activity tracking
        $activities = [
            [
                'id' => rand(1000, 9999),
                'type' => 'order',
                'message' => 'New order #' . rand(1000, 9999) . ' received',
                'time' => now()->subMinutes(rand(1, 30))->diffForHumans(),
                'icon' => '🛍️'
            ],
            [
                'id' => rand(1000, 9999),
                'type' => 'product',
                'message' => 'Product "' . collect(['iPhone 15', 'MacBook Pro', 'AirPods Pro', 'iPad Air'])->random() . '" stock updated',
                'time' => now()->subMinutes(rand(1, 60))->diffForHumans(),
                'icon' => '📦'
            ],
            [
                'id' => rand(1000, 9999),
                'type' => 'user',
                'message' => 'New user registered',
                'time' => now()->subMinutes(rand(1, 120))->diffForHumans(),
                'icon' => '👤'
            ]
        ];

        return response()->json($activities);
    }
}

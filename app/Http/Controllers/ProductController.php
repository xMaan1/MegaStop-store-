<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();
        
        // Filter by category if provided
        if ($request->has('category') && $request->category != '') {
            $query->where('category', $request->category);
        }
        
        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }
        
        // Sort functionality
        $sort = $request->get('sort', 'name');
        $direction = $request->get('direction', 'asc');
        
        if (in_array($sort, ['name', 'price', 'created_at'])) {
            $query->orderBy($sort, $direction);
        }
        
        $products = $query->paginate(12);
        $categories = Product::distinct('category')->pluck('category')->filter();
        
        return view('products.index', compact('products', 'categories'));
    }
    
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
}

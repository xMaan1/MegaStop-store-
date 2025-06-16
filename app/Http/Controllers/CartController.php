<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $productId = $request->input('id');
        $quantity = $request->input('quantity', 1);
        
        $product = Product::find($productId);
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }
        
        $cart = session()->get('cart', []);
        
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => $quantity
            ];
        }
        
        session()->put('cart', $cart);
        
        return response()->json([
            'success' => true,
            'message' => 'Product added to cart',
            'cart_count' => array_sum(array_column($cart, 'quantity')),
            'cart' => $cart
        ]);
    }
    
    public function remove(Request $request)
    {
        $productId = $request->input('id');
        $cart = session()->get('cart', []);
        
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
        }
        
        return response()->json([
            'success' => true,
            'cart_count' => array_sum(array_column($cart, 'quantity')),
            'cart' => $cart
        ]);
    }
    
    public function update(Request $request)
    {
        $productId = $request->input('id');
        $quantity = $request->input('quantity', 1);
        $cart = session()->get('cart', []);
        
        if (isset($cart[$productId])) {
            if ($quantity <= 0) {
                unset($cart[$productId]);
            } else {
                $cart[$productId]['quantity'] = $quantity;
            }
            session()->put('cart', $cart);
        }
        
        return response()->json([
            'success' => true,
            'cart_count' => array_sum(array_column($cart, 'quantity')),
            'cart' => $cart
        ]);
    }
      public function get()
    {
        $cart = session()->get('cart', []);
        
        // Clean up any invalid cart items
        $cleanCart = [];
        foreach ($cart as $key => $item) {
            if (is_array($item) && isset($item['quantity']) && isset($item['name']) && isset($item['price'])) {
                $cleanCart[$key] = $item;
            }
        }
        
        // Update session with clean cart
        session()->put('cart', $cleanCart);
        
        return response()->json([
            'cart' => $cleanCart,
            'cart_count' => array_sum(array_column($cleanCart, 'quantity')),
            'total' => array_sum(array_map(function($item) {
                return $item['price'] * $item['quantity'];
            }, $cleanCart))
        ]);
    }
    
    public function clear()
    {
        session()->forget('cart');
        return response()->json(['success' => true, 'cart_count' => 0]);
    }
}

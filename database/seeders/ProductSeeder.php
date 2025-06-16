<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{    public function run(): void
    {
        Product::insert([
            [
                'name' => 'Golden Watch',
                'description' => 'Luxury gold watch with black accents.',
                'category' => 'accessories',
                'price' => 299.99,
                'image' => 'https://images.unsplash.com/photo-1519125323398-675f0ddb6308',
                'stock' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Black Leather Bag',
                'description' => 'Elegant black leather bag with gold zippers.',
                'category' => 'bags',
                'price' => 149.99,
                'image' => 'https://images.unsplash.com/photo-1526178613658-3f1622045557',
                'stock' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'White Sneakers',
                'description' => 'Classic white sneakers with gold logo.',
                'category' => 'footwear',
                'price' => 89.99,
                'image' => 'https://images.unsplash.com/photo-1517841905240-472988babdf9',
                'stock' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Premium Headphones',
                'description' => 'High-quality wireless headphones with noise cancellation.',
                'category' => 'electronics',
                'price' => 199.99,
                'image' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e',
                'stock' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Smart Phone',
                'description' => 'Latest smartphone with advanced features.',
                'category' => 'electronics',
                'price' => 699.99,
                'image' => 'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9',
                'stock' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Stylish Sunglasses',
                'description' => 'UV protection sunglasses with gold frames.',
                'category' => 'accessories',
                'price' => 79.99,
                'image' => 'https://images.unsplash.com/photo-1511499767150-a48a237f0083',
                'stock' => 25,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

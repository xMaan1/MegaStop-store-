<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::insert([
            [
                'name' => 'Golden Watch',
                'description' => 'Luxury gold watch with black accents.',
                'price' => 299.99,
                'image' => 'https://images.unsplash.com/photo-1519125323398-675f0ddb6308',
                'stock' => 10,
            ],
            [
                'name' => 'Black Leather Bag',
                'description' => 'Elegant black leather bag with gold zippers.',
                'price' => 149.99,
                'image' => 'https://images.unsplash.com/photo-1526178613658-3f1622045557',
                'stock' => 15,
            ],
            [
                'name' => 'White Sneakers',
                'description' => 'Classic white sneakers with gold logo.',
                'price' => 89.99,
                'image' => 'https://images.unsplash.com/photo-1517841905240-472988babdf9',
                'stock' => 20,
            ],
        ]);
    }
}

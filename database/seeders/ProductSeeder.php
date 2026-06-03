<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'name' => 'Minimal Watch',
            'image' => 'https://images.unsplash.com/photo-1523275335684-37898b6baf30',
            'price' => 29.99,
            'category' => 'Accessories',
            'description' => 'A stylish minimal watch for daily use.',
        ]);

        Product::create([
            'name' => 'Sport Sneakers',
            'image' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff',
            'price' => 49.99,
            'category' => 'Shoes',
            'description' => 'Comfortable sneakers designed for active lifestyle.',
        ]);

        Product::create([
            'name' => 'Wireless Headphones',
            'image' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e',
            'price' => 34.99,
            'category' => 'Electronics',
            'description' => 'High quality wireless headphones with modern design.',
        ]);

        Product::create([
            'name' => 'Smart Watch',
            'image' => 'https://images.unsplash.com/photo-1546868871-7041f2a55e12',
            'price' => 59.99,
            'category' => 'Electronics',
            'description' => 'A smart watch with useful daily features.',
        ]);
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Accessories',
            'Electronics',
            'Shoes',
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate([
                'name' => $category,
            ]);
        }
    }
}
<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Seafood',
                'slug' => 'seafood',
                'description' => 'Seafood adalah makanan yang berasal dari laut',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Vegetarian',
                'slug' => 'vegetarian',
                'description' => 'Vegetarian food made from plant-based ingredients',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Italian',
                'slug' => 'italian',
                'description' => 'Italian cuisine known for its pasta and pizza',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mexican',
                'slug' => 'mexican',
                'description' => 'Mexican cuisine with its flavorful spices and tortillas',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Asian',
                'slug' => 'asian',
                'description' => 'Asian cuisine with its diverse flavors and ingredients',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Desserts',
                'slug' => 'desserts',
                'description' => 'Delicious desserts to satisfy your sweet tooth',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Category::insert($data);

    }
}

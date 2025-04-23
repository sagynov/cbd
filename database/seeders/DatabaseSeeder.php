<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $category1 = Category::factory()->create([
            'image' => 'https://i.imgur.com/QkIa5tT.jpeg'
        ]);
        $category2 = Category::factory()->create([
            'image' => 'https://i.imgur.com/ZANVnHE.jpeg'
        ]);
        $category3 = Category::factory()->create([
            'image' => 'https://i.imgur.com/Qphac99.jpeg'
        ]);
        Product::factory()->create([
            'category_id' => $category1->id,
            'images' => ['https://i.imgur.com/cHddUCu.jpeg', 'https://i.imgur.com/CFOjAgK.jpeg']
        ]);
        Product::factory()->create([
            'category_id' => $category2->id,
            'images' => ['https://i.imgur.com/cSytoSD.jpeg', 'https://i.imgur.com/WwKucXb.jpeg']
        ]);
        Product::factory()->create([
            'category_id' => $category3->id,
            'images' => ['https://i.imgur.com/ZKGofuB.jpeg', 'https://i.imgur.com/GJi73H0.jpeg']
        ]);
       
    }
}

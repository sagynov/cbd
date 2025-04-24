<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Menu::create([
            'name' => 'Main Menu',
            'slug' => 'main-menu',
            'items' => [
                'Home' => '/',
                'About' => '/about',
                'Products' => '/products',
                'Contact' => '/contact',
            ],
        ]);
        Menu::create([
            'name' => 'Footer Menu',
            'slug' => 'footer-menu',
            'items' => [
                'Home' => '/',
                'About' => '/about',
                'Products' => '/products',
                'Contact' => '/contact',
            ],
        ]);
    }
}

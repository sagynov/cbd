<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::with('category')->get();
        $banners = Banner::all();
        return view('main', compact('categories', 'products', 'banners'));
    }
}

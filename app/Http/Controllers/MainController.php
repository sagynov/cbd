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
        $categories = Category::where('show_in_menu', 1)->get();
        $products = Product::where('is_active', 1)->limit(10)->get();
        $banners = Banner::all();
        return view('main', compact('categories', 'products', 'banners'));
    }
}

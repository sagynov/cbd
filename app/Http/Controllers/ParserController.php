<?php

namespace App\Http\Controllers;

ini_set('max_execution_time', '30000');
set_time_limit(36000);

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ParserController extends Controller
{
    public function products()
    {
        $products = Storage::disk('local')->get('products.json');
        $products = json_decode($products, true);
        
        $models = Product::where('has_variants', 0)->limit(10)->get();
        $getModel = [];
        foreach($models as $model) {
            $getModel[$model->id] = $model;
        }
        foreach($products as $product) {
            if(isset($getModel[$product['id']])){
                $modelOfProduct = $getModel[$product['id']];
                // $model_images = [];
                // foreach($product['images'] as $image) {
                //     $model_image_path = 'products/' . pathinfo($image, PATHINFO_FILENAME).'.jpg';
                //     copy('http:'.$image, storage_path('app/public/'. $model_image_path));
                //     $model_images[] = $model_image_path;
                // }
                // $modelOfProduct->update([
                //     'title' => $product['title'],
                //     'type' => $product['type'],
                //     'slug' => $product['handle'],
                //     'description' => $product['description'],
                //     'content' => $product['content'],
                //     'images' => $model_images,
                //     'is_active' => 1,
                // ]);
                $productOptions = array_map(function ($item) {
                    return strtolower($item);
                }, $product['options']);
                
                foreach($product['variants'] as $variant) {
                    if(isset($variant['featured_image'])) {
                        $image_path = 'products/' . pathinfo($variant['featured_image']['src'], PATHINFO_FILENAME).'.jpg';
                        // copy('http:'.$variant['featured_image']['src'], storage_path('app/public/'. $image_path));
                    }
                    $modelOfProduct->variants()->create([
                        'id' => $variant['id'],
                        'product_id' => $modelOfProduct->id,
                        'sku' => $variant['sku'],
                        'images' => [(@$image_path ?? null)],
                        'price' => ($variant['price'] / 100) * 525,
                        'old_price' => @$variant['compare_at_price'] ? ($variant['compare_at_price'] / 100) * 525 : null,
                        'stock' => 100,
                        ...array_combine($productOptions, $variant['options'])
                    ]);
                }
                $modelOfProduct->update([
                    'has_variants' => 1,
                ]);
            }
        }
        
    }
    public function index()
    {
        $response = Http::get('https://www.cbdmd.com/collections/all?page=1&pscroll=-591');
        $body = $response->body();
        preg_match_all('/<script type="application\/json" data-klaviyo-item="">(.*?)<\/script>/s', $body, $matches);
        $products = array_map(function ($item) {
            return json_decode($item, true);
        }, $matches[1]);

        // Products relation to categories
        
        // $categories = Category::all();
        // $category_id = [];
        // foreach($categories as $category) {
        //     $category_id[$category->name] = $category->id;
        // }
        // foreach($products as $product) {
        //     $model = Product::create([
        //         'id' => $product['ProductID'],
        //         'name' => $product['Name'],
        //         'slug' => Str::slug($product['Name']),
        //     ]);
        //     $model->categories()->sync(array_map(function ($item) use ($category_id) {
        //         return $category_id[$item];
        //     }, $product['Categories']));
        // }

        // Categories create
        
        // Category::insert(array_map(function ($item) {
        //     return [
        //         'name' => $item,
        //         'slug' => Str::slug($item),
        //         'title' => $item,
        //     ];
        // }, $data));
    }
}

<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.

use App\Models\Category;
use App\Models\Product;
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
});

Breadcrumbs::for('category.show', function (BreadcrumbTrail $trail, Category $category) {
    $trail->parent('home');
    $trail->push($category->name, route('category.show', $category));
});

Breadcrumbs::for('product.show', function (BreadcrumbTrail $trail, Product $product) {
    $trail->parent('home');
    $trail->push($product->name, route('product.show', $product));
});

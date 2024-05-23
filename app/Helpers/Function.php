<?php

use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Provider;
use App\Models\Size;
use Illuminate\Support\Facades\Auth;

function getAllCategories()
{
    $categories = new Category();
    return $categories->getAll();
}

function getAllBrands()
{
    $brands = new Brand();
    return $brands->getAll();
}

function getAllColors()
{
    $colors = new Color();
    return $colors->getAll();
}

function getCountCart()
{
    $userId = Auth::user()->id;
    $count_cart = 0;
    if ($userId) {
        $cart = new Cart();
        $count_cart = $cart->count_cart($userId);
    }
    return $count_cart;
}

function getAllProduct()
{
    $products = new Product();
    return $products->getAll();
}
function getAllProvider()
{
    $providers = new Provider();
    return $providers->getAll();
}
function getAllSize()
{
    $size = new Size();
    return $size->getAll();
}

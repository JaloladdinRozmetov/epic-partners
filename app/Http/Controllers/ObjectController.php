<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ObjectController extends Controller
{
    public function index()
    {
        $products = Product::query()->with('categories')->limit(5)->get();

        $categories = Category::query()->get();
        return view('index',compact('products','categories'));
    }
}

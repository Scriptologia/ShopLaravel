<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::has('products')->withCount('products')->with('translations')->get();
        $products = Product::with('translations')->take(6)->get();
        return view('front.index', compact('categories', 'products'));
    }
}

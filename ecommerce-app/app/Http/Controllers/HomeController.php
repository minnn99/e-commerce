<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        // Get first 8 products for the homepage
        $products = Product::orderBy('created_at', 'desc')->take(8)->get();
        return view('index', compact('products'));
    }
}

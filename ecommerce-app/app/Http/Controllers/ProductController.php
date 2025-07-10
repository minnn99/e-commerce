<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('itemlist', compact('products'));
    }
    
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('item', compact('product'));
    }
}

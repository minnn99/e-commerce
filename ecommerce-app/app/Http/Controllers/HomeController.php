<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Check if mobile device (simplified detection)
        $isMobile = preg_match('/Mobile|Android|iPhone|iPad/', $request->header('User-Agent'));
        
        // PC: 8 items (2行4列), SP: 6 items (2行3列)
        $itemCount = $isMobile ? 6 : 8;
        
        $products = Product::orderBy('created_at', 'desc')->take($itemCount)->get();
        return view('index', compact('products', 'isMobile'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::orderBy('created_at', 'desc');
        
        // ジャンルフィルター（URLパラメータから）
        if ($request->has('genre') && $request->genre) {
            $query->where('genre', $request->genre);
        }
        
        // 検索フォームからのジャンルフィルター（数字ベース）
        if ($request->has('field') && $request->field) {
            $genreMap = [
                '1' => 'Tシャツ',
                '2' => 'Yシャツ',
                '3' => 'セーター',
                '4' => 'ロング',
                '5' => 'コート',
                '6' => 'ジャケット',
                '7' => 'パンツ',
                '8' => 'シューズ',
                '9' => 'アクセサリー'
            ];
            
            if (isset($genreMap[$request->field])) {
                $query->where('genre', $genreMap[$request->field]);
                $selectedGenre = $genreMap[$request->field];
            }
        }
        
        $products = $query->get();
        $selectedGenre = $request->genre ?? ($selectedGenre ?? null);
        
        return view('itemlist', compact('products', 'selectedGenre'));
    }
    
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('item', compact('product'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('cart');
    }

    public function add(Request $request)
    {
        // カートに商品を追加するロジック
        return redirect()->route('cart.index');
    }

    public function remove($id)
    {
        // カートから商品を削除するロジック
        return redirect()->route('cart.index');
    }
}

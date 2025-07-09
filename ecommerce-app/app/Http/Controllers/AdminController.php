<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function loginForm()
    {
        return view('adminlogin');
    }

    public function login(Request $request)
    {
        // 管理者ログイン処理
        return redirect()->route('admin.dashboard');
    }

    public function dashboard()
    {
        return view('admin');
    }
}

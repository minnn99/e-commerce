<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AdminController extends Controller
{
    public function loginForm()
    {
        return view('adminlogin');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレス形式で入力してください(XXXX@XXXX.com)',
            'password.required' => 'パスワードを入力してください',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['email' => 'ログイン情報が正しくありません。']);
    }

    public function dashboard()
    {
        return view('admin');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }

    public function userEdit()
    {
        return view('adminuseredit');
    }

    public function itemEdit()
    {
        return view('adminitemedit');
    }

    public function userStore(Request $request)
    {
        // ユーザー登録処理（後で実装）
        return redirect()->route('admin.dashboard')->with('success', 'ユーザーを登録しました');
    }

    public function itemStore(Request $request)
    {
        // 商品登録処理（後で実装）
        return redirect()->route('admin.dashboard')->with('success', '商品を登録しました');
    }
}

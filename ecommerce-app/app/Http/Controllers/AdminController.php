<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            session(['admin_logged_in' => true, 'admin_id' => $admin->id]);
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['error' => 'ログイン情報が正しくありません。']);
    }

    public function dashboard()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        return view('admin');
    }

    public function logout(Request $request)
    {
        $request->session()->forget(['admin_logged_in', 'admin_id']);
        return redirect()->route('admin.login');
    }

    public function userEdit()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        return view('adminuseredit');
    }

    public function itemEdit()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        return view('adminitemedit');
    }

    public function userStore(Request $request)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        // ユーザー登録処理（後で実装）
        return redirect()->route('admin.dashboard')->with('success', 'ユーザーを登録しました');
    }

    public function itemStore(Request $request)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        // 商品登録処理（後で実装）
        return redirect()->route('admin.dashboard')->with('success', '商品を登録しました');
    }
}

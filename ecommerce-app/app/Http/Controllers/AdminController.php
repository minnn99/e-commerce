<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Product;
use App\Models\User;

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
        $products = Product::orderBy('created_at', 'desc')->get();
        $users = User::all();
        return view('admin', compact('products', 'users'));
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }

    public function userEdit($id = null)
    {
        $user = $id ? User::findOrFail($id) : null;
        return view('adminuseredit', compact('user'));
    }

    public function itemEdit($id = null)
    {
        $product = $id ? Product::findOrFail($id) : null;
        return view('adminitemedit', compact('product'));
    }

    public function itemStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'val' => 'required|integer|min:0',
            'explanation' => 'required|string',
            'picture' => 'nullable|string|max:255',
            'genre' => 'required|string|max:15',
        ]);

        Product::create([
            'name' => $request->name,
            'val' => $request->val,
            'explanation' => $request->explanation,
            'picture' => $request->picture ?: 'images/default.jpg',
            'genre' => $request->genre,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.dashboard')->with('success', '商品を登録しました');
    }

    public function itemUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'val' => 'required|integer|min:0',
            'explanation' => 'required|string',
            'picture' => 'nullable|string|max:255',
            'genre' => 'required|string|max:15',
        ]);

        $product = Product::findOrFail($id);
        $product->update([
            'name' => $request->name,
            'val' => $request->val,
            'explanation' => $request->explanation,
            'picture' => $request->picture ?: $product->picture,
            'genre' => $request->genre,
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.dashboard')->with('success', '商品を更新しました');
    }

    public function itemDelete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.dashboard')->with('success', '商品を削除しました');
    }

    public function userStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|max:150|unique:users',
            'tel' => 'nullable|string|max:15',
            'post' => 'nullable|string|max:11',
            'address' => 'nullable|string|max:30',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'tel' => $request->tel,
            'post' => $request->post,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'ユーザーを登録しました');
    }

    public function userUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|max:150|unique:users,email,'.$id,
            'tel' => 'nullable|string|max:15',
            'post' => 'nullable|string|max:11',
            'address' => 'nullable|string|max:30',
            'password' => 'nullable|string|min:8',
        ]);

        $user = User::findOrFail($id);
        $updateData = [
            'name' => $request->name,
            'email' => $request->email,
            'tel' => $request->tel,
            'post' => $request->post,
            'address' => $request->address,
            'updated_at' => now(),
        ];

        if ($request->password) {
            $updateData['password'] = Hash::make($request->password);
        }

        $user->update($updateData);

        return redirect()->route('admin.dashboard')->with('success', 'ユーザーを更新しました');
    }

    public function userDelete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.dashboard')->with('success', 'ユーザーを削除しました');
    }
}

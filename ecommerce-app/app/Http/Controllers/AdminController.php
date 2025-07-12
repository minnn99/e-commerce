<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Product;
use App\Models\User;
use App\Models\Sale;

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
        $sales = Sale::with(['product', 'user'])->orderBy('purchase_at', 'desc')->get();
        return view('admin', compact('products', 'users', 'sales'));
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
        ], [
            'name.required' => '商品名を入力してください',
            'val.required' => '税抜き価格を入力してください',
            'val.integer' => '半角数字で入力してください。',
            'explanation.required' => '説明を入力してください',
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
        ], [
            'name.required' => '商品名を入力してください',
            'val.required' => '税抜き価格を入力してください',
            'val.integer' => '半角数字で入力してください。',
            'explanation.required' => '説明を入力してください',
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
            'tel' => 'required|regex:/^[0-9]+$/|max:15',
            'post' => 'required|regex:/^[0-9]+$/|max:11',
            'address' => 'required|string|max:30',
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|same:password',
            'user_type' => 'required|in:0,1',
        ], [
            'name.required' => 'ユーザー名を入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレス形式で入力してください(XXXX@XXXX.com)',
            'email.unique' => 'このメールアドレスは既に使用されています',
            'tel.required' => '電話番号を入力してください',
            'tel.regex' => '半角数字で入力してください',
            'post.required' => '郵便番号を入力してください',
            'post.regex' => '半角数字で入力してください',
            'address.required' => '住所を入力してください',
            'password.required' => 'パスワードを入力してください',
            'password.min' => 'パスワードは8文字以上入力してください',
            'password_confirmation.required' => 'パスワード確認を入力してください',
            'password_confirmation.same' => 'パスワードが一致しません',
            'user_type.required' => 'ユーザー種別を選択してください',
            'user_type.in' => 'ユーザー種別は一般または管理者を選択してください',
        ]);

        if ($request->user_type == '1') {
            Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $message = '管理者を登録しました';
        } else {
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
            $message = 'ユーザーを登録しました';
        }

        return redirect()->route('admin.dashboard')->with('success', $message);
    }

    public function userUpdate(Request $request, $id)
    {
        $validationRules = [
            'name' => 'required|string|max:50',
            'email' => 'required|email|max:150|unique:users,email,'.$id,
            'tel' => 'required|regex:/^[0-9]+$/|max:15',
            'post' => 'required|regex:/^[0-9]+$/|max:11',
            'address' => 'required|string|max:30',
        ];
        
        $validationMessages = [
            'name.required' => 'ユーザー名を入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレス形式で入力してください(XXXX@XXXX.com)',
            'email.unique' => 'このメールアドレスは既に使用されています',
            'tel.required' => '電話番号を入力してください',
            'tel.regex' => '半角数字で入力してください',
            'post.required' => '郵便番号を入力してください',
            'post.regex' => '半角数字で入力してください',
            'address.required' => '住所を入力してください',
        ];

        if ($request->filled('password')) {
            $validationRules['password'] = 'required|string|min:8';
            $validationRules['password_confirmation'] = 'required|same:password';
            $validationMessages['password.required'] = 'パスワードを入力してください';
            $validationMessages['password.min'] = 'パスワードは8文字以上入力してください';
            $validationMessages['password_confirmation.required'] = 'パスワード確認を入力してください';
            $validationMessages['password_confirmation.same'] = 'パスワードが一致しません';
        }

        $request->validate($validationRules, $validationMessages);

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

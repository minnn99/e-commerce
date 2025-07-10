<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレス形式で入力してください(XXXX@XXXX.com)',
            'password.required' => 'パスワードを入力してください',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // Get the authenticated user
            $user = Auth::user();
            
            // Create an access token (temporarily commented out)
            // $token = $user->createToken('auth_token')->plainTextToken;
            
            // Store the token in the session for later use
            // $request->session()->put('api_token', $token);
            
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'ログイン情報が正しくありません。',
        ]);
    }

    public function showRegistrationForm()
    {
        return view('registration');
    }

    public function showRegistrationConfirm(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|max:150',
            'tel' => 'required|regex:/^[0-9]+$/|max:15',
            'post' => 'required|regex:/^[0-9]+$/|max:11',
            'address' => 'required|string|max:30',
            'password' => 'required|string|min:8',
            'password_confirm' => 'required|same:password',
        ], [
            'name.required' => 'ユーザー名を入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレス形式で入力してください(XXXX@XXXX.com)',
            'tel.required' => '電話番号を入力してください',
            'tel.regex' => '半角数字で入力してください',
            'post.required' => '郵便番号を入力してください',
            'post.regex' => '半角数字で入力してください',
            'address.required' => '住所を入力してください',
            'password.required' => 'パスワードを入力してください',
            'password.min' => 'パスワードは8文字以上入力してください',
            'password_confirm.required' => 'パスワードを入力してください',
            'password_confirm.same' => 'パスワードが一致しません',
        ]);

        $userData = $request->all();
        return view('registrationconfirm', compact('userData'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|max:150|unique:users',
            'tel' => 'required|string|max:15',
            'post' => 'required|string|max:11',
            'address' => 'required|string|max:30',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'tel' => $request->tel,
            'post' => $request->post,
            'address' => $request->address,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect('/registrationcomplete');
    }

    public function logout(Request $request)
    {
        // Delete all access tokens for the current user (temporarily commented out)
        // $user = Auth::user();
        // if ($user && $user->tokens()) {
        //     $user->tokens()->delete();
        // }

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
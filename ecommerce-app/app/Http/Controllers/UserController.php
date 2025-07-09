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
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
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
            'tel' => 'required|string|max:15',
            'post' => 'required|string|max:11',
            'address' => 'required|string|max:30',
            'password' => 'required|string|min:8',
            'password_confirm' => 'required|same:password',
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
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
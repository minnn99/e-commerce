@extends('layouts.app')
@section('content') 
  <div class="w-layout-blockcontainer container-33 w-container">
    <div class="w-form">
      <form action="{{ route('user.login') }}" method="post">
        @csrf
        <label>メールアドレス</label>
        @error('email')
          <div style="color: red; font-size: 14px; margin-bottom: 5px;">{{ $message }}</div>
        @enderror
        <input class="w-input" maxlength="256" name="email" type="email" value="{{ old('email') }}">
        <label>パスワード</label>
        @error('password')
          <div style="color: red; font-size: 14px; margin-bottom: 5px;">{{ $message }}</div>
        @enderror
        <input class="w-input" maxlength="256" name="password" type="password">
        <div class="div-block-5">
            <input type="submit" class="submit-button-4 w-button" value="login">
        </div>
      </form>
    </div>
    <div class="div-block-6">
      <a href="{{ route('user.registration') }}" class="link-14">ユーザー登録はこちら</a>
    </div>
  </div>
@endsection
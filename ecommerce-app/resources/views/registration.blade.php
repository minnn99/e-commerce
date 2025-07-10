@extends('layouts.app')
@section('content')
  <div class="w-layout-blockcontainer container-32 w-container">
    <h1 class="heading-20">■登録内容</h1>
    <div class="w-form">
      <form action="{{ route('user.registration.confirm') }}" method="post">
        @csrf
        <label>ユーザー名</label>
        @error('name')
          <div style="color: red; font-size: 14px; margin-bottom: 5px;">{{ $message }}</div>
        @enderror
        <input class="w-input" maxlength="50" name="name" type="text" value="{{ old('name') }}">
        <label>メールアドレス</label>
        @error('email')
          <div style="color: red; font-size: 14px; margin-bottom: 5px;">{{ $message }}</div>
        @enderror
        <input class="w-input" maxlength="150" name="email" type="email" value="{{ old('email') }}">
        <label>電話番号</label>
        @error('tel')
          <div style="color: red; font-size: 14px; margin-bottom: 5px;">{{ $message }}</div>
        @enderror
        <input class="w-input" maxlength="15" name="tel" type="tel" value="{{ old('tel') }}">
        <label>郵便番号</label>
        @error('post')
          <div style="color: red; font-size: 14px; margin-bottom: 5px;">{{ $message }}</div>
        @enderror
        <input class="w-input" maxlength="11" name="post" type="text" value="{{ old('post') }}">
        <label>住所</label>
        @error('address')
          <div style="color: red; font-size: 14px; margin-bottom: 5px;">{{ $message }}</div>
        @enderror
        <input class="w-input" maxlength="30" name="address" type="text" value="{{ old('address') }}">
        <label>パスワード</label>
        @error('password')
          <div style="color: red; font-size: 14px; margin-bottom: 5px;">{{ $message }}</div>
        @enderror
        <input class="w-input" maxlength="256" name="password" type="password">
        <label>パスワード確認</label>
        @error('password_confirm')
          <div style="color: red; font-size: 14px; margin-bottom: 5px;">{{ $message }}</div>
        @enderror
        <input class="w-input" maxlength="256" name="password_confirm" type="password">
        <div class="div-block-4">
          <a href="/" class="button-8 w-button">戻る</a>
          <input type="submit" class="submit-button-3 w-button" value="確認画面へ">
        </div>
      </form>
    </div>
  </div>
  @endsection
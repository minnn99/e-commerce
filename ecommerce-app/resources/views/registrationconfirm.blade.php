@extends('layouts.app')
@section('content')
  <div class="w-layout-blockcontainer w-container">
    <h1>■登録情報確認</h1>
    <div class="w-layout-blockcontainer w-container">
      <h2 class="heading-22">●ユーザー名</h2>
      <div class="text-block-9">{{ $userData['name'] }}</div>
    </div>
    <div class="w-layout-blockcontainer w-container">
      <h2 class="heading-22">●メールアドレス</h2>
      <div class="text-block-9">{{ $userData['email'] }}</div>
    </div>
    <div class="w-layout-blockcontainer w-container">
      <h2 class="heading-22">●電話番号</h2>
      <div class="text-block-9">{{ $userData['tel'] }}</div>
    </div>
    <div class="w-layout-blockcontainer w-container">
      <h2 class="heading-22">●郵便番号</h2>
      <div class="text-block-9">{{ $userData['post'] }}</div>
    </div>
    <div class="w-layout-blockcontainer w-container">
      <h2 class="heading-22">●住所</h2>
      <div class="text-block-9">{{ $userData['address'] }}</div>
    </div>
    <div class="w-layout-blockcontainer w-container">
      <h2 class="heading-22">●パスワード</h2>
      <div class="text-block-9">●●●●●●●●</div>
    </div>
  </div>
  <div class="w-layout-blockcontainer container-29 w-container">
    <a href="{{ route('user.registration') }}" class="button-7 w-button">戻る</a>
    <form action="{{ route('user.register') }}" method="post" style="display: inline;">
      @csrf
      <input type="hidden" name="name" value="{{ $userData['name'] }}">
      <input type="hidden" name="email" value="{{ $userData['email'] }}">
      <input type="hidden" name="tel" value="{{ $userData['tel'] }}">
      <input type="hidden" name="post" value="{{ $userData['post'] }}">
      <input type="hidden" name="address" value="{{ $userData['address'] }}">
      <input type="hidden" name="password" value="{{ $userData['password'] }}">
      <input type="submit" class="button-6 w-button" value="登録する">
    </form>
  </div>
  @endsection
@extends('layouts.app')
@section('content')
  <div class="w-layout-blockcontainer container-32 w-container">
    <h1 class="heading-20">■登録内容</h1>
    <div class="w-form">
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <form action="{{ route('user.registration.confirm') }}" method="post">
        @csrf
        <label>ユーザー名</label>
        <input class="w-input" maxlength="50" name="name" type="text" value="{{ old('name') }}" required>
        <label>メールアドレス</label>
        <input class="w-input" maxlength="150" name="email" type="email" value="{{ old('email') }}" required>
        <label>電話番号</label>
        <input class="w-input" maxlength="15" name="tel" type="tel" value="{{ old('tel') }}" required>
        <label>郵便番号</label>
        <input class="w-input" maxlength="11" name="post" type="text" value="{{ old('post') }}" required>
        <label>住所</label>
        <input class="w-input" maxlength="30" name="address" type="text" value="{{ old('address') }}" required>
        <label>パスワード</label>
        <input class="w-input" maxlength="256" name="password" type="password" required>
        <label>パスワード確認</label>
        <input class="w-input" maxlength="256" name="password_confirm" type="password" required>
        <div class="div-block-4">
          <a href="/" class="button-8 w-button">戻る</a>
          <input type="submit" class="submit-button-3 w-button" value="確認画面へ">
        </div>
      </form>
    </div>
  </div>
  @endsection
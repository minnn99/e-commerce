@extends('layouts.app')
@section('content')
  <div class="w-layout-blockcontainer container-32 w-container">
    <h1 class="heading-20">■登録内容</h1>
    <div class="w-form">
      <form action="registrationconfirm" method="get">
        <label>ユーザー名</label>
        <input class="w-input" maxlength="256" name="name">
        <label>メールアドレス</label>
        <input class="w-input" maxlength="256" name="email">
        <label>電話番号</label>
        <input class="w-input" maxlength="256" name="tel">
        <label>郵便番号</label>
        <input class="w-input" maxlength="256" name="post">
        <label>住所</label>
        <input class="w-input" maxlength="256" name="address">
        <label>パスワード</label>
        <input class="w-input" maxlength="256" name="password">
        <label>パスワード確認</label>
        <input class="w-input" maxlength="256" name="password_confirm">
        <div class="div-block-4">
          <a href="/" class="button-8 w-button">戻る</a>
          <input type="submit" class="submit-button-3 w-button" value="登録">
        </div>
      </form>
    </div>
  </div>
  @endsection
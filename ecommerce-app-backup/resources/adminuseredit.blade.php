@extends('layouts.app_login')
@section('content')  
<div class="w-layout-blockcontainer container-36 w-container">
    <h1>■ユーザー登録</h1>
  </div>
  <div class="w-layout-blockcontainer container-35 w-container">
    <div class="w-form">
      <form action="admin" method="get">
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
        <label>ユーザー種別</label>
        <select id="field" name="user_type" class="w-select">
          <option value="0">一般</option>
          <option value="1">管理者</option>
        </select>
        <div class="div-block-11">
          <a href="admin" class="button-17 w-button">戻る</a>
          <input type="submit" class="submit-button-6 w-button" value="登録">
        </div>
      </form>
    </div>
  </div>
  @endsection
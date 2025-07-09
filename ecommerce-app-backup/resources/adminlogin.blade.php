@extends('layouts.app_login')
@section('content')  
  <div class="w-layout-blockcontainer container-37 w-container">
    <h1>管理画面ログイン</h1>
  </div>
  <div class="w-layout-blockcontainer container-33 w-container">
    <div class="w-form">
      <form action="admin" method="get">
        <label>メールアドレス</label>
        <input class="w-input" maxlength="256" name="email">
        <label for="email">パスワード</label>
        <input class="w-input" maxlength="256" name="password">
        <div class="div-block-5">
          <input type="submit" class="submit-button-4 w-button" value="login">
        </div>
      </form>
    </div>
  </div>
  @endsection
@extends('layouts.app_login')
@section('content')  
  <div class="w-layout-blockcontainer container-37 w-container">
    <h1>管理画面ログイン</h1>
  </div>
  <div class="w-layout-blockcontainer container-33 w-container">
    @if ($errors->any())
        <div style="color: red; margin-bottom: 15px;">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <div class="w-form">
      <form action="{{ url('/admin/login') }}" method="post">
        @csrf
        <label>メールアドレス</label>
        <input class="w-input" maxlength="256" name="email" type="email" required>
        <label for="password">パスワード</label>
        <input class="w-input" maxlength="256" name="password" type="password" required>
        <div class="div-block-5">
          <input type="submit" class="submit-button-4 w-button" value="login">
        </div>
      </form>
    </div>
  </div>
  @endsection
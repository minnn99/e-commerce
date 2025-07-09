@extends('layouts.app')
@section('content') 
  <div class="w-layout-blockcontainer container-33 w-container">
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
      <form action="{{ route('user.login') }}" method="post">
        @csrf
        <label>メールアドレス</label>
        <input class="w-input" maxlength="256" name="email" type="email" value="{{ old('email') }}" required>
        <label>パスワード</label>
        <input class="w-input" maxlength="256" name="password" type="password" required>
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
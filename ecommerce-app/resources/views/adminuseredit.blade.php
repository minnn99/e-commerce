@extends('layouts.app_login')
@section('content')  
<div class="w-layout-blockcontainer container-36 w-container">
    <h1>■{{ isset($user) ? 'ユーザー編集' : 'ユーザー登録' }}</h1>
  </div>
  <div class="w-layout-blockcontainer container-35 w-container">
    <div class="w-form">
      @if(isset($user))
        <form action="{{ route('admin.user.update', $user->id) }}" method="post">
          @method('PUT')
      @else
        <form action="{{ route('admin.user.store') }}" method="post">
      @endif
        @csrf
        <label>ユーザー名</label>
        @error('name')
        <div style="color: red; font-size: 12px; margin-bottom: 5px;">{{ $message }}</div>
        @enderror
        <input class="w-input" maxlength="256" name="name" value="{{ old('name', isset($user) ? $user->name : '') }}">
        <label>メールアドレス</label>
        @error('email')
        <div style="color: red; font-size: 12px; margin-bottom: 5px;">{{ $message }}</div>
        @enderror
        <input class="w-input" maxlength="256" name="email" value="{{ old('email', isset($user) ? $user->email : '') }}">
        <label>電話番号</label>
        @error('tel')
        <div style="color: red; font-size: 12px; margin-bottom: 5px;">{{ $message }}</div>
        @enderror
        <input class="w-input" maxlength="256" name="tel" value="{{ old('tel', isset($user) ? $user->tel : '') }}">
        <label>郵便番号</label>
        @error('post')
        <div style="color: red; font-size: 12px; margin-bottom: 5px;">{{ $message }}</div>
        @enderror
        <input class="w-input" maxlength="256" name="post" value="{{ old('post', isset($user) ? $user->post : '') }}">
        <label>住所</label>
        @error('address')
        <div style="color: red; font-size: 12px; margin-bottom: 5px;">{{ $message }}</div>
        @enderror
        <input class="w-input" maxlength="256" name="address" value="{{ old('address', isset($user) ? $user->address : '') }}">
        <label>パスワード{{ isset($user) ? '（変更する場合のみ入力）' : '' }}</label>
        @error('password')
        <div style="color: red; font-size: 12px; margin-bottom: 5px;">{{ $message }}</div>
        @enderror
        <input class="w-input" maxlength="256" name="password" type="password">
        @if(!isset($user))
        <label>パスワード確認</label>
        @error('password_confirmation')
        <div style="color: red; font-size: 12px; margin-bottom: 5px;">{{ $message }}</div>
        @enderror
        <input class="w-input" maxlength="256" name="password_confirmation" type="password">
        @else
        <label>パスワード確認</label>
        @error('password_confirmation')
        <div style="color: red; font-size: 12px; margin-bottom: 5px;">{{ $message }}</div>
        @enderror
        <input class="w-input" maxlength="256" name="password_confirmation" type="password">
        @endif
        @if(!isset($user))
        <label>ユーザー種別</label>
        @error('user_type')
        <div style="color: red; font-size: 12px; margin-bottom: 5px;">{{ $message }}</div>
        @enderror
        <select id="field" name="user_type" class="w-select">
          <option value="0" {{ old('user_type', '0') == '0' ? 'selected' : '' }}>一般</option>
          <option value="1" {{ old('user_type') == '1' ? 'selected' : '' }}>管理者</option>
        </select>
        @endif
        <div class="div-block-11">
          <a href="{{ route('admin.dashboard') }}" class="button-17 w-button">戻る</a>
          <input type="submit" class="submit-button-6 w-button" value="{{ isset($user) ? '更新' : '登録' }}">
        </div>
      </form>
    </div>
  </div>
  @endsection
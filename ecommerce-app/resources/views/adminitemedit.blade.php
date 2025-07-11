@extends('layouts.app_login')
@section('content')
  <div class="w-layout-blockcontainer container-34 w-container">
    <h1>■{{ isset($product) ? '商品編集' : '商品登録' }}</h1>
  </div>
  <div class="w-layout-blockcontainer w-container">
    <div class="w-form">
      @if(isset($product))
        <form action="{{ route('admin.item.update', $product->id) }}" id="email-form" method="post">
          @method('PUT')
      @else
        <form action="{{ route('admin.item.store') }}" id="email-form" method="post">
      @endif
        @csrf
        <label>商品名</label>
        @error('name')
        <div style="color: red; font-size: 12px; margin-bottom: 5px;">{{ $message }}</div>
        @enderror
        <input class="w-input" maxlength="256" name="name" value="{{ old('name', isset($product) ? $product->name : '') }}">
        <label>税抜き値段</label>
        @error('val')
        <div style="color: red; font-size: 12px; margin-bottom: 5px;">{{ $message }}</div>
        @enderror
        <input class="w-input" maxlength="256" name="val" value="{{ old('val', isset($product) ? $product->val : '') }}">
        <label>説明</label>
        @error('explanation')
        <div style="color: red; font-size: 12px; margin-bottom: 5px;">{{ $message }}</div>
        @enderror
        <textarea maxlength="5000" id="field" name="explanation" class="w-input">{{ old('explanation', isset($product) ? $product->explanation : '') }}</textarea>
        <label>ジャンル</label>
        @error('genre')
        <div style="color: red; font-size: 12px; margin-bottom: 5px;">{{ $message }}</div>
        @enderror
        <select id="field-2" name="genre" class="w-select">
          @php
            $selectedGenre = old('genre', isset($product) ? $product->genre : '');
          @endphp
          <option value="Tシャツ" {{ $selectedGenre == 'Tシャツ' ? 'selected' : '' }}>Tシャツ</option>
          <option value="Yシャツ" {{ $selectedGenre == 'Yシャツ' ? 'selected' : '' }}>Yシャツ</option>
          <option value="セーター" {{ $selectedGenre == 'セーター' ? 'selected' : '' }}>セーター</option>
          <option value="ロング" {{ $selectedGenre == 'ロング' ? 'selected' : '' }}>ロング</option>
          <option value="コート" {{ $selectedGenre == 'コート' ? 'selected' : '' }}>コート</option>
          <option value="ジャケット" {{ $selectedGenre == 'ジャケット' ? 'selected' : '' }}>ジャケット</option>
          <option value="パンツ" {{ $selectedGenre == 'パンツ' ? 'selected' : '' }}>パンツ</option>
          <option value="シューズ" {{ $selectedGenre == 'シューズ' ? 'selected' : '' }}>シューズ</option>
          <option value="アクセサリー" {{ $selectedGenre == 'アクセサリー' ? 'selected' : '' }}>アクセサリー</option>
        </select>
        <label>商品画像</label>
        @error('picture')
        <div style="color: red; font-size: 12px; margin-bottom: 5px;">{{ $message }}</div>
        @enderror
        <input class="w-input" maxlength="256" name="picture" placeholder="images/sample.jpg" value="{{ old('picture', isset($product) ? $product->picture : '') }}">
        <div class="div-block-10">
          <a href="{{ route('admin.dashboard') }}" class="button-16 w-button">戻る</a>
          <input type="submit" class="submit-button-5 w-button" value="{{ isset($product) ? '更新' : '登録' }}">
        </div>
      </form>
    </div>
  </div>
  @endsection
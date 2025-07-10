@extends('layouts.app_login')
@section('content')
  <div class="w-layout-blockcontainer container-34 w-container">
    <h1>■商品登録</h1>
  </div>
  <div class="w-layout-blockcontainer w-container">
    <div class="w-form">
      <form action="{{ route('admin.item.store') }}" id="email-form" method="post">
        @csrf
        <label>商品名</label>
        <input class="w-input" maxlength="256" name="name">
        <label>税抜き値段</label>
        <input class="w-input" maxlength="256" name="val">
        <label>説明</label>
        <textarea maxlength="5000" id="field" name="explanation" class="w-input"></textarea>
        <label>ジャンル</label>
        <select id="field-2" name="genre" class="w-select">
          <option value="1">Tシャツ</option>
          <option value="2">Yシャツ</option>
          <option value="3">セーター</option>
          <option value="4">ロング</option>
          <option value="5">コート</option>
          <option value="6">ジャケット</option>
          <option value="7">パンツ</option>
          <option value="8">シューズ</option>
          <option value="9">アクセサリー</option>
        </select>
        <label>商品画像</label>
        <input class="w-input" maxlength="256" name="picture" placeholder="images/sample.jpg">
        <div class="div-block-10">
          <a href="{{ route('admin.dashboard') }}" class="button-16 w-button">戻る</a>
          <input type="submit" class="submit-button-5 w-button" value="登録">
        </div>
      </form>
    </div>
  </div>
  @endsection
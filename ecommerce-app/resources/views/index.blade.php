@extends('layouts.app')
@section('content')
<h1 class="heading">Welcome to Educure apparel shop</h1>
<section class="section-2">
  <div class="w-layout-blockcontainer w-container">
    <h1 class="heading-5">■新規商品</h1>
  </div>
  <div class="w-layout-blockcontainer container-3 w-container">
    <div class="w-layout-blockcontainer container-9 w-container">
      <x-item_component />
    </div>
    <div class="w-layout-blockcontainer container-9 w-container">
      <x-item_component />
    </div>
    <div class="w-layout-blockcontainer container-9 w-container">
      <x-item_component />
    </div>
    <div class="w-layout-blockcontainer container-9 w-container">
      <x-item_component />
    </div>
  </div>
  <div class="w-layout-blockcontainer container-3 w-container">
    <div class="w-layout-blockcontainer container-9 w-container">
      <x-item_component />
    </div>
    <div class="w-layout-blockcontainer container-9 w-container">
      <x-item_component />
    </div>
    <div class="w-layout-blockcontainer container-9 w-container">
      <x-item_component />
    </div>
    <div class="w-layout-blockcontainer container-9 w-container">
      <x-item_component />
    </div>
  </div>
  <div class="w-layout-blockcontainer w-container">
    <a href="{{ route('products.index') }}" class="link">&lt;他の商品を見る</a>
  </div>
</section>
<section class="section-4">
  <div class="w-layout-blockcontainer container-4 w-container">
    <h1 class="heading-6">■ジャンル</h1>
  </div>
  <div class="w-layout-blockcontainer container-3 w-container">
    <div class="w-layout-blockcontainer container1 w-container">
      <div class="div-block">
        <img src="images/t-shirt.png" class="image-2">
        <a href="{{ route('products.index') }}" class="link-2">Tシャツ</a>
      </div>
    </div>
    <div class="w-layout-blockcontainer container1 w-container">
      <div class="div-block">
        <img src="images/y-shirt.png" class="image-2">
        <a href="{{ route('products.index') }}" class="link-2">Yシャツ</a>
      </div>
    </div>
    <div class="w-layout-blockcontainer container1 w-container">
      <div class="div-block">
        <img src="images/shirt.png"class="image-2">
        <a href="{{ route('products.index') }}" class="link-2">セーター</a>
      </div>
    </div>
  </div>
  <div class="w-layout-blockcontainer container-3 w-container">
    <div class="w-layout-blockcontainer container1 w-container">
      <div class="div-block">
        <img src="images/ロングTシャツアイコン1.png"class="image-2">
        <a href="{{ route('products.index') }}" class="link-2">ロング</a>
      </div>
    </div>
    <div class="w-layout-blockcontainer container1 w-container">
      <div class="div-block">
        <img src="images/coat.png"class="image-2">
        <a href="{{ route('products.index') }}" class="link-2">コート</a>
      </div>
    </div>
    <div class="w-layout-blockcontainer container1 w-container">
      <div class="div-block">
        <img src="images/jacket.png"class="image-2">
        <a href="{{ route('products.index') }}" class="link-2">ジャケット</a>
      </div>
    </div>
    </div>
  <div class="w-layout-blockcontainer container-3 w-container">
    <div class="w-layout-blockcontainer container1 w-container">
      <div class="div-block">
        <img src="images/pants.png"class="image-2">
        <a href="{{ route('products.index') }}" class="link-2">パンツ</a>
      </div>
    </div>
    <div class="w-layout-blockcontainer container1 w-container">
      <div class="div-block">
        <img src="images/shoes.png"class="image-2">
        <a href="{{ route('products.index') }}" class="link-2">シューズ</a>
      </div>
    </div>
    <div class="w-layout-blockcontainer container1 w-container">
      <div class="div-block">
        <img src="images/accessory.png"class="image-2">
        <a href="{{ route('products.index') }}" class="link-2">アクセサリー</a>
      </div>
    </div>
  </div>
</section>
@endsection
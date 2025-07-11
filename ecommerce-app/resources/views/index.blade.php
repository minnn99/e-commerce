@extends('layouts.app')
@section('content')
<h1 class="heading">Welcome to Educure apparel shop</h1>
<section class="section-2">
  <div class="w-layout-blockcontainer w-container">
    <h1 class="heading-5">■新規商品</h1>
  </div>
  @php
  $chunkedProducts = $products->chunk(4);
  @endphp
  
  @foreach($chunkedProducts as $productChunk)
  <div class="w-layout-blockcontainer container-3 w-container">
    @foreach($productChunk as $product)
    <div class="w-layout-blockcontainer container-9 w-container">
        <img src="{{ asset($product->picture) }}" sizes="(max-width: 767px) 37vw, 200px" class="image">
        <div class="w-layout-vflex">
          <a href="{{ route('products.show', ['id' => $product->id]) }}">
          <h2 class="heading-2">{{ $product->name }}</h2>
          </a>
          <h2 class="heading-2">￥{{ number_format($product->val) }}(税込み)</h2>
        </div>
    </div>
    @endforeach
  </div>
  @endforeach
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
        <img src="/images/t-shirt.png" class="image-2">
        <a href="{{ route('products.index', ['genre' => 'Tシャツ']) }}" class="link-2">Tシャツ</a>
      </div>
    </div>
    <div class="w-layout-blockcontainer container1 w-container">
      <div class="div-block">
        <img src="/images/y-shirt.png" class="image-2">
        <a href="{{ route('products.index', ['genre' => 'Yシャツ']) }}" class="link-2">Yシャツ</a>
      </div>
    </div>
    <div class="w-layout-blockcontainer container1 w-container">
      <div class="div-block">
        <img src="/images/shirt.png" class="image-2">
        <a href="{{ route('products.index', ['genre' => 'セーター']) }}" class="link-2">セーター</a>
      </div>
    </div>
  </div>
  <div class="w-layout-blockcontainer container-3 w-container">
    <div class="w-layout-blockcontainer container1 w-container">
      <div class="div-block">
        <img src="/images/ロングTシャツアイコン1.png" class="image-2">
        <a href="{{ route('products.index', ['genre' => 'ロング']) }}" class="link-2">ロング</a>
      </div>
    </div>
    <div class="w-layout-blockcontainer container1 w-container">
      <div class="div-block">
        <img src="/images/coat.png" class="image-2">
        <a href="{{ route('products.index', ['genre' => 'コート']) }}" class="link-2">コート</a>
      </div>
    </div>
    <div class="w-layout-blockcontainer container1 w-container">
      <div class="div-block">
        <img src="/images/jacket.png" class="image-2">
        <a href="{{ route('products.index', ['genre' => 'ジャケット']) }}" class="link-2">ジャケット</a>
      </div>
    </div>
    </div>
  <div class="w-layout-blockcontainer container-3 w-container">
    <div class="w-layout-blockcontainer container1 w-container">
      <div class="div-block">
        <img src="/images/pants.png" class="image-2">
        <a href="{{ route('products.index', ['genre' => 'パンツ']) }}" class="link-2">パンツ</a>
      </div>
    </div>
    <div class="w-layout-blockcontainer container1 w-container">
      <div class="div-block">
        <img src="/images/shoes.png" class="image-2">
        <a href="{{ route('products.index', ['genre' => 'シューズ']) }}" class="link-2">シューズ</a>
      </div>
    </div>
    <div class="w-layout-blockcontainer container1 w-container">
      <div class="div-block">
        <img src="/images/accessory.png" class="image-2">
        <a href="{{ route('products.index', ['genre' => 'アクセサリー']) }}" class="link-2">アクセサリー</a>
      </div>
    </div>
  </div>
</section>
@endsection
@extends('layouts.app')
@section('content') 
<div class="w-layout-blockcontainer container-22 w-container">
    @if(isset($selectedGenre) && $selectedGenre)
    <h3 style="margin-bottom: 10px;">{{ $selectedGenre }}の商品 ({{ $products->total() }}件)</h3>
    @endif
    <div class="w-form">
      <form id="email-form" name="email-form" data-name="Email Form" method="get" action="{{ route('products.index') }}" class="form" data-wf-page-id="65de85138eaba875c01e5763" data-wf-element-id="8f53273e-d595-33a3-00d4-0c07fb6242f2"><label for="field">ジャンル</label>
        <div class="w-layout-hflex">
            <select id="field" name="field" data-name="Field" class="w-select">
              <option value="">すべて</option>
              <option value="1" {{ request('field') == '1' ? 'selected' : '' }}>Tシャツ</option>
              <option value="2" {{ request('field') == '2' ? 'selected' : '' }}>Yシャツ</option>
              <option value="3" {{ request('field') == '3' ? 'selected' : '' }}>セーター</option>
              <option value="4" {{ request('field') == '4' ? 'selected' : '' }}>ロング</option>
              <option value="5" {{ request('field') == '5' ? 'selected' : '' }}>コート</option>
              <option value="6" {{ request('field') == '6' ? 'selected' : '' }}>ジャケット</option>
              <option value="7" {{ request('field') == '7' ? 'selected' : '' }}>パンツ</option>
              <option value="8" {{ request('field') == '8' ? 'selected' : '' }}>シューズ</option>
              <option value="9" {{ request('field') == '9' ? 'selected' : '' }}>アクセサリー</option>
            </select>
            <input type="submit" data-wait="Please wait..." class="submit-button w-button" value="検索">
        </div>
      </form>
    </div>
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
<!-- Pagination -->
@if($products->hasPages())
    <div class="pagination">
        {{ $products->links('vendor.pagination.bootstrap-5') }}
    </div>
@endif
<!-- End Pagination -->
@endsection
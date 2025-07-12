@extends('layouts.app')
@section('content') 
<div class="w-layout-blockcontainer container-25 w-container">
    <div class="w-layout-blockcontainer w-container">
      <h1 class="heading-16">■カート内容</h1>
    </div>
    @if($cartItems->count() > 0)
    <ul role="list" class="w-list-unstyled">
      @foreach($cartItems as $cartItem)
      <li class="list-item">
            <img src="{{ asset($cartItem->product->picture) }}" sizes="80px" class="image-5">
            <div class="w-layout-vflex flex-block-3">
                <a href="{{ route('products.show', ['id' => $cartItem->product->id]) }}" class="link-11">{{ $cartItem->product->name }}</a>
                <div class="text-block-5">￥{{ number_format($cartItem->product->val) }}(税込み)</div>
                <a href="{{ route('cart.remove', $cartItem->id) }}" class="link-12" onclick="return confirm('カートから削除しますか？')">削除</a>
            </div>
            <div class="w-layout-blockcontainer container-24 w-container">
                <a href="{{ route('cart.remove', $cartItem->id) }}" onclick="return confirm('カートから削除しますか？')">
                    <img src="/images/スタンダードなゴミ箱アイコン.png" class="image-7">
                </a>
            </div>
      </li>
      @endforeach
    </ul>
    @else
    <div class="w-layout-blockcontainer w-container">
        <p>カートに商品がありません。</p>
    </div>
    @endif
    
    @if($cartItems->count() > 0)
    <div class="w-layout-blockcontainer w-container" style="margin-top: 30px;">
      <h2 class="heading-16">■商品合計</h2>
      <div style="text-align: left; padding: 1rem 0 1rem 0;">
        <div style="font-size: 20px; font-weight: bold;">
          ￥{{ number_format($cartItems->sum(function($item) { return $item->product->val; })) }}(税込み)
        </div>
      </div>
    </div>
    @endif
  </div>
  <div class="w-layout-blockcontainer container-27 w-container">
    <a href="/" class="button-4 w-button">戻る</a>
    @if($cartItems->count() > 0)
    <form action="{{ route('payment.checkout') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit" class="button-3 w-button">決済に進む</button>
    </form>
    @endif
  </div>
@endsection
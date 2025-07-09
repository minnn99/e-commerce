@extends('layouts.app')
@section('content') 
<div class="w-layout-blockcontainer container-25 w-container">
    <div class="w-layout-blockcontainer w-container">
      <h1 class="heading-16">■カート内容</h1>
    </div>
    <ul role="list" class="w-list-unstyled">
      <li class="list-item">
            <x-cart_item :delete="true" />
      </li>
      <li class="list-item">
            <x-cart_item :delete="true" />
      </li>
      <li class="list-item">
            <x-cart_item :delete="true" />
      </li>
      <li class="list-item">
            <x-cart_item :delete="true" />
      </li>
      <li class="list-item">
            <x-cart_item :delete="true" />      
      </li>
    </ul>
  </div>
  <div class="w-layout-blockcontainer container-27 w-container">
    <a href="/" class="button-4 w-button">戻る</a>
    <a href="payment" class="button-3 w-button">決済に進む</a>
  </div>
@endsection
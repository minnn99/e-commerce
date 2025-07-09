@extends('layouts.app')
@section('content') 
<div class="w-layout-blockcontainer container-22 w-container">
    <div class="w-form">
      <form id="email-form" name="email-form" data-name="Email Form" method="get" class="form" data-wf-page-id="65de85138eaba875c01e5763" data-wf-element-id="8f53273e-d595-33a3-00d4-0c07fb6242f2"><label for="field">ジャンル</label>
        <div class="w-layout-hflex">
            <select id="field" name="field" data-name="Field" class="w-select">
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
            <input type="submit" data-wait="Please wait..." class="submit-button w-button" value="検索">
        </div>
      </form>
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
<div class="w-layout-blockcontainer container-3 w-container paginate">
  <div class="w-layout-hflex flex-block-2">
      <a href="#" class="link-4">&lt;</a>
      <a href="#" class="link-5">1</a>
      <a href="#" class="link-6">2</a>
      <a href="#" class="link-7">3</a>
      <div class="text-block-2">....</div>
      <a href="#" class="link-8">8</a>
      <a href="#" class="link-9">&gt;</a>
  </div>
</div>
@endsection
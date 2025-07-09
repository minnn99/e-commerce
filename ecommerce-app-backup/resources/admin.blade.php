@extends('layouts.app_login')
@section('content')   
  <section class="section-5">
    <h1 class="heading-21">ADMIN画面</h1>
    <div class="div-block-8">
            <a href="adminlogin" class="button-9 w-button" style="margin-right:50px;">ログアウト</a>
    </div>
  </section>
  <div data-current="Tab 1" data-easing="ease" data-duration-in="300" data-duration-out="100" class="tabs w-tabs">
    <div class="w-tab-menu">
      <a data-w-tab="Tab 1" class="tab-link-tab-1 w-inline-block w-tab-link w--current">
        <div>商品管理</div>
      </a>
      <a data-w-tab="Tab 2" class="tab-link-tab-2 w-inline-block w-tab-link">
        <div>売上管理</div>
      </a>
      <a data-w-tab="Tab 3" class="tab-link-tab-3 w-inline-block w-tab-link">
        <div>ユーザー管理</div>
      </a>
    </div>
    <div class="w-tab-content">
      <div data-w-tab="Tab 1" class="w-tab-pane">
        <div class="w-layout-blockcontainer w-container">
          <div class="w-layout-blockcontainer w-container">
            <h1>■商品管理</h1>
          </div>
          <div class="div-block-8">
            <a href="adminitemedit" class="button-9 w-button">新規追加</a>
          </div>
        </div>
        <section>
          <x-itemlist_admin />
        </section>
      </div>
      <div data-w-tab="Tab 2" class="w-tab-pane">
        <div class="w-layout-blockcontainer w-container">
          <div class="w-layout-blockcontainer w-container">
            <h1>■売上管理</h1>
          </div>
        </div>
        <section>
          <x-saleslist_admin />
        </section>
      </div>
      <div data-w-tab="Tab 3" class="w-tab-pane w--tab-active">
        <div class="w-layout-blockcontainer w-container">
          <div class="w-layout-blockcontainer w-container">
            <h1>■ユーザー管理</h1>
          </div>
          <div class="div-block-8">
            <a href="adminuseredit" class="button-9 w-button">新規追加</a>
          </div>
        </div>
        <section>
          <x-userlist_admin />
        </section>
      </div>
    </div>
  </div>
  @endsection
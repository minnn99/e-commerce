<img src="/{{ $image }}" sizes="(max-width: 767px) 37vw, 200px"  class="image">
<div class="w-layout-vflex">
  <a href="{{ route('products.show', ['id' => $id]) }}">
  <h2 class="heading-2">{{ $name }}<br></h2>
  </a>
  <h2 class="heading-2">￥{{ number_format($value) }}(税込み)</h2>
</div>
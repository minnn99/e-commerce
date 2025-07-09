<!DOCTYPE html>
<html>
<head>
    <title>Laravel E-commerce Test</title>
</head>
<body>
    <h1>Laravel E-commerceプロジェクトが正常に動作しています！</h1>
    <p>データベース接続とサーバーが正常に動作しています。</p>
    
    <h2>商品一覧 (テスト):</h2>
    @if(isset($products) && count($products) > 0)
        @foreach($products as $product)
            <div style="border: 1px solid #ccc; margin: 10px; padding: 10px;">
                <h3>{{ $product->name }}</h3>
                <p>価格: ¥{{ number_format($product->val) }}</p>
                <p>{{ $product->explanation }}</p>
                <p>ジャンル: {{ $product->genre }}</p>
            </div>
        @endforeach
    @else
        <p>商品が見つかりません。</p>
    @endif
</body>
</html>

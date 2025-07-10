<!-- Product management table -->
<div style="overflow-x: auto; margin-top: 20px;">
    <table style="width: 100%; border-collapse: collapse;">
        <!-- Header row -->
        <thead>
            <tr style="background-color: #f5f5dc; border-bottom: 1px solid #000;">
                <th style="padding: 8px 12px; text-align: left; font-weight: bold; font-size: 14px;">ID</th>
                <th style="padding: 8px 12px; text-align: left; font-weight: bold; font-size: 14px;">名前</th>
                <th style="padding: 8px 12px; text-align: left; font-weight: bold; font-size: 14px;">税込み値段</th>
                <th style="padding: 8px 12px; text-align: left; font-weight: bold; font-size: 14px;">説明</th>
                <th style="padding: 8px 12px; text-align: left; font-weight: bold; font-size: 14px;">商品画像</th>
                <th style="padding: 8px 12px; text-align: left; font-weight: bold; font-size: 14px;">ジャンル</th>
                <th style="padding: 8px 12px; text-align: left; font-weight: bold; font-size: 14px;"></th>
            </tr>
        </thead>
        <!-- Product rows -->
        <tbody>
            @foreach($products as $product)
            <tr style="border-bottom: 1px solid #ddd;">
                <td style="padding: 8px 12px; font-size: 14px;">{{ $product->id }}</td>
                <td style="padding: 8px 12px; font-size: 14px;">{{ $product->name }}</td>
                <td style="padding: 8px 12px; font-size: 14px;">￥{{ number_format($product->val) }}</td>
                <td style="padding: 8px 12px; font-size: 14px; max-width: 300px;">{{ Str::limit($product->explanation, 50) }}</td>
                <td style="padding: 8px 12px; font-size: 14px;">{{ $product->picture }}</td>
                <td style="padding: 8px 12px; font-size: 14px;">{{ $product->genre }}</td>
                <td style="padding: 8px 12px; font-size: 14px;">
                    <a href="{{ route('admin.item.edit', $product->id) }}" style="background-color: #007bff; color: white; padding: 4px 8px; text-decoration: none; border-radius: 3px; font-size: 12px; margin-right: 5px;">編集</a>
                    <form method="POST" action="{{ route('admin.item.delete', $product->id) }}" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('この商品を削除しますか？')" style="background-color: #dc3545; color: white; padding: 4px 8px; border: none; border-radius: 3px; font-size: 12px; cursor: pointer;">削除</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
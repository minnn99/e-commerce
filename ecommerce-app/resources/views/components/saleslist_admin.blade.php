<!-- Sales management table -->
<div style="overflow-x: auto; margin-top: 20px;">
    <table style="width: 100%; border-collapse: collapse;">
        <!-- Header row -->
        <thead>
            <tr style="background-color: #f5f5dc; border-bottom: 1px solid #000;">
                <th style="padding: 8px 12px; text-align: left; font-weight: bold; font-size: 14px;">ID</th>
                <th style="padding: 8px 12px; text-align: left; font-weight: bold; font-size: 14px;">商品ID</th>
                <th style="padding: 8px 12px; text-align: left; font-weight: bold; font-size: 14px;">商品名</th>
                <th style="padding: 8px 12px; text-align: left; font-weight: bold; font-size: 14px;">税抜き値段</th>
                <th style="padding: 8px 12px; text-align: left; font-weight: bold; font-size: 14px;">ユーザーID</th>
                <th style="padding: 8px 12px; text-align: left; font-weight: bold; font-size: 14px;">購入日時</th>
            </tr>
        </thead>
        <!-- Sales rows -->
        <tbody>
            @foreach($sales as $sale)
            <tr style="border-bottom: 1px solid #ddd;">
                <td style="padding: 8px 12px; font-size: 14px;">{{ $sale->id }}</td>
                <td style="padding: 8px 12px; font-size: 14px;">{{ $sale->product_id }}</td>
                <td style="padding: 8px 12px; font-size: 14px;">{{ $sale->product->name }}</td>
                <td style="padding: 8px 12px; font-size: 14px;">￥{{ number_format($sale->product->val) }}</td>
                <td style="padding: 8px 12px; font-size: 14px;">{{ $sale->user_id }}</td>
                <td style="padding: 8px 12px; font-size: 14px;">{{ $sale->purchase_at->format('Y/m/d H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
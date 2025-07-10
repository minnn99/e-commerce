<!-- User management table -->
<div style="overflow-x: auto; margin-top: 20px;">
    <table style="width: 100%; border-collapse: collapse;">
        <!-- Header row -->
        <thead>
            <tr style="background-color: #f5f5dc; border-bottom: 1px solid #000;">
                <th style="padding: 8px 12px; text-align: left; font-weight: bold; font-size: 14px;">ID</th>
                <th style="padding: 8px 12px; text-align: left; font-weight: bold; font-size: 14px;">ユーザー名</th>
                <th style="padding: 8px 12px; text-align: left; font-weight: bold; font-size: 14px;">メールアドレス</th>
                <th style="padding: 8px 12px; text-align: left; font-weight: bold; font-size: 14px;">電話番号</th>
                <th style="padding: 8px 12px; text-align: left; font-weight: bold; font-size: 14px;">郵便番号</th>
                <th style="padding: 8px 12px; text-align: left; font-weight: bold; font-size: 14px;">住所</th>
                <th style="padding: 8px 12px; text-align: left; font-weight: bold; font-size: 14px;">ユーザー種別</th>
                <th style="padding: 8px 12px; text-align: left; font-weight: bold; font-size: 14px;"></th>
            </tr>
        </thead>
        <!-- User rows -->
        <tbody>
            @foreach($users as $user)
            <tr style="border-bottom: 1px solid #ddd;">
                <td style="padding: 8px 12px; font-size: 14px;">{{ $user->id }}</td>
                <td style="padding: 8px 12px; font-size: 14px;">{{ $user->name }}</td>
                <td style="padding: 8px 12px; font-size: 14px;">{{ $user->email }}</td>
                <td style="padding: 8px 12px; font-size: 14px;">{{ $user->tel ?: '-' }}</td>
                <td style="padding: 8px 12px; font-size: 14px;">{{ $user->post ?: '-' }}</td>
                <td style="padding: 8px 12px; font-size: 14px; max-width: 200px;">{{ $user->address ?: '-' }}</td>
                <td style="padding: 8px 12px; font-size: 14px;">一般</td>
                <td style="padding: 8px 12px; font-size: 14px;">
                    <a href="{{ route('admin.user.edit', $user->id) }}" style="background-color: #007bff; color: white; padding: 4px 8px; text-decoration: none; border-radius: 3px; font-size: 12px; margin-right: 5px;">編集</a>
                    <form method="POST" action="{{ route('admin.user.delete', $user->id) }}" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('このユーザーを削除しますか？')" style="background-color: #dc3545; color: white; padding: 4px 8px; border: none; border-radius: 3px; font-size: 12px; cursor: pointer;">削除</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
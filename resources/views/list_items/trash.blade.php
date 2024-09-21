<!DOCTYPE html>
<html>
<head>
    <title>Complete Box</title>
</head>
<body>
    <h1>Complete Box</h1>
    <ul>
        @foreach ($trashedItems as $item)
            <li>
                {{ $item->text }}
                <form action="{{ route('list-items.restore', $item->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit">復元</button>
                </form>
            </li>
        @endforeach
    </ul>
    <a href="/list-items">戻る</a>
</body>
</html>

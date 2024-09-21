<!DOCTYPE html>
<html>
<head>
    <title>ユーザーのTodoリスト</title>
</head>
<body>
    <h1>ユーザーのTodoリスト</h1>
    <ul>
        @foreach ($items as $item)
            <li>{{ $item->text }}</li>
        @endforeach
    </ul>
    <a href="/">戻る</a>

    <a href="{{ route('users.list-items', $user->id) }}">このユーザーのTodoリストを見る</a>

</body>
</html>

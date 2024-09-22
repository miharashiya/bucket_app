<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>コメント</h1>
    <h1>{{ $listitem->text }}</h1>
    <form action="{{ route('comments.store', $listitem) }}" method="post">
        @csrf
        <textarea name="content" required></textarea>
        <button type="submit">コメントを追加</button>
    </form>

    <h3>コメント一覧</h3>
    <ul>
        @if ($listitem->comments->isEmpty())
            <li>コメントがありません。</li>
        @else
            @foreach ($listitem->comments as $comment)
                <li>
                    {{ $comment->content }} - {{ $comment->user->name }}
                    <small>{{ $comment->created_at->diffForHumans() }}</small>
                </li>
            @endforeach
        @endif
    </ul>

    <a href="{{ route('list-items.index') }}">戻る</a>
</body>


</html>

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>リストアイテム一覧</h1>

        <a href="{{ route('list-items.create') }}" class="btn btn-primary mb-3">新規作成</a>

        @if ($items->isEmpty())
            <p>リストアイテムがありません。</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>テキスト</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->text }}</td>
                            <td>
                                <a href="{{ route('list-items.edit', $item->id) }}" class="btn btn-warning btn-sm">編集</a>
                                <form action="{{ route('list-items.destroy', $item->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('本当に削除しますか？')">削除</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


            <a href="/trash">Complete Box</a>
        @endif
    </div>
@endsection

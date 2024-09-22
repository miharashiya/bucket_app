@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $user->name }}のリストアイテム</h1>

    @if ($items && $items->isEmpty())
        <p>リストアイテムがありません。</p>
    @else
        
        <ul>
            @foreach ($items as $item)
                <li>{{ $item->text }}</li>
            @endforeach
        </ul>
    @endif



    <a href="{{ route('list-items.index') }}">戻る</a>
</div>
@endsection



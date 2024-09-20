@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>リストアイテムの登録</h1>

        <form action="{{ route('list-items.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="text" class="form-label">テキスト</label>
                <input type="text" class="form-control" id="text" name="text" required>
            </div>
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">

            <button type="submit" class="btn btn-primary">登録</button>
        </form>
    </div>
@endsection

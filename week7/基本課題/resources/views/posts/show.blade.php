@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <h1>{{ $post->title }}</h1>
    <p class="category">カテゴリー: {{ $post->category }}</p>
    <p>{{ $post->content }}</p>

    <a href="{{ route('posts.edit', $post) }}">編集</a>

    <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');" style="display:inline">
        @csrf
        @method('DELETE')
        <button type="submit">削除</button>
    </form>

    <p><a href="{{ route('posts.index') }}">← 一覧へ戻る</a></p>
@endsection
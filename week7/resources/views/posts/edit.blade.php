@extends('layouts.app')

@section('title', '投稿を編集')

@section('content')
    <h1>投稿を編集</h1>

    <form action="{{ route('posts.update', $post) }}" method="POST">
        @csrf
        @method('PUT')

        <label>タイトル</label>
        <input type="text" name="title" value="{{ old('title', $post->title) }}">
        @error('title') <p class="error">{{ $message }}</p> @enderror

        <label>カテゴリー</label>
        <input type="text" name="category" value="{{ old('category', $post->category) }}">
        @error('category') <p class="error">{{ $message }}</p> @enderror

        <label>内容</label>
        <textarea name="content" rows="6">{{ old('content', $post->content) }}</textarea>
        @error('content') <p class="error">{{ $message }}</p> @enderror

        <button type="submit">更新する</button>
    </form>
@endsection
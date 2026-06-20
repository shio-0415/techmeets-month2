@extends('layouts.app')

@section('title', '新規投稿')

@section('content')
    <h1>新規投稿</h1>

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf

        <label>タイトル</label>
        <input type="text" name="title" value="{{ old('title') }}">
        @error('title') <p class="error">{{ $message }}</p> @enderror

        <label>カテゴリー</label>
        <input type="text" name="category" value="{{ old('category') }}">
        @error('category') <p class="error">{{ $message }}</p> @enderror

        <label>内容</label>
        <textarea name="content" rows="6">{{ old('content') }}</textarea>
        @error('content') <p class="error">{{ $message }}</p> @enderror

        <button type="submit">投稿する</button>
    </form>
@endsection
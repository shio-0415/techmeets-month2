@extends('layouts.app')

@section('title', '投稿一覧')

@section('content')
    <h1>投稿一覧</h1>

    @forelse ($posts as $post)
        <div class="post">
            <h2><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h2>
            <p class="category">カテゴリー: {{ $post->category }}</p>
            <p>{{ Str::limit($post->content, 80) }}</p>
        </div>
    @empty
        <p>投稿がまだありません。</p>
    @endforelse

    <div>
        {{ $posts->links() }}
    </div>
@endsection
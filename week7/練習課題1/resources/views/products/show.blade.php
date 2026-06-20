@extends('layouts.app')

@section('title', $product->name)

@section('content')
    <h1>{{ $product->name }}</h1>
    <p class="category">カテゴリー: {{ $product->category }}</p>
    <p>価格: ¥{{ number_format($product->price) }}</p>
    <p>在庫数: {{ $product->stock }}</p>
    <p>{{ $product->description }}</p>

    <a href="{{ route('products.edit', $product) }}">編集</a>

    <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');" style="display:inline">
        @csrf
        @method('DELETE')
        <button type="submit">削除</button>
    </form>

    <p><a href="{{ route('products.index') }}">← 一覧へ戻る</a></p>
@endsection

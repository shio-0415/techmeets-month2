@extends('layouts.app')

@section('title', '商品一覧')

@section('content')
    <h1>商品一覧</h1>

    <p><a href="{{ route('products.create') }}">+ 新規登録</a></p>

    @forelse ($products as $product)
        <div class="post">
            <h2><a href="{{ route('products.show', $product) }}">{{ $product->name }}</a></h2>
            <p class="category">カテゴリー: {{ $product->category }} ／ 価格: ¥{{ number_format($product->price) }} ／ 在庫: {{ $product->stock }}</p>
        </div>
    @empty
        <p>商品がまだありません。</p>
    @endforelse

    <div>
        {{ $products->links() }}
    </div>
@endsection

@extends('layouts.app')

@section('title', '商品を編集')

@section('content')
    <h1>商品を編集</h1>

    <form action="{{ route('products.update', $product) }}" method="POST">
        @csrf
        @method('PUT')

        <label>商品名</label>
        <input type="text" name="name" value="{{ old('name', $product->name) }}">
        @error('name') <p class="error">{{ $message }}</p> @enderror

        <label>価格</label>
        <input type="number" name="price" step="0.01" value="{{ old('price', $product->price) }}">
        @error('price') <p class="error">{{ $message }}</p> @enderror

        <label>在庫数</label>
        <input type="number" name="stock" value="{{ old('stock', $product->stock) }}">
        @error('stock') <p class="error">{{ $message }}</p> @enderror

        <label>カテゴリー</label>
        <input type="text" name="category" value="{{ old('category', $product->category) }}">
        @error('category') <p class="error">{{ $message }}</p> @enderror

        <label>説明</label>
        <textarea name="description" rows="4">{{ old('description', $product->description) }}</textarea>
        @error('description') <p class="error">{{ $message }}</p> @enderror

        <button type="submit">更新する</button>
    </form>
@endsection

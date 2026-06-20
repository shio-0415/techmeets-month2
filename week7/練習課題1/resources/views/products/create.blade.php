@extends('layouts.app')

@section('title', '商品登録')

@section('content')
    <h1>商品登録</h1>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <label>商品名</label>
        <input type="text" name="name" value="{{ old('name') }}">
        @error('name') <p class="error">{{ $message }}</p> @enderror

        <label>価格</label>
        <input type="number" name="price" step="0.01" value="{{ old('price') }}">
        @error('price') <p class="error">{{ $message }}</p> @enderror

        <label>在庫数</label>
        <input type="number" name="stock" value="{{ old('stock', 0) }}">
        @error('stock') <p class="error">{{ $message }}</p> @enderror

        <label>カテゴリー</label>
        <input type="text" name="category" value="{{ old('category') }}">
        @error('category') <p class="error">{{ $message }}</p> @enderror

        <label>説明</label>
        <textarea name="description" rows="4">{{ old('description') }}</textarea>
        @error('description') <p class="error">{{ $message }}</p> @enderror

        <button type="submit">登録する</button>
    </form>
@endsection

@extends('layouts.app')

@section('title', '新規プロジェクト')

@section('content')
    <h1>新規プロジェクト</h1>

    <form action="{{ route('projects.store') }}" method="POST">
        @csrf

        <label>プロジェクト名</label>
        <input type="text" name="name" value="{{ old('name') }}">
        @error('name') <p class="error">{{ $message }}</p> @enderror

        <label>説明</label>
        <textarea name="description" rows="4">{{ old('description') }}</textarea>
        @error('description') <p class="error">{{ $message }}</p> @enderror

        <button type="submit">作成する</button>
    </form>
@endsection

@extends('layouts.app')

@section('title', 'プロジェクトを編集')

@section('content')
    <h1>プロジェクトを編集</h1>

    <form action="{{ route('projects.update', $project) }}" method="POST">
        @csrf
        @method('PUT')

        <label>プロジェクト名</label>
        <input type="text" name="name" value="{{ old('name', $project->name) }}">
        @error('name') <p class="error">{{ $message }}</p> @enderror

        <label>説明</label>
        <textarea name="description" rows="4">{{ old('description', $project->description) }}</textarea>
        @error('description') <p class="error">{{ $message }}</p> @enderror

        <button type="submit">更新する</button>
    </form>
@endsection

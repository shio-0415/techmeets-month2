@extends('layouts.app')

@section('title', '新規タスク')

@section('content')
    <h1>{{ $project->name }} に新規タスク</h1>

    <form action="{{ route('tasks.store', $project) }}" method="POST">
        @csrf

        <label>タイトル</label>
        <input type="text" name="title" value="{{ old('title') }}">
        @error('title') <p class="error">{{ $message }}</p> @enderror

        <label>説明</label>
        <textarea name="description" rows="3">{{ old('description') }}</textarea>

        <label>状態</label>
        <select name="status">
            <option value="todo">未着手</option>
            <option value="in_progress">進行中</option>
            <option value="done">完了</option>
        </select>

        <label>期限</label>
        <input type="date" name="due_date" value="{{ old('due_date') }}">

        <label>タグ（カンマ区切りで入力。例: 緊急,デザイン）</label>
        <input type="text" name="tags" value="{{ old('tags') }}">

        <button type="submit">作成する</button>
    </form>
@endsection

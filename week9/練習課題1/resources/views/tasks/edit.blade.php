@extends('layouts.app')

@section('title', 'タスクを編集')

@section('content')
    <h1>タスクを編集</h1>

    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')

        <label>タイトル</label>
        <input type="text" name="title" value="{{ old('title', $task->title) }}">
        @error('title') <p class="error">{{ $message }}</p> @enderror

        <label>説明</label>
        <textarea name="description" rows="3">{{ old('description', $task->description) }}</textarea>

        <label>状態</label>
        <select name="status">
            <option value="todo" @selected($task->status === 'todo')>未着手</option>
            <option value="in_progress" @selected($task->status === 'in_progress')>進行中</option>
            <option value="done" @selected($task->status === 'done')>完了</option>
        </select>

        <label>期限</label>
        <input type="date" name="due_date" value="{{ old('due_date', $task->due_date) }}">

        <label>タグ（カンマ区切り）</label>
        <input type="text" name="tags" value="{{ old('tags', $task->tags->pluck('name')->implode(', ')) }}">

        <button type="submit">更新する</button>
    </form>
@endsection

@extends('layouts.app')

@section('title', $project->name)

@section('content')
    <h1>{{ $project->name }}</h1>
    <p>{{ $project->description }}</p>

    <p>
        <a href="{{ route('tasks.create', $project) }}">+ 新規タスク</a> |
        <a href="{{ route('projects.edit', $project) }}">プロジェクトを編集</a>
        <form action="{{ route('projects.destroy', $project) }}" method="POST" style="display:inline" onsubmit="return confirm('本当に削除しますか？');">
            @csrf
            @method('DELETE')
            <button type="submit">プロジェクトを削除</button>
        </form>
    </p>

    <h2>タスク一覧</h2>
    @forelse ($project->tasks as $task)
        <div class="card">
            <h3>{{ $task->title }}（{{ $task->status }}）</h3>
            <p>{{ $task->description }}</p>
            @if ($task->due_date)
                <p>期限: {{ $task->due_date }}</p>
            @endif
            <p>
                @foreach ($task->tags as $tag)
                    <span class="tag">{{ $tag->name }}</span>
                @endforeach
            </p>

            <a href="{{ route('tasks.edit', $task) }}">編集</a>
            <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline" onsubmit="return confirm('本当に削除しますか？');">
                @csrf
                @method('DELETE')
                <button type="submit">削除</button>
            </form>

            <h4>コメント</h4>
            @forelse ($task->comments as $comment)
                <p>・{{ $comment->body }}</p>
            @empty
                <p>まだコメントがありません。</p>
            @endforelse

            <form action="{{ route('comments.store', $task) }}" method="POST">
                @csrf
                <textarea name="body" rows="2" placeholder="コメントを入力"></textarea>
                <button type="submit">コメントする</button>
            </form>
        </div>
    @empty
        <p>タスクがまだありません。</p>
    @endforelse

    <h2>このプロジェクトの全コメント（hasManyThrough）</h2>
    @forelse ($project->comments as $comment)
        <p>・{{ $comment->body }}</p>
    @empty
        <p>コメントはまだありません。</p>
    @endforelse
@endsection

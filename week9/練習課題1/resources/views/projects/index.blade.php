@extends('layouts.app')

@section('title', 'プロジェクト一覧')

@section('content')
    <h1>プロジェクト一覧</h1>

    <p><a href="{{ route('projects.create') }}">+ 新規プロジェクト</a></p>

    @forelse ($projects as $project)
        <div class="card">
            <h2><a href="{{ route('projects.show', $project) }}">{{ $project->name }}</a></h2>
            <p>{{ $project->description }}</p>
            <p>タスク数: {{ $project->tasks_count }}</p>
        </div>
    @empty
        <p>プロジェクトがまだありません。</p>
    @endforelse
@endsection

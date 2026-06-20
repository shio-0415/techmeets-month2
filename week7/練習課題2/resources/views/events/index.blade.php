@extends('layouts.app')

@section('title', 'イベント一覧')

@section('content')
    <h1>イベント一覧</h1>

    @forelse ($events as $event)
        <div class="post">
            <h2><a href="{{ route('events.show', $event) }}">{{ $event->title }}</a></h2>
            <p class="category">開催日時: {{ \Carbon\Carbon::parse($event->date)->format('Y/m/d H:i') }}</p>
            <p>{{ Str::limit($event->description, 80) }}</p>
        </div>
    @empty
        <p>イベントがまだありません。</p>
    @endforelse

    <div>
        {{ $events->links() }}
    </div>
@endsection

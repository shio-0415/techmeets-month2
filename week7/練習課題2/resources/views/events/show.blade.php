@extends('layouts.app')

@section('title', $event->title)

@section('content')
    <h1>{{ $event->title }}</h1>
    <p class="category">開催日時: {{ \Carbon\Carbon::parse($event->date)->format('Y/m/d H:i') }}</p>
    @if ($event->capacity)
        <p class="category">定員: {{ $event->capacity }}人</p>
    @endif
    <p>{{ $event->description }}</p>

    <p><a href="{{ route('reservations.create', $event) }}">このイベントを予約する</a></p>

    <h3>予約状況</h3>
    @forelse ($event->reservations as $reservation)
        <div class="post">
            <p>{{ $reservation->name }} 様 - {{ $reservation->number_of_people }}名</p>
        </div>
    @empty
        <p>まだ予約はありません。</p>
    @endforelse

    <p><a href="{{ route('events.index') }}">← イベント一覧へ戻る</a></p>
@endsection

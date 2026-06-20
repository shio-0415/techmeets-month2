@extends('layouts.app')

@section('title', '予約作成')

@section('content')
    <h1>{{ $event->title }} の予約</h1>

    <form action="{{ route('reservations.store') }}" method="POST">
        @csrf
        <input type="hidden" name="event_id" value="{{ $event->id }}">

        <label>お名前</label>
        <input type="text" name="name" value="{{ old('name') }}">
        @error('name') <p class="error">{{ $message }}</p> @enderror

        <label>メールアドレス</label>
        <input type="email" name="email" value="{{ old('email') }}">
        @error('email') <p class="error">{{ $message }}</p> @enderror

        <label>人数</label>
        <input type="number" name="number_of_people" min="1" value="{{ old('number_of_people', 1) }}">
        @error('number_of_people') <p class="error">{{ $message }}</p> @enderror

        <label>予約日時</label>
        <input type="datetime-local" name="reserved_at" value="{{ old('reserved_at') }}">
        @error('reserved_at') <p class="error">{{ $message }}</p> @enderror

        <button type="submit">予約する</button>
    </form>
@endsection

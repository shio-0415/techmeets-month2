@extends('layouts.app')

@section('title', '予約一覧')

@section('content')
    <h1>予約一覧</h1>

    @forelse ($reservations as $reservation)
        <div class="post">
            <h2>{{ $reservation->event->title }}</h2>
            <p class="category">
                {{ $reservation->name }} 様 ／ {{ $reservation->email }} ／ {{ $reservation->number_of_people }}名
                ／ 予約日時: {{ \Carbon\Carbon::parse($reservation->reserved_at)->format('Y/m/d H:i') }}
            </p>
            <form action="{{ route('reservations.destroy', $reservation) }}" method="POST" onsubmit="return confirm('本当にキャンセルしますか？');">
                @csrf
                @method('DELETE')
                <button type="submit">キャンセル</button>
            </form>
        </div>
    @empty
        <p>予約がまだありません。</p>
    @endforelse

    <div>
        {{ $reservations->links() }}
    </div>
@endsection

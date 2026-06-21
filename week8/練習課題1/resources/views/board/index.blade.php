<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            掲示板
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if (session('success'))
                    <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('board.store') }}" method="POST" class="mb-6">
                    @csrf
                    <textarea name="body" rows="3" class="border rounded w-full p-2" placeholder="メッセージを入力">{{ old('body') }}</textarea>
                    @error('body') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                    <button type="submit" class="mt-2 bg-blue-600 text-white px-4 py-2 rounded">投稿する</button>
                </form>

                @forelse ($messages as $message)
                    <div class="border-b py-3">
                        <p class="text-sm text-gray-500">{{ $message->user->name }} ／ {{ $message->created_at->format('Y/m/d H:i') }}</p>
                        <p>{{ $message->body }}</p>
                    </div>
                @empty
                    <p>まだ投稿がありません。</p>
                @endforelse

                <div class="mt-4">
                    {{ $messages->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

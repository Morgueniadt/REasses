<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Note Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-2xl mb-4">{{ $note->title }}</h3>
                    <p class="text-gray-700 mb-4">{{ $note->content }}</p>

                    @if ($note->file_url)
                        <div class="mt-4">
                            <a href="{{ $note->file_url }}" target="_blank" class="text-blue-600">
                                View attached file
                            </a>
                        </div>
                    @endif

                    <p class="mt-4 text-sm text-gray-500">Created on: {{ $note->created_at->toFormattedDateString() }}</p>

                    <!-- Check if the logged-in user owns the note -->
                    @if (auth()->id() === $note->user_id)
                        <div class="mt-6 flex space-x-4">
                            <!-- Edit Button -->
                            <a href="{{ route('note.edit', $note->id) }}" 
                               class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                Edit
                            </a>

                            <!-- Delete Form -->
                            <form action="{{ route('note.destroy', $note->id) }}" method="POST" 
                                  onsubmit="return confirm('Are you sure you want to delete this note?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                                    Delete
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

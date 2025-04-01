<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-blue-900 shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-300">
                    <!-- Display Success Message if Any -->
                    @if(session('success'))
                        <div class="bg-green-600 text-white p-4 rounded mb-4 shadow-md">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        @if ($notes->isEmpty())
                            <p class="text-gray-400">No notes found.</p>
                        @else
                            @foreach ($notes as $note)
                                <div class="border border-gray-600 p-6 rounded-lg shadow-lg bg-blue-950">
                                    <a href="{{ route('note.show', $note->id) }}">
                                        <x-note-card
                                            :title="$note->title" 
                                            :created_at="$note->created_at->format('F j, Y, g:i a')" />
                                    </a>

                                    <!-- Only show Edit and Delete buttons if the user is the note owner -->
                                    @if ($note->user_id === auth()->id())
                                        <div class="mt-4 flex space-x-2">
                                            <!-- Edit Button -->
                                            <a href="{{ route('note.edit', $note->id) }}" 
                                               class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                                                Edit
                                            </a>

                                            <!-- Delete Button -->
                                            <form action="{{ route('note.destroy', $note->id) }}" method="POST" 
                                                  onsubmit="return confirm('Are you sure you want to delete this note?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700 transition">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <!-- Pagination Links -->
                    <div class="mt-6">
                        {{ $notes->links('pagination::tailwind') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

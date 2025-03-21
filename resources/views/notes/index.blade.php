<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Display Success Message if Any -->
                    @if(session('success'))
                        <div class="bg-green-500 text-white p-4 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        @if ($notes->isEmpty())
                            <p>No notes found.</p>
                        @else
                        
                            @foreach ($notes as $note)
                                <div class="border p-6 rounded-lg shadow-lg">
                                    <!-- Corrected link to pass the note's id -->
                                    <a href="{{ route('note.show', $note->id) }}">
                                        <x-note-card
                                            :title="$note->title" 
                                            :created_at="$note->created_at->format('F j, Y, g:i a')" />
                                    </a>


                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <!-- Pagination Links -->
                    {{ $notes->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

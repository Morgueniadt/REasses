<x-app-layout>
    <!-- Main content container with vertical padding -->
    <div class="py-12">
        <!-- Container to center the content with specific max width and responsive padding -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- White background container with rounded corners and shadow for styling -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Inner content area with padding and text color styling -->
                <div class="p-6 text-gray-900">
                    <!-- Use a grid layout to display notes in two columns -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <!-- Check if notes are available -->
                        @if ($notes->isEmpty())
                            <p>No notes found.</p>
                        @else
                            @foreach ($notes as $note)
                                <!-- Note container with border, padding, shadow, and rounded corners -->
                                <div class="border p-6 rounded-lg shadow-lg">
                                    <!-- Note link pointing to the show page of the note -->
                                    <a href="{{ route('note.show', $note) }}">
                                        <!-- Display the note card component with title and other relevant details -->
                                        <x-note-card 
                                            :title="$note->title" 
                                            :content="$note->content" 
                                            :created_at="$note->created_at" />
                                    </a>

                                    <!-- Edit and Delete Buttons container (no box) -->
                                    <div class="mt-4 flex space-x-2">
                                        <!-- Edit Button -->
                                        <a href="{{ route('note.edit', $note) }}" class="text-gray-600 bg-orange-300 hover:bg-orange-700 font-bold py-2 px-4 rounded">
                                            Edit
                                        </a>

                                        <!-- Delete Button -->
                                        <form action="{{ route('note.destroy', $note) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this note?');">
                                            @csrf <!-- CSRF protection for the form -->
                                            @method('DELETE') <!-- Specify that this is a DELETE request -->
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-gray-100 font-bold py-2 px-4 rounded">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

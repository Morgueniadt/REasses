<x-app-layout>
    <!-- Setting up the header for the page -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white-800 leading-tight">
            {{ __('Create New Note') }} <!-- Display header text -->
        </h2>
    </x-slot>

    <!-- Main content section with padding for vertical spacing -->
    <div class="py-12">
        <!-- Container to center the form with specific max width and padding -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- White background container with rounded corners and shadow for the form -->
            <div class="bg-black dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
>
                <!-- Form content area with padding and text color styling -->
                <div class="p-6 text-white-900">
                    <h3 class="font-semibold text-lg mb-4">Add a New Note:</h3> <!-- Section title -->

                    {{-- Display validation errors --}}
                    @if ($errors->any())
                        <div class="mb-4 text-red-600">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Using the NoteForm component to create the note --}}
                    <x-note-form 
                        :action="route('note.store')" 
                        :method="'POST'" 
                        :subjects="$subjects" 
                    />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <!-- Page Header -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-300 leading-tight">
            {{ __('Edit Note') }}
        </h2>
    </x-slot>

    <!-- Main Content -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-blue-950 overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-300">
                    <h3 class="font-semibold text-lg mb-4">Edit Note:</h3>

                    {{-- Using the NoteForm component to update the note --}}
                    <x-note-form 
                        :action="route('note.update', $note)"  
                        :method="'PUT'"  
                        :note="$note" 
                        :subjects="$subjects"
                    />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

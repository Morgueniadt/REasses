@props([
    'title', 
    'content', 
    'file_url'
])

<div class="p-6 bg-white rounded-lg shadow-md hover:shadow-lg transition duration-300">
    <!-- Note Title inside a bold heading -->
    <h4 class="font-bold text-xl mb-2">{{ $title }}</h4>

    <!-- Display note content with some padding and text styling -->
    <p class="text-gray-600 text-sm mb-4">{{ $content }}</p>

    <!-- Optional: Display file link if a file is associated with the note -->
    @isset($file_url)
        <p class="text-gray-800 text-sm mt-2">
            <a href="{{ $file_url }}" target="_blank" class="text-blue-600 hover:underline">View Attached File</a>
        </p>
    @endisset
</div>

@props(['title', 'content', 'image', 'subject'])

<div class="p-6 bg-white rounded-lg transition duration-300 ">
    <!-- Note Title inside a bold heading -->
    <h4 class="font-bold text-xl mb-2">{{ $title }}</h4>

    <!-- Display note content with some padding and text styling -->
    <p class="text-gray-700 mb-4">{{ $content ?? 'No content available' }}</p>

    <!-- Display Subject -->
    @isset($subject)
        <p class="text-gray-600 font-medium mb-2">
            <strong>Subject:</strong> {{ $subject->name }}
        </p>
    @endisset

    <!-- Optional: Display image if it exists -->
    @isset($image)
        <div class="mt-4">
            <img src="{{ asset('storage/' . $image) }}" alt="Note Image" class="w-full h-auto rounded-lg">
        </div>
    @endisset
</div>

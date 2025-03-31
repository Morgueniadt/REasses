@props(['title', 'content', 'image', 'tags', 'subject'])

<div class="p-6 bg-white rounded-lg transition duration-300 shadow-md hover:shadow-lg">
    <!-- Note Title inside a bold heading -->
    <h4 class="font-bold text-xl mb-2">{{ $title }}</h4>

    <!-- Display note content with some padding and text styling -->
    <p class="text-gray-700 mb-4">{{ $content }}</p>

    <!-- Display Subject -->
    @isset($subject)
        <p class="text-gray-600 font-medium mb-2">
            <strong>Subject:</strong> {{ $subject->name }}
        </p>
    @endisset

    <!-- Display Tags -->
    @if($tags->isNotEmpty())
        <div class="mb-4">
            <p class="text-gray-600 font-medium mb-2"><strong>Tags:</strong></p>
            <div class="space-x-2">
                @foreach($tags as $tag)
                    <span class="inline-block bg-blue-100 text-blue-700 text-xs font-semibold px-3 py-1 rounded-full">{{ $tag->name }}</span>
                @endforeach
            </div>
        </div>
    @endif

    <!-- Optional: Display image if it exists -->
    @isset($image)
        <div class="mt-4">
            <img src="{{ asset('storage/' . $image) }}" alt="Note Image" class="w-full h-auto rounded-lg">
        </div>
    @endisset
</div>

@props(['title', 'content', 'image', 'subject'])

<div class="p-6 bg-black rounded-lg transition duration-300 ">
    <!-- Note Title -->
    <h4 class="font-bold text-xl mb-2">{{ $title }}</h4>

    <!-- Display Subject -->
    @isset($subject)
        <p class="text-gray-600 font-medium mb-2">
            <strong>Subject:</strong> {{ $subject->name }}
        </p>
    @endisset

    <!-- Optional: Display image -->
    @isset($image)
        <div class="mt-4">
            <img src="{{ asset('storage/' . $image) }}" alt="Note Image" class="w-full h-auto rounded-lg">
        </div>
    @endisset
</div>

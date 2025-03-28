@props(['title', 'content', 'image'])

<div class="p-6 bg-white rounded-lg  transition duration-300">
    <!-- Note Title inside a bold heading -->
    <h4 class="font-bold text-xl mb-2">{{ $title }}</h4>

    <!-- Display note content with some padding and text styling -->

    <!-- Optional: Display image if it exists -->
    @isset($image)
        <div class="mt-4">
            <img src="{{ asset('storage/' . $image) }}" alt="Note Image" class="w-full h-auto rounded-lg">
        </div>
    @endisset
</div>

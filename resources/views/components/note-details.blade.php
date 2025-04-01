@props(['title', 'content', 'image', 'subject'])

<!-- Note Details Component -->
<div class="border border-blue-600 rounded-lg shadow-md p-6 bg-black text-gray-300 hover:shadow-lg transition duration-300 max-w-xl mx-auto">

    <!-- Note Title -->
    <h1 class="font-bold text-blue-400 mb-2 text-3xl">{{ $title }}</h1>

    <!-- Note Content -->
    <h3 class="text-blue-300 font-semibold mb-2 text-xl">Content</h3>
    <p class="leading-relaxed mb-4">{{ $content }}</p>

    <!-- Subject -->
    @isset($subject)
        <h3 class="text-blue-300 font-semibold mb-2 text-xl">Subject</h3>
        <p class="mb-4">{{ $subject->name }}</p>
    @endisset

    <!-- Optional Image -->
    @isset($image)
        <h3 class="text-blue-300 font-semibold mb-2 text-xl">Image</h3>
        <div class="mb-4">
            <img src="{{ asset('storage/' . $image) }}" alt="Note Image" class="rounded-md max-w-full h-auto border border-blue-500" />
        </div>
    @endisset

</div>

@props(['title', 'content', 'image', 'subject'])

<!-- Note Details Component -->
<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300 max-w-xl mx-auto">

    <!-- Note Title -->
    <h1 class="font-bold text-gray-800 mb-2" style="font-size: 2.5rem;">{{ $title }}</h1> 

    <!-- Note Content -->
    <h3 class="text-gray-800 font-semibold mb-2" style="font-size: 1.5rem;">Content</h3> 
    <p class="text-gray-700 leading-relaxed mb-4">{{ $content }}</p> 

    <!-- Subject -->
    @isset($subject)
        <h3 class="text-gray-800 font-semibold mb-2" style="font-size: 1.5rem;">Subject</h3>
        <p class="text-gray-700 mb-4">{{ $subject->name }}</p>  <!-- Display the subject name -->
    @endisset

    <!-- Optional Image (if exists) -->
    @isset($image)
        <h3 class="text-gray-800 font-semibold mb-2" style="font-size: 1.5rem;">Image</h3>
        <div class="mb-4">
            <img src="{{ asset('storage/' . $image) }}" alt="Note Image" class="rounded-md max-w-full h-auto" />
        </div>
    @endisset

</div>

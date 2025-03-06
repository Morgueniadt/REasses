@props(['title', 'content', 'file_url'])

<!-- Note Details Component -->
<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300 max-w-xl mx-auto">

    <!-- Note Title -->
    <h1 class="font-bold text-gray-800 mb-2" style="font-size: 2.5rem;">{{ $title }}</h1> 

    <!-- Note Content -->
    <h3 class="text-gray-800 font-semibold mb-2" style="font-size: 1.5rem;">Content</h3> 
    <p class="text-gray-700 leading-relaxed mb-4">{{ $content }}</p> 

    <!-- Optional File URL (if exists) -->
    @isset($file_url)
        <h3 class="text-gray-800 font-semibold mb-2" style="font-size: 1.5rem;">File URL</h3>
        <p class="text-gray-700 leading-relaxed mb-4">
            <a href="{{ $file_url }}" target="_blank" class="text-blue-600 hover:underline">View File</a>
        </p>
    @endisset

</div>

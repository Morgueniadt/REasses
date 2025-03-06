@props(['name', 'duration', 'release_year', 'number_of_songs', 'image'])

<!-- Album Details Component -->
<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300 max-w-xl mx-auto">

    <!-- Album Cover Image -->
    
        <img src="{{ url($image) }}" alt="Album Cover" class="w-full h-auto rounded-lg mb-4">
  

    <!-- Album name -->
    <h1 class="font-bold text-gray-800 mb-2" style="font-size: 2.5rem;">{{ $name }}</h1> 

    <!-- Album Duration -->
    <h3 class="text-gray-800 font-semibold mb-2" style="font-size: 1.5rem;">Duration</h3> 
    <p class="text-gray-700 leading-relaxed mb-4">{{ $duration }}</p> 

    <!-- Release Year -->
    <h2 class="text-gray-500 text-sm italic mb-4">Released: {{ $release_year }}</h2> 

    <!-- Number of Songs -->
    <h3 class="text-gray-800 font-semibold mb-2" style="font-size: 1.5rem;">Number of Songs</h3> 
    <p class="text-gray-700 leading-relaxed">{{ $number_of_songs }}</p> 

</div>

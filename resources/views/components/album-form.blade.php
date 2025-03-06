@props(['action', 'method', 'album'])

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

    <!-- name Field -->
    <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700">name</label>
        <input
            type="text"
            name="name"
            id="name"
            value="{{ old('name', $album->name ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
        />
        @error('name')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Image Field -->
    <div class="mb-4">
        <label for="image" class="block text-sm font-medium text-gray-700">Album Image</label>
        <input
            type="file"
            name="image"
            id="image"
            accept="image/*"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
        />
        @error('image')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Display Current Image if Editing -->
    @isset($album->image)
        <div class="mb-4">
            <img src="{{ asset('storage/' . $album->image) }}" alt="{{ $album->name }}" class="w-24 h-24 object-cover rounded-md">
        </div>
    @endisset

    <!-- Duration Field -->
    <div class="mb-4">
        <label for="duration" class="block text-sm font-medium text-gray-700">Duration</label>
        <input
            type="text"
            name="duration"
            id="duration"
            value="{{ old('duration', $album->duration ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
        />
        @error('duration')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Release Year Field -->
    <div class="mb-4">
        <label for="release_year" class="block text-sm font-medium text-gray-700">Release Year</label>
        <input
            type="number"
            name="release_year"
            id="release_year"
            value="{{ old('release_year', $album->release_year ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
            min="1900" max="{{ date('Y') }}"
        />
        @error('release_year')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Number of Songs Field -->
    <div class="mb-4">
        <label for="number_of_songs" class="block text-sm font-medium text-gray-700">Number of Songs</label>
        <input
            type="number"
            name="number_of_songs"
            id="number_of_songs"
            value="{{ old('number_of_songs', $album->number_of_songs ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
            min="1"
        />
        @error('number_of_songs')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Submit Button -->
    <div class="mt-6">
        <x-primary-button>
            {{ isset($album) ? 'Update Album' : 'Add Album' }}
        </x-primary-button>
    </div>
</form>
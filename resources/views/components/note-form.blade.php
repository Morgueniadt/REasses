@props(['action', 'method', 'note'])

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

    <!-- Title Field -->
    <div class="mb-4">
        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
        <input
            type="text"
            name="title"
            id="title"
            value="{{ old('title', $note->title ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
        />
        @error('title')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Content Field -->
    <div class="mb-4">
        <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
        <textarea
            name="content"
            id="content"
            rows="5"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
        >{{ old('content', $note->content ?? '') }}</textarea>
        @error('content')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Image Upload Field -->
    <div class="mb-4">
        <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
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
    @isset($note->image)
        <div class="mb-4">
            <img src="{{ asset('storage/' . $note->image) }}" alt="Current Image" class="w-full h-auto rounded-lg">
        </div>
    @endisset

    <!-- Submit Button -->
    <div class="mt-6">
        <x-primary-button>
            {{ isset($note) ? 'Update Note' : 'Add Note' }}
        </x-primary-button>
    </div>
</form>

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

    <!-- File URL Field (optional) -->
    <div class="mb-4">
        <label for="file_url" class="block text-sm font-medium text-gray-700">File URL</label>
        <input
            type="text"
            name="file_url"
            id="file_url"
            value="{{ old('file_url', $note->file_url ?? '') }}"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
        />
        @error('file_url')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Display Current File URL if Editing -->
    @isset($note->file_url)
        <div class="mb-4">
            <a href="{{ $note->file_url }}" target="_blank" class="text-blue-600 underline">View File</a>
        </div>
    @endisset

    <!-- Submit Button -->
    <div class="mt-6">
        <x-primary-button>
            {{ isset($note) ? 'Update Note' : 'Add Note' }}
        </x-primary-button>
    </div>
</form>

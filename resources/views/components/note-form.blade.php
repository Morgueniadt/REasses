@props(['action', 'method', 'note', 'subjects'])

<form action="{{ $action }}" method="POST" enctype="multipart/form-data" class="bg-black p-6 rounded-lg border border-blue-600 shadow-lg">
    @csrf
    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

    <!-- Title Field -->
    <div class="mb-4">
        <label for="title" class="block text-sm font-medium text-blue-400">Title</label>
        <input type="text" name="title" id="title"
            value="{{ old('title', $note->title ?? '') }}" required
            class="mt-1 block w-full bg-gray-900 border-blue-500 text-gray-300 rounded-md shadow-sm focus:ring-blue-400 focus:border-blue-400">
        @error('title')
            <p class="text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <!-- Content Field -->
    <div class="mb-4">
        <label for="content" class="block text-sm font-medium text-blue-400">Content</label>
        <textarea name="content" id="content" rows="5"
            class="mt-1 block w-full bg-gray-900 border-blue-500 text-gray-300 rounded-md shadow-sm focus:ring-blue-400 focus:border-blue-400">
            {{ old('content', $note->content ?? '') }}
        </textarea>
        @error('content')
            <p class="text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <!-- Subject Selection -->
    <div class="mb-4">
        <label for="subject_id" class="block text-sm font-medium text-blue-400">Subject</label>
        <select name="subject_id" id="subject_id"
            class="mt-1 block w-full bg-gray-900 border-blue-500 text-gray-300 rounded-md shadow-sm focus:ring-blue-400 focus:border-blue-400">
            <option value="">Select a Subject</option>
            @foreach($subjects as $subject)
                <option value="{{ $subject->id }}" {{ old('subject_id', $note->subject_id ?? '') == $subject->id ? 'selected' : '' }}>
                    {{ $subject->name }}
                </option>
            @endforeach
        </select>
        @error('subject_id')
            <p class="text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <!-- Image Upload Field -->
    <div class="mb-4">
        <label for="image" class="block text-sm font-medium text-blue-400">Upload Image</label>
        <input type="file" name="image" id="image" accept="image/*"
            class="mt-1 block w-full bg-gray-900 border-blue-500 text-gray-300 rounded-md shadow-sm focus:ring-blue-400 focus:border-blue-400">
        @error('image')
            <p class="text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <!-- Display Current Image if Editing -->
    @isset($note->image)
        <div class="mb-4">
            <img src="{{ asset('storage/' . $note->image) }}" alt="Current Image" class="w-full h-auto rounded-lg border border-blue-500">
        </div>
    @endisset

    <!-- Submit Button -->
    <div class="mt-6">
        <button type="submit" class="w-full px-4 py-2 bg-blue-400 text-black font-semibold rounded-md hover:bg-blue-500 transition">
            {{ isset($note) ? 'Update Note' : 'Add Note' }}
        </button>
    </div>
</form>

<!-- resources/views/notes/edit.blade.php -->

<form action="{{ route('notes.update', $note->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- Title -->
    <label for="title">Title</label>
    <input type="text" name="title" id="title" value="{{ $note->title }}" required>

    <!-- Content -->
    <label for="content">Content</label>
    <textarea name="content" id="content">{{ $note->content }}</textarea>

    <!-- Subject Selection -->
    <label for="subject_id">Subject</label>
    <select name="subject_id" id="subject_id">
        <option value="">Select a Subject</option>
        @foreach($subjects as $subject)
            <option value="{{ $subject->id }}" {{ $note->subject_id == $subject->id ? 'selected' : '' }}>
                {{ $subject->name }}
            </option>
        @endforeach
    </select>

    <!-- Tags Selection -->
    <label for="tags">Tags</label>
    <select name="tags[]" id="tags" multiple>
        @foreach($tags as $tag)
            <option value="{{ $tag->id }}" {{ $note->tags->contains($tag->id) ? 'selected' : '' }}>
                {{ $tag->name }}
            </option>
        @endforeach
    </select>

    <!-- Image -->
    <label for="image">Image</label>
    <input type="file" name="image" id="image">

    <button type="submit">Update Note</button>
</form>

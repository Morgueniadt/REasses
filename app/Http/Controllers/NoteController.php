<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Tag;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NoteController extends Controller
{
    public function index()
    {
        // Paginate notes with the related tags and subjects
        $notes = Note::with(['tags', 'subject'])->paginate(10);

        return view('notes.index', compact('notes'));
    }

    public function create()
    {
        // Fetch all tags and subjects for use in the create form
        $tags = Tag::all();
        $subjects = Subject::all();

        return view('notes.create', compact('tags', 'subjects'));  // Return the create form view
    }

    public function store(Request $request)
    {
        // Validate input, including tags and subject
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id', // Validate each tag ID
            'subject_id' => 'nullable|exists:subjects,id', // Validate subject ID
        ]);

        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('notes_images', 'public');
        }

        // Create the note
        $note = Note::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'image' => $imagePath,
            'user_id' => auth()->id(),
            'subject_id' => $validated['subject_id'], // Assign subject
        ]);

        // Attach tags if provided
        if ($request->has('tags')) {
            $note->tags()->attach($validated['tags']);
        }

        return redirect()->route('notes.index')->with('success', 'Note created successfully.');
    }

    public function edit(Note $note)
    {
        $tags = Tag::all(); // All available tags
        $subjects = Subject::all(); // All available subjects

        return view('notes.edit', compact('note', 'tags', 'subjects')); // Return the edit form
    }

    public function update(Request $request, Note $note)
    {
        // Validate input, including tags and subject
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id', // Validate each tag ID
            'subject_id' => 'nullable|exists:subjects,id', // Validate subject ID
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            if ($note->image) {
                Storage::delete('public/' . $note->image); // Delete old image
            }
            $imagePath = $request->file('image')->store('notes_images', 'public');
            $note->image = $imagePath; // Update image
        }

        // Update the note
        $note->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'subject_id' => $validated['subject_id'], // Update subject
        ]);

        // Sync tags (attach and detach as necessary)
        if ($request->has('tags')) {
            $note->tags()->sync($validated['tags']);
        }

        return redirect()->route('notes.index')->with('success', 'Note updated successfully.');
    }

    public function destroy(Note $note)
    {
        // Delete the image if exists
        if ($note->image) {
            Storage::delete('public/' . $note->image);
        }

        // Detach tags
        $note->tags()->detach();

        // Delete the note
        $note->delete();

        return redirect()->route('notes.index')->with('success', 'Note deleted successfully.');
    }
}

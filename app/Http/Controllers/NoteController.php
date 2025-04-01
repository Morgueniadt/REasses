<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NoteController extends Controller
{
    public function index()
    {
        // Paginate notes with the related subjects (no tags anymore)
        $notes = Note::with('subjects')->paginate(10);  // Removed 'tags'

        return view('notes.index', compact('notes'));
    }

    public function create()
{
    $subjects = Subject::all();
    $note = null;  // New note, no existing note data
    return view('notes.create', compact('subjects', 'note'));
}



    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'subjects' => 'nullable|array', 
            'subjects.*' => 'exists:subjects,id', // Validate each subject ID
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('notes_images', 'public');
        }

        $note = Note::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'image' => $imagePath,
            'user_id' => auth()->id(),
        ]);

        // Attach subjects if provided (no tags anymore)
        if (isset($validated['subjects']) && count($validated['subjects']) > 0) {
            $note->subjects()->attach($validated['subjects']);
        }

        return redirect()->route('note.index')->with('success', 'Note created successfully.');
    }

    public function edit(Note $note)
{
    $subjects = Subject::all();
    return view('notes.edit', compact('subjects', 'note'));
}
    


    public function update(Request $request, Note $note)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'subjects' => 'nullable|array', 
            'subjects.*' => 'exists:subjects,id', 
        ]);

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            if ($note->image) {
                Storage::delete('public/' . $note->image); // Delete old image
            }
            $imagePath = $request->file('image')->store('notes_images', 'public');
            $note->image = $imagePath;
        }

        $note->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
        ]);

        // Sync subjects if provided (no tags anymore)
        if (isset($validated['subjects']) && count($validated['subjects']) > 0) {
            $note->subjects()->sync($validated['subjects']);
        }

        return redirect()->route('notes.index')->with('success', 'Note updated successfully.');
    }
    public function show($id)
    {
        // Find the note with its related subjects
        $note = Note::with('subjects')->findOrFail($id);  // Eager load 'subjects' relationship
    
        // Return the view with the note details
        return view('notes.show', compact('note'));
    }

    public function destroy(Note $note)
    {
        // Delete the image if exists
        if ($note->image) {
            Storage::delete('public/' . $note->image);
        }

        // Detach subjects
        $note->subjects()->detach();

        // Delete the note
        $note->delete();

        return redirect()->route('notes.index')->with('success', 'Note deleted successfully.');
    }
}

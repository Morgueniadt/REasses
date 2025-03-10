<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Paginate notes with 10 per page (adjust the number as needed)
    $notes = Note::paginate(10);

    return view('notes.index', compact('notes'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('notes.create');  // Return the view with the create form
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'file_url' => 'nullable|file|mimes:pdf,jpeg,png,docx', // Add file validation if necessary
        ]);
    
        // Handle file upload
        if ($request->hasFile('file_url')) {
            $filePath = $request->file('file_url')->store('notes_files', 'public'); // Store in the 'notes_files' folder inside 'public'
        } else {
            $filePath = null; // No file uploaded
        }
    
        // Create the note and associate it with the authenticated user
        Note::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'file_url' => $filePath, // Store the file path
            'user_id' => auth()->id(), // Automatically associate with the authenticated user
        ]);
    
        // Redirect to the notes index page with a success message
        return redirect()->route('notes.index')->with('success', 'Note created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        return view('notes.show', compact('note'));  // Return the view and pass the specific note
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        return view('notes.edit', compact('note'));  // Return the edit view with the note data
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        // Validate the input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'file_url' => 'nullable|url',  // Optional file URL field
        ]);

        // Update the note
        $note->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'file_url' => $validated['file_url'],
        ]);

        // Redirect to the notes index page with a success message
        return redirect()->route('notes.index')->with('success', 'Note updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        // Delete the note
        $note->delete();

        // Redirect to the notes index page with a success message
        return redirect()->route('notes.index')->with('success', 'Note deleted successfully.');
    }
}

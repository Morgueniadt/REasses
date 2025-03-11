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
        // Paginate notes with 10 per page (you can change 10 to any other number as needed)
        $notes = Note::paginate(10);
        // dd($notes);
        // Return the view with paginated notes
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
        // Validate the input, including image validation
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validating image
        ]);
        
        // Handle image upload
        if ($request->hasFile('image')) {
            // Store the image in the 'notes_images' folder inside the 'public' disk
            $imagePath = $request->file('image')->store('notes_images', 'public');
        } else {
            $imagePath = null; // If no image is uploaded
        }
        
        // Create the note with the image
        Note::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'image' => $imagePath, // Save the image path
            'user_id' => auth()->id(), // Associate with authenticated user
        ]);
    
        return redirect()->route('note.index')->with('success', 'Note created successfully.');
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        return view('notes.show', compact('note'));  // Return the view and pass the specific notes
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        return view('notes.edit', compact('notes'));  // Return the edit view with the notes data
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validating image
        ]);
    
        // Handle image upload if a new image is provided
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($note->image) {
                Storage::delete('public/' . $note->image);
            }
    
            // Store the new image
            $imagePath = $request->file('image')->store('notes_images', 'public');
            $note->image = $imagePath; // Update image field
        }
    
        // Update the note
        $note->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
        ]);
    
        return redirect()->route('notes.index')->with('success', 'Note updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        // Delete the notes
       $note->delete();

        // Redirect to the notes index page with a success message
        return redirect()->route('notes.index')->with('success', 'Note deleted successfully.');
    }
}

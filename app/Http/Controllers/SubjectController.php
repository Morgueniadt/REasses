<?php

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
 
class SubjectController extends Controller
{
    public function index()
    {
        return response()->json(Subject::all(), 200);
    }
 
    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|unique:subjects']);
        $subject = new Subject();
        $subject->fill($request->all());
        $subject->save();
    
        return response()->json($subject, 201);
    }
    
 
    public function show($id)
{
    // Retrieve the note by ID
    $note = Note::with('subjects')->findOrFail($id);  // Use with() if you want to include subjects

    // Return the view with the note
    return view('notes.show', compact('note'));
}

 
    public function update(Request $request, Subject $subject)
    {
        $request->validate(['name' => 'required|string|unique:subjects,name,' . $subject->id]);
        $subject->fill($request->all());
        $subject->save();
    
        return response()->json($subject, 200);
    }
    
 
    public function destroy(Subject $subject)
    {
        try {
            $subject->delete();
            return response()->json(['message' => 'Subject deleted'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error deleting subject', 'error' => $e->getMessage()], 500);
        }
    }
    
}
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
        $subject = Subject::create($request->all());
 
        return response()->json($subject, 201);
    }
 
    public function show(Subject $subject)
    {
        return response()->json($subject, 200);
    }
 
    public function update(Request $request, Subject $subject)
    {
        $request->validate(['name' => 'required|string|unique:subjects,name,' . $subject->id]);
        $subject->update($request->all());
 
        return response()->json($subject, 200);
    }
 
    public function destroy(Subject $subject)
    {
        $subject->delete();
        return response()->json(['message' => 'Subject deleted'], 200);
    }
}
<?php

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
 
class TagController extends Controller
{
    public function index()
    {
        return response()->json(Tag::all(), 200);
    }
 
    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|unique:tags']);
        $tag = Tag::create($request->all());
 
        return response()->json($tag, 201);
    }
 
    public function show(Tag $tag)
    {
        return response()->json($tag, 200);
    }
 
    public function update(Request $request, Tag $tag)
    {
        $request->validate(['name' => 'required|string|unique:tags,name,' . $tag->id]);
        $tag->update($request->all());
 
        return response()->json($tag, 200);
    }
 
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return response()->json(['message' => 'Tag deleted'], 200);
    }
}
 
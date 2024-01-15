<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tags; // Update this if necessary

class TagController extends Controller
{
    public function index()
    {
        $tags = Tags::all();
        return response()->json($tags);
    }

    public function upload(Request $request)
    {
        // Add validation for the input data if needed

        $tag = new Tags([
            'tag_name' => $request['tag_name'],
        ]);
        $tag->save();

        return response()->json(['message' => 'Data received and processed'], 200);
    }

    public function create()
    {
        return view('tags.create'); // Update the view name if necessary
    }

    public function store(Request $request)
    {
        // Implement validation for the input data

        $tag = new Tags([
            'tag' => $request['tag'],
        ]);
        $tag->save();

        return redirect()->route('tags.index')->with('success', 'Tag created successfully');
    }

    public function show($id)
    {
        $tag = Tags::find($id);
        return view('tags.show', ['tag' => $tag]); // Update the view name if necessary
    }

    public function edit($id)
    {
        $tag = Tags::find($id);
        return view('tags.edit', ['tag' => $tag]); // Update the view name if necessary
    }

    public function update(Request $request, $id)
    {
        // Implement validation for the input data

        $tag = Tags::find($id);
        $tag->update([
            'tag' => $request['tag'],
        ]);

        return redirect()->route('tags.show', $id)->with('success', 'Tag updated successfully');
    }

    public function destroy($id)
    {
        $tag = Tags::find($id);
        $tag->delete();

        return redirect()->route('tags.index')->with('success', 'Tag deleted successfully');
    }
}

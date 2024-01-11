<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Tag extends Controller
{
    public function index()
    {
        $Tag = Tag::all(); // Use the correct model name 'User'
        return response()->json($Tag);        }

    public function upload(Request $request)
    {
        $Tag = new Tag([
            'tag' => $request['tag'],
        ]);
        $Tag->save();
        return response()->json(['message' => 'Data received and processed'], 200);
    }

    public function create()
    {
        return view('Tag.create');
    }

    public function store(Request $request)
    {
        // Validate and store a new user record
        // Use the 'User' model to create a new user
        // ...

        return redirect()->route('Tag.index')->with('success', 'Tag created successfully'); // Update the route name to 'users.index'
    }

    public function show($id)
    {
        $Tag = Tag::find($id); // Use the correct model name 'User'
        return view('Tag.show', ['Tag' => $Tag]); // Update the view name to 'users.show'
    }

    public function edit($id)
    {
        $Tag = Tag::find($id); // Use the correct model name 'User'
        return view('Tag.edit', ['Tag' => $Tag]); // Update the view name to 'users.edit'
    }

    public function update(Request $request, $id)
    {
        // Validate and update the user record
        // Use the 'User' model to update the user
        // ...

        return redirect()->route('Tag.show', $id)->with('success', 'Tag updated successfully'); // Update the route name to 'users.show'
    }

    public function destroy($id)
    {
        $Tag = Tag::find($id); // Use the correct model name 'User'
        $Tag->delete(); // Use the 'delete' method to delete the user

        return redirect()->route('Tag.index')->with('success', 'Tag deleted successfully'); // Update the route name to 'users.index'
    }
}

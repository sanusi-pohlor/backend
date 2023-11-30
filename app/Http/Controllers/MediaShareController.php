<?php

namespace App\Http\Controllers;

use App\Models\MediaShare;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\MediaShareCreated;

class MediaShareController extends Controller
{
    public function index()
    {
        $MediaShare = MediaShare::all();
        return response()->json($MediaShare);
    }

    public function upload(Request $request)
    {
        // Validate incoming data
        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'details' => 'required|string',
            'tag' => 'required|string',
            // Add validation rules for other fields if needed
        ]);
        try {
            // Create a MediaShare MediaShare model instance
            $MediaShare = new MediaShare();
            $MediaShare->title = $validatedData['title'];
            $MediaShare->description = $validatedData['description'];
            $MediaShare->details = $validatedData['details'];
            $MediaShare->tag = $validatedData['tag'];
            // Assign other fields from the form

            // Save the MediaShare data to the database
            $MediaShare->save();

            return response()->json(['message' => 'Data saved successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to save data', 'error' => $e->getMessage()], 500);
        }
    }

    public function uploadimage(Request $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move('MediaShareUploads/', $fileName); // Move file to desired directory
            return response()->json(['imageUrl' => '/MediaShareUploads/' . $fileName]);
        }
        return response()->json(['error' => 'No image uploaded'], 400);
    }


    public function create()
    {
        return view('MediaShare.create');
    }

    public function store(Request $request)
    {
        // Validate and store a MediaShare MediaShare record
        // ...

        return redirect()->route('MediaShare.index')->with('success', 'MediaShare created successfully');
    }

    public function show($id)
    {
        $MediaShare = MediaShare::find($id);

        if (!$MediaShare) {
            return response()->json(['message' => 'MediaShare not found'], 404);
        }

        return response()->json($MediaShare);
    }

    public function edit($id)
    {
        $MediaShare = MediaShare::find($id);
        return view('MediaShare.edit', ['MediaShare' => $MediaShare]);
    }

    public function update(Request $request, $id)
    {
        // Validate and update the MediaShare record
        // ...

        return redirect()->route('MediaShare.show', $id)->with('success', 'MediaShare updated successfully');
    }

    public function destroy($id)
    {
        $MediaShare = MediaShare::find($id);
        $MediaShare->delete();

        return redirect()->route('MediaShare.index')->with('success', 'MediaShare deleted successfully');
    }
}

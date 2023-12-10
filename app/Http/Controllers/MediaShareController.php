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
        
        foreach ($MediaShare as $item) {
            $WithMediaShare[] = [
                'id' => $item->id,
                'title' => $item->title,
                'details' => $item->details,
                'cover_image' => asset('cover_image/' . $item->cover_image),
            ];        
        }
        return response()->json($WithMediaShare, 200);
    }

    public function upload(Request $request)
    {
        $uploadedImage  = $request->file('cover_image');
        $imageName = time() . '.' . $uploadedImage->getClientOriginalExtension();
        $uploadedImage->move('cover_image/', $imageName);

        $MediaShare = new MediaShare([
            'Author' => $request['Author'],
            'title' => $request['title'],
            'details' => $request['details'],
            'cover_image' => $imageName,
            'video' => $request['video'],
            'tag' => $request['tag'],
            'link' => $request['link'],
            'star' => 0,
            'status' => 1,
        ]);
        $MediaShare->save();
        return response()->json(['message' => 'Data saved successfully'], 200);
    }

    public function updateStatus(Request $request, $id)
    {
        // Validate the request data
        $validator = MediaShare::make($request->all(), [
            'status' => 'required|in:0,1',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Find the article by ID
        $MediaShare = MediaShare::find($id);

        if (!$MediaShare) {
            return response()->json(['error' => 'Article not found'], 404);
        }

        // Update the status
        $MediaShare->status = $request->input('status');
        $MediaShare->save();

        return response()->json(['message' => 'Article status updated successfully']);
    }

    public function delete($id)
    {
        // Find the article by ID
        $MediaShare = MediaShare::find($id);

        if (!$MediaShare) {
            return response()->json(['error' => 'Article not found'], 404);
        }

        // Delete the article
        $MediaShare->delete();

        return response()->json(['message' => 'Article deleted successfully']);
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
            return response()->json(['error' => 'Fake News not found'], 404);
        }
        $MediaShare->cover_image = asset('cover_image/' . $MediaShare->cover_image);
        return response()->json($MediaShare);
    }

    public function edit($id)
    {
        $MediaShare = MediaShare::find($id);
        return view('MediaShare.edit', ['MediaShare' => $MediaShare]);
    }

    public function update(Request $request, $id)
    {
        $MediaShare = MediaShare::find($id);

        if ($request->file('cover_image')) {
            $uploadedImage = $request->file('cover_image');
            $imageName = time() . '.' . $uploadedImage->getClientOriginalExtension();
            $uploadedImage->move('cover_image/', $imageName);

            $MediaShare->title = $request->input('title');
            $MediaShare->details = $request->input('details');
            $MediaShare->cover_image = $imageName;
            $MediaShare->video = $request->input('video');
            $MediaShare->tag = $request->input('tag');
            $MediaShare->link = $request->input('link');
            $MediaShare->update();

            return response()->json(['message' => 'Fake News updated successfully'], 200);
        } else {
            return response()->json(['message' => 'No images to upload'], 400);
        }
    }

    public function destroy($id)
    {
        $MediaShare = MediaShare::find($id);
        $MediaShare->delete();

        return redirect()->route('MediaShare.index')->with('success', 'MediaShare deleted successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\NewsCreated;

class NewsController extends Controller
{
    public function index()
    {
        $News = News::all();
        return response()->json($News);
    }

    public function upload(Request $request)
    {
        // Validate incoming data
        $validatedData = $request->validate([
            'title' => 'required|string',
            'details' => 'required|string',
            'tag' => 'required|string',
            // Add validation rules for other fields if needed
        ]);
        try {
            // Create a new News model instance
            $news = new News();
            $news->title = $validatedData['title'];
            $news->details = $validatedData['details'];
            $news->tag = $validatedData['tag'];
            // Assign other fields from the form

            // Save the news data to the database
            $news->save();

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
            $file->move('NewUploads/', $fileName); // Move file to desired directory
            return response()->json(['imageUrl' => '/NewUploads/' . $fileName]);
        }
        return response()->json(['error' => 'No image uploaded'], 400);
    }


    public function create()
    {
        return view('News.create');
    }

    public function store(Request $request)
    {
        // Validate and store a new news record
        // ...

        return redirect()->route('News.index')->with('success', 'News created successfully');
    }

    public function show($id)
    {
        $news = News::find($id);

        if (!$news) {
            return response()->json(['message' => 'ฟNews not found'], 404);
        }

        return response()->json($news);
    }

    public function edit($id)
    {
        $News = News::find($id);
        return view('News.edit', ['News' => $News]);
    }

    public function update(Request $request, $id)
    {
        // Validate and update the news record
        // ...

        return redirect()->route('News.show', $id)->with('success', 'News updated successfully');
    }

    public function destroy($id)
    {
        $News = News::find($id);
        $News->delete();

        return redirect()->route('News.index')->with('success', 'News deleted successfully');
    }
}

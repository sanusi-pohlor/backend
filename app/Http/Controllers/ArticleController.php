<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\ArticleCreated;

class ArticleController extends Controller
{
    public function index()
    {
        $Article = Article::all();
        return response()->json($Article);
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
            // Create a Article Article model instance
            $Article = new Article();
            $Article->title = $validatedData['title'];
            $Article->description = $validatedData['description'];
            $Article->details = $validatedData['details'];
            $Article->tag = $validatedData['tag'];
            // Assign other fields from the form

            // Save the Article data to the database
            $Article->save();

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
            $file->move('ArticleUploads/', $fileName); // Move file to desired directory
            return response()->json(['imageUrl' => '/ArticleUploads/' . $fileName]);
        }
        return response()->json(['error' => 'No image uploaded'], 400);
    }


    public function create()
    {
        return view('Article.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('Article.index')->with('success', 'Article created successfully');
    }

    public function show($id)
    {
        $Article = Article::find($id);

        if (!$Article) {
            return response()->json(['message' => 'Article not found'], 404);
        }

        return response()->json($Article);
    }

    public function edit($id)
    {
        $Article = Article::find($id);
        return view('Article.edit', ['Article' => $Article]);
    }

    public function update(Request $request, $id)
    {
        // Validate and update the Article record
        // ...

        return redirect()->route('Article.show', $id)->with('success', 'Article updated successfully');
    }

    public function destroy($id)
    {
        $Article = Article::find($id);
        $Article->delete();

        return redirect()->route('Article.index')->with('success', 'Article deleted successfully');
    }
}

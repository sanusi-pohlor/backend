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
        $ArticleWithImages = [];

        foreach ($Article as $item) {
            $ArticleWith[] = [
                'id' => $item->id,
                'title' => $item->title,
                'details' => $item->details,
                'cover_image' => asset('cover_image/' . $item->cover_image),
            ];
        }

        return response()->json($ArticleWith, 200);
    }
    public function upload(Request $request)
    {
        $uploadedImage = $request->file('cover_image');
        $imageName = time() . '.' . $uploadedImage->getClientOriginalExtension();
        $uploadedImage->move('cover_image/', $imageName);

        $Article = new Article([
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
        $Article->save();
        return response()->json(['message' => 'Data saved successfully'], 200);
    }

    public function updateStatus(Request $request, $id)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'status' => 'required|in:0,1',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Find the article by ID
        $article = Article::find($id);

        if (!$article) {
            return response()->json(['error' => 'Article not found'], 404);
        }

        // Update the status
        $article->status = $request->input('status');
        $article->save();

        return response()->json(['message' => 'Article status updated successfully']);
    }

    public function delete($id)
    {
        // Find the article by ID
        $article = Article::find($id);

        if (!$article) {
            return response()->json(['error' => 'Article not found'], 404);
        }

        // Delete the article
        $article->delete();

        return response()->json(['message' => 'Article deleted successfully']);
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
        $article = News::find($id);

        if (!$article) {
            return response()->json(['error' => 'Fake News not found'], 404);
        }
        $article->cover_image = asset('cover_image/' . $article->cover_image);
        return response()->json($article);
    }

    public function edit($id)
    {
        $Article = Article::find($id);
        return view('Article.edit', ['Article' => $Article]);
    }

    public function update(Request $request, $id)
    {
        $Article = Article::find($id);

        if ($request->file('cover_image')) {
            $uploadedImage = $request->file('cover_image');
            $imageName = time() . '.' . $uploadedImage->getClientOriginalExtension();
            $uploadedImage->move('cover_image/', $imageName);

            $Article->title = $request->input('title');
            $Article->details = $request->input('details');
            $Article->cover_image = $imageName;
            $Article->video = $request->input('video');
            $Article->tag = $request->input('tag');
            $Article->link = $request->input('link');
            $Article->update();

            return response()->json(['message' => 'Fake News updated successfully'], 200);
        } else {
            return response()->json(['message' => 'No images to upload'], 400);
        }
    }
    
    public function destroy($id)
    {
        $Article = Article::find($id);
        $Article->delete();

        return redirect()->route('Article.index')->with('success', 'Article deleted successfully');
    }
}

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
        $news = News::all();

        foreach ($news as $item) {
            $newsWith[] = [
                'id' => $item->id,
                'title' => $item->title,
                'details' => $item->details,
                'cover_image' => asset('cover_image/' . $item->cover_image),
            ];
        }

        return response()->json($newsWith, 200);
    }


    public function upload(Request $request)
    {
        $uploadedImage = $request->file('cover_image');
        $imageName = time() . '.' . $uploadedImage->getClientOriginalExtension();
        $uploadedImage->move('cover_image/', $imageName);

        $news = new News([
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
        $news->save();
        return response()->json(['message' => 'Data saved successfully'], 200);
    }

    public function updateStatus(Request $request, $id)
    {
        // Validate the request data
        $validator = News::make($request->all(), [
            'status' => 'required|in:0,1',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Find the article by ID
        $news = News::find($id);

        if (!$news) {
            return response()->json(['error' => 'Article not found'], 404);
        }

        // Update the status
        $news->status = $request->input('status');
        $news->save();

        return response()->json(['message' => 'Article status updated successfully']);
    }

    public function delete($id)
    {
        // Find the article by ID
        $news = News::find($id);

        if (!$news) {
            return response()->json(['error' => 'Article not found'], 404);
        }

        // Delete the article
        $news->delete();

        return response()->json(['message' => 'Article deleted successfully']);
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
        $News = News::find($id);

        if (!$News) {
            return response()->json(['error' => 'Fake News not found'], 404);
        }
        $News->cover_image = asset('cover_image/' . $News->cover_image);
        return response()->json($News);
    }

    public function edit($id)
    {
        $News = News::find($id);
        return view('News.edit', ['News' => $News]);
    }

    public function update(Request $request, $id)
    {
        $News = News::find($id);

        if ($request->file('cover_image')) {
            $uploadedImage = $request->file('cover_image');
            $imageName = time() . '.' . $uploadedImage->getClientOriginalExtension();
            $uploadedImage->move('cover_image/', $imageName);

            $News->title = $request->input('title');
            $News->details = $request->input('details');
            $News->cover_image = $imageName;
            $News->video = $request->input('video');
            $News->tag = $request->input('tag');
            $News->link = $request->input('link');
            $News->update();

            return response()->json(['message' => 'Fake News updated successfully'], 200);
        } else {
            return response()->json(['message' => 'No images to upload'], 400);
        }
    }

    public function destroy($id)
    {
        $News = News::find($id);
        $News->delete();

        return redirect()->route('News.index')->with('success', 'News deleted successfully');
    }
}

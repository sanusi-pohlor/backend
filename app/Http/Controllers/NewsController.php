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
                'tag' => $item->tag,
                'link' => $item->link,
                'star' => $item->star,
                'Author' => $item->Author,
                'status' => $item->status,
                'type_new' => $item->type_new,
                'med_new' => $item->med_new,
                'prov_new' => $item->prov_new,
                'key_new' => $item->key_new,
                'created_at' => $item->created_at,
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
            'type_new' => $request['type_new'],
            'med_new' => $request['med_new'],
            'prov_new' => $request['prov_new'],
            'key_new' => $request['key_new'],
        ]);
        $news->save();
        return response()->json(['message' => 'Data saved successfully'], 200);
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:0,1',
        ]);
    
        $news = News::find($id);
    
        if (!$news) {
            return response()->json(['error' => 'News not found'], 404);
        }
    
        $news->status = $request->input('status');
        $news->save();
    
        return response()->json(['message' => 'News status updated successfully'], 200);
    }    

    public function delete($id)
    {
        // Find the News by ID
        $news = News::find($id);

        if (!$news) {
            return response()->json(['error' => 'News not found'], 404);
        }

        // Delete the News
        $news->delete();

        return response()->json(['message' => 'News deleted successfully']);
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
            $News->type_new = $request->input('type_new');
            $News->med_new = $request->input('med_new');
            $News->prov_new = $request->input('prov_new');
            $News->key_new = $request->input('key_new');
            $News->update();

            return response()->json(['message' => 'Fake News updated successfully'], 200);
        } else {
            return response()->json(['message' => 'No images to upload'], 400);
        }
    }

    public function destroy($id)
    {
        try {
            $News = News::findOrFail($id);
            $News->delete();

            return response()->json('News deleted successfully');
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error deleting News'], 500);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();

        foreach ($news as $item) {
            $newsWith[] = [
                'id' => $item->id,
                'title' => $item->title,
                'cover_image' => asset('cover_image/' . $item->cover_image),
                'details' => $item->details,
                'details_image' => asset('details_image/' . $item->details_image),
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
        try {
            $uploadedImagecover = $request->file('cover_image');
            $imageNamecover = time() . '.' . $uploadedImagecover->getClientOriginalExtension();
            $uploadedImagecover->move('cover_image/', $imageNamecover);

            $detailsImages = [];

            if ($request->hasFile('details_image')) {
                foreach ($request->file('details_image') as $uploadedImagedetails) {
                    $imageNamedetails = time() . '_' . uniqid() . '.' . $uploadedImagedetails->getClientOriginalExtension();
                    $uploadedImagedetails->move('cover_image/', $imageNamedetails);
                    $detailsImages[] = $imageNamedetails;
                }
            }

            $news = new News([
                'Author' => $request->input('Author'),
                'title' => $request->input('title'),
                'cover_image' => $imageNamecover,
                'details' => $request->input('details'),
                'details_image' => json_encode($detailsImages),
                'tag' => $request->input('tag'),
                'link' => $request->input('link'),
                'star' => 0,
                'status' => 1,
                'type_new' => $request->input('type_new'),
                'med_new' => $request->input('med_new'),
                'prov_new' => $request->input('prov_new'),
                'key_new' => $request->input('key_new'),
            ]);

            $news->save();

            return response()->json(['message' => 'Data saved successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
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
        if (!$News) {
            return response()->json(['error' => 'News not found'], 404);
        }
        $News->cover_image = asset('cover_image/' . $News->cover_image);
        return response()->json($News);
    }

    public function update(Request $request, $id)
    {
        try {
            $news = News::find($id);

            if (!$news) {
                return response()->json(['error' => 'News not found'], 404);
            }

            if ($request->hasFile('cover_image')) {
                $uploadedImagecover = $request->file('cover_image');
                $imageNamecover = time() . '.' . $uploadedImagecover->getClientOriginalExtension();
                $uploadedImagecover->move('cover_image/', $imageNamecover);
                $news->cover_image = $imageNamecover;
            }

            $detailsImages = [];

            if ($request->hasFile('details_image')) {
                foreach ($request->file('details_image') as $uploadedImagedetails) {
                    $imageNamedetails = time() . '_' . uniqid() . '.' . $uploadedImagedetails->getClientOriginalExtension();
                    $uploadedImagedetails->move('cover_image/', $imageNamedetails);
                    $detailsImages[] = $imageNamedetails;
                }
                $news->details_image = json_encode($detailsImages);
            }

            $news->title = $request->input('title');
            $news->details = $request->input('details');
            $news->tag = $request->input('tag');
            $news->link = $request->input('link');
            $news->type_new = $request->input('type_new');
            $news->med_new = $request->input('med_new');
            $news->prov_new = $request->input('prov_new');
            $news->save();

            return response()->json(['message' => 'Data updated successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
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

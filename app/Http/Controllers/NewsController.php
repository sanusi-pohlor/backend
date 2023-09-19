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
        $News = new News([
            'title' => $request['title'],
            'description' => $request['description'],
            'image' => $request['image'],
        ]);
        $News->save();
        return response()->json(['message' => 'Data received and processed'], 200);
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
        return view('News.show', ['News' => $News]);
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

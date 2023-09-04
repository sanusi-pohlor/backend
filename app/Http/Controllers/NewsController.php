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
        // Retrieve data from your database
        $data = News::select('title', 'description', 'image')->get();

        return response()->json($data, 200);
    }
    public function upload(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validatedData['image'] = $imagePath;
        }

        $news = new News([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'],
        ]);
        $news->save();

        // Dispatch the event to generate the formatted ID
        // event(new NewsCreated($news));

        return response()->json(['message' => 'Data received and processed'], 200);
    }
    /**
     * Display a listing of the resource.
     */


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        //
    }
}

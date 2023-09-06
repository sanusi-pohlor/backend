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
        return view('news.index', ['news' => $news]);
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        // Validate and store a new news record
        // ...

        return redirect()->route('news.index')->with('success', 'News created successfully');
    }

    public function show($id)
    {
        $news = News::find($id);
        return view('news.show', ['news' => $news]);
    }

    public function edit($id)
    {
        $news = News::find($id);
        return view('news.edit', ['news' => $news]);
    }

    public function update(Request $request, $id)
    {
        // Validate and update the news record
        // ...

        return redirect()->route('news.show', $id)->with('success', 'News updated successfully');
    }

    public function destroy($id)
    {
        $news = News::find($id);
        $news->delete();

        return redirect()->route('news.index')->with('success', 'News deleted successfully');
    }
}

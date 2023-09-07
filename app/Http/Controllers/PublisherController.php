<?php

namespace App\Http\Controllers;

use App\Models\Publisher; // Update the model class name to singular 'User'
use Illuminate\Http\Request;

class PublisherController extends Controller // Update the controller class name to 'UsersController'
{
    public function index()
    {
        $Publisher = Publisher::all(); // Use the correct model name 'User'
        return view('Publisher.index', ['Publisher' => $Publisher]); // Update the view name to 'users.index'
    }

    public function upload(Request $request)
    {
        $Publisher = new Publisher([
            'pub_name' => $request['pub_name'],
        ]);
        $Publisher->save();
        return response()->json(['message' => 'Data received and processed'], 200);
    }

    public function create()
    {
        return view('Publisher.create');
    }

    public function store(Request $request)
    {
        // Validate and store a new user record
        // Use the 'User' model to create a new user
        // ...

        return redirect()->route('Publisher.index')->with('success', 'Publisher created successfully'); // Update the route name to 'users.index'
    }

    public function show($id)
    {
        $Publisher = Publisher::find($id); // Use the correct model name 'User'
        return view('Publisher.show', ['Publisher' => $Publisher]); // Update the view name to 'users.show'
    }

    public function edit($id)
    {
        $Publisher = Publisher::find($id); // Use the correct model name 'User'
        return view('Publisher.edit', ['Publisher' => $Publisher]); // Update the view name to 'users.edit'
    }

    public function update(Request $request, $id)
    {
        // Validate and update the user record
        // Use the 'User' model to update the user
        // ...

        return redirect()->route('Publisher.show', $id)->with('success', 'Publisher updated successfully'); // Update the route name to 'users.show'
    }

    public function destroy($id)
    {
        $Publisher = Publisher::find($id); // Use the correct model name 'User'
        $Publisher->delete(); // Use the 'delete' method to delete the user

        return redirect()->route('Publisher.index')->with('success', 'Publisher deleted successfully'); // Update the route name to 'users.index'
    }
}

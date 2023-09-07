<?php

namespace App\Http\Controllers;

use App\Models\MediaChannels; // Update the model class name to singular 'User'
use Illuminate\Http\Request;

class MediaChannelsController extends Controller // Update the controller class name to 'UsersController'
{
    public function index()
    {
        $MediaChannels = MediaChannels::all(); // Use the correct model name 'User'
        return view('MediaChannels.index', ['MediaChannels' => $MediaChannels]); // Update the view name to 'users.index'
    }

    public function upload(Request $request)
    {
        $MediaChannels = new MediaChannels([
            'med_c_name' => $request['med_c_name'],
        ]);
        $MediaChannels->save();
        return response()->json(['message' => 'Data received and processed'], 200);
    }

    public function create()
    {
        return view('MediaChannels.create');
    }

    public function store(Request $request)
    {
        // Validate and store a new user record
        // Use the 'User' model to create a new user
        // ...

        return redirect()->route('MediaChannels.index')->with('success', 'MediaChannels created successfully'); // Update the route name to 'users.index'
    }

    public function show($id)
    {
        $MediaChannels = MediaChannels::find($id); // Use the correct model name 'User'
        return view('MediaChannels.show', ['MediaChannels' => $MediaChannels]); // Update the view name to 'users.show'
    }

    public function edit($id)
    {
        $MediaChannels = MediaChannels::find($id); // Use the correct model name 'User'
        return view('MediaChannels.edit', ['MediaChannels' => $MediaChannels]); // Update the view name to 'users.edit'
    }

    public function update(Request $request, $id)
    {
        // Validate and update the user record
        // Use the 'User' model to update the user
        // ...

        return redirect()->route('MediaChannels.show', $id)->with('success', 'MediaChannels updated successfully'); // Update the route name to 'users.show'
    }

    public function destroy($id)
    {
        $MediaChannels = MediaChannels::find($id); // Use the correct model name 'User'
        $MediaChannels->delete(); // Use the 'delete' method to delete the user

        return redirect()->route('MediaChannels.index')->with('success', 'MediaChannels deleted successfully'); // Update the route name to 'users.index'
    }
}

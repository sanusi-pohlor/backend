<?php

namespace App\Http\Controllers;

use App\Models\Subpoint; // Update the model class name to singular 'User'
use Illuminate\Http\Request;

class SubpointController extends Controller // Update the controller class name to 'UsersController'
{
    public function index()
    {
        $Subpoint = Subpoint::all(); // Use the correct model name 'User'
        return view('Subpoint.index', ['Subpoint' => $Subpoint]); // Update the view name to 'users.index'
    }

    public function upload(Request $request)
    {
        $Subpoint = new Subpoint([
            'subp_type_id' => $request['subp_type_id'],
            'subp_name' => $request['subp_name'],
        ]);
        $Subpoint->save();
        return response()->json(['message' => 'Data received and processed'], 200);
    }

    public function create()
    {
        return view('Subpoint.create');
    }

    public function store(Request $request)
    {
        // Validate and store a new user record
        // Use the 'User' model to create a new user
        // ...

        return redirect()->route('Subpoint.index')->with('success', 'Subpoint created successfully'); // Update the route name to 'users.index'
    }

    public function show($id)
    {
        $Subpoint = Subpoint::find($id); // Use the correct model name 'User'
        return view('Subpoint.show', ['Subpoint' => $Subpoint]); // Update the view name to 'users.show'
    }

    public function edit($id)
    {
        $Subpoint = Subpoint::find($id); // Use the correct model name 'User'
        return view('Subpoint.edit', ['Subpoint' => $Subpoint]); // Update the view name to 'users.edit'
    }

    public function update(Request $request, $id)
    {
        // Validate and update the user record
        // Use the 'User' model to update the user
        // ...

        return redirect()->route('Subpoint.show', $id)->with('success', 'Subpoint updated successfully'); // Update the route name to 'users.show'
    }

    public function destroy($id)
    {
        $Subpoint = Subpoint::find($id); // Use the correct model name 'User'
        $Subpoint->delete(); // Use the 'delete' method to delete the user

        return redirect()->route('Subpoint.index')->with('success', 'Subpoint deleted successfully'); // Update the route name to 'users.index'
    }
}

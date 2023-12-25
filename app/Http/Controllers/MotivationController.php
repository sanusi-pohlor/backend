<?php

namespace App\Http\Controllers;

use App\Models\Motivation; // Update the model class name to singular 'User'
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MotivationController extends Controller // Update the controller class name to 'UsersController'
{
    public function index()
    {
        $Motivation = Motivation::all(); // Use the correct model name 'User'
        return response()->json($Motivation);
    }

    public function upload(Request $request)
    {
        $Motivation = new Motivation([
            'moti_name' => $request['moti_name'],
        ]);
        $Motivation->save();
        return response()->json(['message' => 'Data received and processed'], 200);
    }

    public function create()
    {
        return view('Motivation.create');
    }

    public function store(Request $request)
    {
        // Validate and store a new user record
        // Use the 'User' model to create a new user
        // ...

        return redirect()->route('Motivation.index')->with('success', 'Motivation created successfully'); // Update the route name to 'users.index'
    }

    public function show($id)
    {
        $Motivation = Motivation::find($id); // Use the correct model name 'User'
        return view('Motivation.show', ['user' => $Motivation]); // Update the view name to 'users.show'
    }

    public function edit($id)
    {
        $Motivation = Motivation::find($id); // Use the correct model name 'User'
        return view('Motivation.edit', ['Motivation' => $Motivation]); // Update the view name to 'users.edit'
    }

    public function update(Request $request, $id)
    {
        // Validate and update the user record
        // Use the 'User' model to update the user
        // ...

        return redirect()->route('Motivation.show', $id)->with('success', 'Motivation updated successfully'); // Update the route name to 'users.show'
    }

    public function destroy($id)
    {
        $Motivation = Motivation::find($id); // Use the correct model name 'User'
        $Motivation->delete(); // Use the 'delete' method to delete the user

        return redirect()->route('Motivation.index')->with('success', 'Motivation deleted successfully'); // Update the route name to 'users.index'
    }
}

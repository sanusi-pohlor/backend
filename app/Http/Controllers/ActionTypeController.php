<?php

namespace App\Http\Controllers;

use App\Models\ActionType; // Update the model class name to singular 'User'
use Illuminate\Http\Request;

class ActionTypeController extends Controller // Update the controller class name to 'UsersController'
{
    public function index()
    {
        $ActionType = ActionType::all(); // Use the correct model name 'User'
        return view('ActionType.index', ['ActionType' => $ActionType]); // Update the view name to 'users.index'
    }

    public function upload(Request $request)
    {
        $ActionType = new ActionType([
            'act_ty_name' => $request['act_ty_name'],
        ]);
        $ActionType->save();
        return response()->json(['message' => 'Data received and processed'], 200);
    }


    public function create()
    {
        return view('ActionType.create');
    }

    public function store(Request $request)
    {
        // Validate and store a new user record
        // Use the 'User' model to create a new user
        // ...

        return redirect()->route('ActionType.index')->with('success', 'ActionType created successfully'); // Update the route name to 'users.index'
    }

    public function show($id)
    {
        $ActionType = ActionType::find($id); // Use the correct model name 'User'
        return view('ActionType.show', ['ActionType' => $ActionType]); // Update the view name to 'users.show'
    }

    public function edit($id)
    {
        $ActionType = ActionType::find($id); // Use the correct model name 'User'
        return view('ActionType.edit', ['ActionType' => $ActionType]); // Update the view name to 'users.edit'
    }

    public function update(Request $request, $id)
    {
        // Validate and update the user record
        // Use the 'User' model to update the user
        // ...

        return redirect()->route('ActionType.show', $id)->with('success', 'ActionType updated successfully'); // Update the route name to 'users.show'
    }

    public function destroy($id)
    {
        $ActionType = ActionType::find($id); // Use the correct model name 'User'
        $ActionType->delete(); // Use the 'delete' method to delete the user

        return redirect()->route('ActionType.index')->with('success', 'ActionType deleted successfully'); // Update the route name to 'users.index'
    }
}

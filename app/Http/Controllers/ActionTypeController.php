<?php

namespace App\Http\Controllers;

use App\Models\ActionType; // Update the model class name to singular 'User'
use Illuminate\Http\Request;

class ActionTypeController extends Controller // Update the controller class name to 'UsersController'
{
    public function index()
    {
        $users = ActionType::all(); // Use the correct model name 'User'
        return view('users.index', ['users' => $users]); // Update the view name to 'users.index'
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        // Validate and store a new user record
        // Use the 'User' model to create a new user
        // ...

        return redirect()->route('users.index')->with('success', 'User created successfully'); // Update the route name to 'users.index'
    }

    public function show($id)
    {
        $user = ActionType::find($id); // Use the correct model name 'User'
        return view('users.show', ['user' => $user]); // Update the view name to 'users.show'
    }

    public function edit($id)
    {
        $user = ActionType::find($id); // Use the correct model name 'User'
        return view('users.edit', ['user' => $user]); // Update the view name to 'users.edit'
    }

    public function update(Request $request, $id)
    {
        // Validate and update the user record
        // Use the 'User' model to update the user
        // ...

        return redirect()->route('users.show', $id)->with('success', 'User updated successfully'); // Update the route name to 'users.show'
    }

    public function destroy($id)
    {
        $user = ActionType::find($id); // Use the correct model name 'User'
        $user->delete(); // Use the 'delete' method to delete the user

        return redirect()->route('users.index')->with('success', 'User deleted successfully'); // Update the route name to 'users.index'
    }
}

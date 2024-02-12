<?php

namespace App\Http\Controllers;

use App\Models\User; // Update the model class name to singular 'User'
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller // Update the controller class name to 'UsersController'
{
    public function index()
    {
        $users = User::all(); // Use the correct model name 'User'
        return response()->json($users);    // Update the view name to 'users.index'
    }

    public function upload(Request $request)
    {
        $users = new User([
            'username' => $request['username'],
            'lastName' => $request['lastName'],
            'email' => $request['email'],
            'password' => $request['password'],
            'phone_number' => $request['phone_number'],
            'Id_line' => $request['Id_line'],
            'province' => $request['province'],
            'receive_ct_email' => $request['receive_ct_email'],
        ]);
        $users->save();
        return response()->json(['message' => 'Data received and processed'], 200);
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
        $user = User::find($id); // Use the correct model name 'User'
        return response()->json($user);
         // Update the view name to 'users.show'
    }

    public function edit($id)
    {
        $user = User::find($id); // Use the correct model name 'User'
        return response()->json($user); // Update the view name to 'users.edit'
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
        $user = User::find($id); // Use the correct model name 'User'
        $user->delete(); // Use the 'delete' method to delete the user

        return redirect()->route('users.index')->with('success', 'User deleted successfully'); // Update the route name to 'users.index'
    }
    
}

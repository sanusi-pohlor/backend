<?php

namespace App\Http\Controllers;

use App\Models\ProblemManagement; // Update the model class name to singular 'User'
use Illuminate\Http\Request;

class ProblemManagementController extends Controller // Update the controller class name to 'UsersController'
{
    public function index()
    {
        $ProblemManagement = ProblemManagement::all(); // Use the correct model name 'User'
        return response()->json($ProblemManagement);    
        }

    public function upload(Request $request)
    {
        $ProblemManagement = new ProblemManagement([
            'prob_m_way' => $request['prob_m_way'],
        ]);
        $ProblemManagement->save();
        return response()->json(['message' => 'Data received and processed'], 200);
    }


    public function create()
    {
        return view('ProblemManagement.create');
    }

    public function store(Request $request)
    {
        // Validate and store a new user record
        // Use the 'User' model to create a new user
        // ...

        return redirect()->route('ProblemManagement.index')->with('success', 'ProblemManagement created successfully'); // Update the route name to 'users.index'
    }

    public function show($id)
    {
        $ProblemManagement = ProblemManagement::find($id); // Use the correct model name 'User'
        return view('ProblemManagement.show', ['ProblemManagement' => $ProblemManagement]); // Update the view name to 'users.show'
    }

    public function edit($id)
    {
        $ProblemManagement = ProblemManagement::find($id); // Use the correct model name 'User'
        return view('ProblemManagement.edit', ['ProblemManagement' => $ProblemManagement]); // Update the view name to 'users.edit'
    }

    public function update(Request $request, $id)
    {
        // Validate and update the user record
        // Use the 'User' model to update the user
        // ...

        return redirect()->route('ProblemManagement.show', $id)->with('success', 'ProblemManagement updated successfully'); // Update the route name to 'users.show'
    }

    public function destroy($id)
    {
        $ProblemManagement = ProblemManagement::find($id); // Use the correct model name 'User'
        $ProblemManagement->delete(); // Use the 'delete' method to delete the user

        return redirect()->route('ProblemManagement.index')->with('success', 'ProblemManagement deleted successfully'); // Update the route name to 'users.index'
    }
}

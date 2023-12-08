<?php

namespace App\Http\Controllers;

use App\Models\CheckingData; // Update the model class name to singular 'User'
use Illuminate\Http\Request;

class CheckingDataController extends Controller // Update the controller class name to 'UsersController'
{
    public function index()
    {
        $CheckingData = CheckingData::all(); // Use the correct model name 'User'
        return response()->json($CheckingData);   
        }

    public function upload(Request $request)
    {
        $CheckingData = new CheckingData([
            'che_d_format' => $request['che_d_format'],
        ]);
        $CheckingData->save();
        return response()->json(['message' => 'Data received and processed'], 200);
    }


    public function create()
    {
        return view('CheckingData.create');
    }

    public function store(Request $request)
    {
        // Validate and store a new user record
        // Use the 'User' model to create a new user
        // ...

        return redirect()->route('CheckingData.index')->with('success', 'CheckingData created successfully'); // Update the route name to 'users.index'
    }

    public function show($id)
    {
        $CheckingData = CheckingData::find($id); // Use the correct model name 'User'
        return view('CheckingData.show', ['CheckingData' => $CheckingData]); // Update the view name to 'users.show'
    }

    public function edit($id)
    {
        $CheckingData = CheckingData::find($id); // Use the correct model name 'User'
        return view('CheckingData.edit', ['CheckingData' => $CheckingData]); // Update the view name to 'users.edit'
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'che_d_format' => 'required',
        ]);
    
        $CheckingData = CheckingData::find($id);
        $CheckingData->che_d_format = $validatedData['che_d_format'];
        $CheckingData->save();
    
        return redirect()->route('che_d_format.show', $id)->with('success', 'CheckingData updated successfully');
    }
    public function delete($id)
    {
        // Find the article by ID
        $CheckingData = CheckingData::find($id);

        if (!$CheckingData) {
            return response()->json(['error' => 'Article not found'], 404);
        }

        // Delete the article
        $CheckingData->delete();

        return response()->json(['message' => 'Article deleted successfully']);
    }
    public function destroy($id)
    {
        $CheckingData = CheckingData::find($id); // Use the correct model name 'User'
        $CheckingData->delete(); // Use the 'delete' method to delete the user

        return redirect()->route('CheckingData.index')->with('success', 'CheckingData deleted successfully'); // Update the route name to 'users.index'
    }
}

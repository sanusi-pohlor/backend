<?php

namespace App\Http\Controllers;

use App\Models\DataCharacteristics; // Update the model class name to singular 'User'
use Illuminate\Http\Request;

class DataCharacteristicsController extends Controller // Update the controller class name to 'UsersController'
{
    public function index()
    {
        $DataCharacteristics = DataCharacteristics::all(); // Use the correct model name 'User'
        return response()->json($DataCharacteristics);    
    }

    public function upload(Request $request)
    {
        $DataCharacteristics = new DataCharacteristics([
            'data_cha_name' => $request['data_cha_name'],
        ]);
        $DataCharacteristics->save();
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

        return redirect()->route('DataCharacteristics.index')->with('success', 'DataCharacteristics created successfully'); // Update the route name to 'users.index'
    }

    public function show($id)
    {
        $DataCharacteristics = DataCharacteristics::find($id); // Use the correct model name 'User'
        return view('DataCharacteristics.show', ['DataCharacteristics' => $DataCharacteristics]); // Update the view name to 'users.show'
    }

    public function edit($id)
    {
        $DataCharacteristics = DataCharacteristics::find($id); // Use the correct model name 'User'
        return view('DataCharacteristics.edit', ['DataCharacteristics' => $DataCharacteristics]); // Update the view name to 'users.edit'
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'data_cha_name' => 'required',
        ]);

        $DataCharacteristics = DataCharacteristics::find($id);
        $DataCharacteristics->data_cha_name = $validatedData['data_cha_name'];
        $DataCharacteristics->save();

        return redirect()->route('DataCharacteristics.show', $id)->with('success', 'DataCharacteristics updated successfully');
    }

    public function destroy($id)
    {
        $DataCharacteristics = DataCharacteristics::find($id); // Use the correct model name 'User'
        $DataCharacteristics->delete(); // Use the 'delete' method to delete the user

        return redirect()->route('DataCharacteristics.index')->with('success', 'DataCharacteristics deleted successfully'); // Update the route name to 'users.index'
    }
}

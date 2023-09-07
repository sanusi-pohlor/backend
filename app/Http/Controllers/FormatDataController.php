<?php

namespace App\Http\Controllers;

use App\Models\FormatData; // Update the model class name to singular 'User'
use Illuminate\Http\Request;

class FormatDataController extends Controller // Update the controller class name to 'UsersController'
{
    public function index()
    {
        $FormatData = FormatData::all(); // Use the correct model name 'User'
        return view('FormatData.index', ['FormatData' => $FormatData]); // Update the view name to 'users.index'
    }

    public function upload(Request $request)
    {
        $FormatData = new FormatData([
            'fm_d_name' => $request['fm_d_name'],
        ]);
        $FormatData->save();
        return response()->json(['message' => 'Data received and processed'], 200);
    }

    public function create()
    {
        return view('FormatData.create');
    }

    public function store(Request $request)
    {
        // Validate and store a new user record
        // Use the 'User' model to create a new user
        // ...

        return redirect()->route('FormatData.index')->with('success', 'FormatData created successfully'); // Update the route name to 'users.index'
    }

    public function show($id)
    {
        $FormatData = FormatData::find($id); // Use the correct model name 'User'
        return view('FormatData.show', ['FormatData' => $FormatData]); // Update the view name to 'users.show'
    }

    public function edit($id)
    {
        $FormatData = FormatData::find($id); // Use the correct model name 'User'
        return view('FormatData.edit', ['FormatData' => $FormatData]); // Update the view name to 'users.edit'
    }

    public function update(Request $request, $id)
    {
        // Validate and update the user record
        // Use the 'User' model to update the user
        // ...

        return redirect()->route('FormatData.show', $id)->with('success', 'FormatData updated successfully'); // Update the route name to 'users.show'
    }

    public function destroy($id)
    {
        $FormatData = FormatData::find($id); // Use the correct model name 'User'
        $FormatData->delete(); // Use the 'delete' method to delete the user

        return redirect()->route('FormatData.index')->with('success', 'FormatData deleted successfully'); // Update the route name to 'users.index'
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\TypeInformation; // Update the model class name to singular 'User'
use Illuminate\Http\Request;

class TypeInformationController extends Controller // Update the controller class name to 'UsersController'
{
    public function index()
    {
        $TypeInformation = TypeInformation::all(); // Use the correct model name 'User'
        return view('TypeInformation.index', ['TypeInformation' => $TypeInformation]); // Update the view name to 'users.index'
    }

    public function upload(Request $request)
    {
        $TypeInformation = new TypeInformation([
            'type_info_name' => $request['type_info_name'],
        ]);
        $TypeInformation->save();
        return response()->json(['message' => 'Data received and processed'], 200);
    }

    public function create()
    {
        return view('TypeInformation.create');
    }

    public function store(Request $request)
    {
        // Validate and store a new user record
        // Use the 'User' model to create a new user
        // ...

        return redirect()->route('TypeInformation.index')->with('success', 'TypeInformation created successfully'); // Update the route name to 'users.index'
    }

    public function show($id)
    {
        $TypeInformation = TypeInformation::find($id); // Use the correct model name 'User'
        return view('TypeInformation.show', ['TypeInformation' => $TypeInformation]); // Update the view name to 'users.show'
    }

    public function edit($id)
    {
        $TypeInformation = TypeInformation::find($id); // Use the correct model name 'User'
        return view('TypeInformation.edit', ['TypeInformation' => $TypeInformation]); // Update the view name to 'users.edit'
    }

    public function update(Request $request, $id)
    {
        // Validate and update the user record
        // Use the 'User' model to update the user
        // ...

        return redirect()->route('TypeInformation.show', $id)->with('success', 'TypeInformation updated successfully'); // Update the route name to 'users.show'
    }

    public function destroy($id)
    {
        $TypeInformation = TypeInformation::find($id); // Use the correct model name 'User'
        $TypeInformation->delete(); // Use the 'delete' method to delete the user

        return redirect()->route('TypeInformation.index')->with('success', 'TypeInformation deleted successfully'); // Update the route name to 'users.index'
    }
}

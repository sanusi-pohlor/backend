<?php

namespace App\Http\Controllers;

use App\Models\InspectionDetails; // Update the model class name to singular 'User'
use Illuminate\Http\Request;

class InspectionDetailsController extends Controller // Update the controller class name to 'UsersController'
{
    public function index()
    {
        $InspectionDetails = InspectionDetails::all(); // Use the correct model name 'User'
        return response()->json($InspectionDetails);       
     }

    public function upload(Request $request)
    {
        $InspectionDetails = new InspectionDetails([
            'ins_dt_che_id' => $request['ins_dt_che_id'],
            'ins_dt_info_id' => $request['ins_dt_info_id'],
            'ins_dt_date' => $request['ins_dt_date'],
            'ins_dt_more' => $request['ins_dt_more'],
        ]);
        $InspectionDetails->save();
        return response()->json(['message' => 'Data received and processed'], 200);
    }

    public function create()
    {
        return view('InspectionDetails.create');
    }

    public function store(Request $request)
    {
        // Validate and store a new user record
        // Use the 'User' model to create a new user
        // ...

        return redirect()->route('InspectionDetails.index')->with('success', 'InspectionDetails created successfully'); // Update the route name to 'users.index'
    }

    public function show($id)
    {
        $InspectionDetails = InspectionDetails::find($id); // Use the correct model name 'User'
        return view('InspectionDetails.show', ['InspectionDetails' => $InspectionDetails]); // Update the view name to 'users.show'
    }

    public function edit($id)
    {
        $InspectionDetails = InspectionDetails::find($id); // Use the correct model name 'User'
        return view('InspectionDetails.edit', ['InspectionDetails' => $InspectionDetails]); // Update the view name to 'users.edit'
    }

    public function update(Request $request, $id)
    {
        // Validate and update the user record
        // Use the 'User' model to update the user
        // ...

        return redirect()->route('InspectionDetails.show', $id)->with('success', 'InspectionDetails updated successfully'); // Update the route name to 'users.show'
    }

    public function destroy($id)
    {
        $InspectionDetails = InspectionDetails::find($id); // Use the correct model name 'User'
        $InspectionDetails->delete(); // Use the 'delete' method to delete the user

        return redirect()->route('InspectionDetails.index')->with('success', 'InspectionDetails deleted successfully'); // Update the route name to 'users.index'
    }
}

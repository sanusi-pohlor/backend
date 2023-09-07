<?php

namespace App\Http\Controllers;

use App\Models\Information; // Update the model class name to singular 'User'
use Illuminate\Http\Request;

class InformationController extends Controller // Update the controller class name to 'UsersController'
{
    public function index()
    {
        $Information = Information::all(); // Use the correct model name 'User'
        return view('Information.index', ['Information' => $Information]); // Update the view name to 'users.index'
    }

    public function upload(Request $request)
    {
        $Information = new Information([
            'info_subp_id' => $request['info_subp_id'],
            'info_vol_mem_id' => $request['info_vol_mem_id'],
            'info_moti_id' => $request['info_moti_id'],
            'info_act_id' => $request['info_act_id'],
            'info_d_c_id' => $request['info_d_c_id'],
            'info_det_cont' => $request['info_det_cont'],
            'info_num_rep' => $request['info_num_rep'],
            'info_date' => $request['info_date'],
            'info_status' => $request['info_status'],
            'info_cont_topic' => $request['info_cont_topic'],
        ]);
        $Information->save();
        return response()->json(['message' => 'Data received and processed'], 200);
    }

    public function create()
    {
        return view('Information.create');
    }

    public function store(Request $request)
    {
        // Validate and store a new user record
        // Use the 'User' model to create a new user
        // ...

        return redirect()->route('Information.index')->with('success', 'Information created successfully'); // Update the route name to 'users.index'
    }

    public function show($id)
    {
        $Information = Information::find($id); // Use the correct model name 'User'
        return view('Information.show', ['Information' => $Information]); // Update the view name to 'users.show'
    }

    public function edit($id)
    {
        $Information = Information::find($id); // Use the correct model name 'User'
        return view('Information.edit', ['Information' => $Information]); // Update the view name to 'users.edit'
    }

    public function update(Request $request, $id)
    {
        // Validate and update the user record
        // Use the 'User' model to update the user
        // ...

        return redirect()->route('Information.show', $id)->with('success', 'Information updated successfully'); // Update the route name to 'users.show'
    }

    public function destroy($id)
    {
        $Information = Information::find($id); // Use the correct model name 'User'
        $Information->delete(); // Use the 'delete' method to delete the user

        return redirect()->route('Information.index')->with('success', 'Information deleted successfully'); // Update the route name to 'users.index'
    }
}

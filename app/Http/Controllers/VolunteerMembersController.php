<?php

namespace App\Http\Controllers;

use App\Models\VolunteeMembers; // Update the model class name to singular 'User'
use Illuminate\Http\Request;

class VolunteeMembersController extends Controller // Update the controller class name to 'UsersController'
{
    public function index()
    {
        $VolunteeMembers = VolunteeMembers::all(); // Use the correct model name 'User'
        return response()->json($VolunteeMembers);     }

    public function upload(Request $request)
    {
        $VolunteeMembers = new VolunteeMembers([
            'vol_mem_fname' => $request['vol_mem_fname'],
            'vol_mem_lname' => $request['vol_mem_lname'],
            'vol_mem_address' => $request['vol_mem_address'],
            'vol_mem_province' => $request['vol_mem_province'],
            'vol_mem_ph_num' => $request['vol_mem_ph_num'],
            'vol_mem_email' => $request['vol_mem_email'],
            'vol_mem_get_news' => $request['vol_mem_get_news'],
        ]);
        $VolunteeMembers->save();
        return response()->json(['message' => 'Data received and processed'], 200);
    }

    public function create()
    {
        return view('VolunteeMembers.create');
    }

    public function store(Request $request)
    {
        // Validate and store a new user record
        // Use the 'User' model to create a new user
        // ...

        return redirect()->route('VolunteeMembers.index')->with('success', 'VolunteeMembers created successfully'); // Update the route name to 'users.index'
    }

    public function show($id)
    {
        $VolunteeMembers = VolunteeMembers::find($id); // Use the correct model name 'User'
        return view('VolunteeMembers.show', ['VolunteeMembers' => $VolunteeMembers]); // Update the view name to 'users.show'
    }

    public function edit($id)
    {
        $VolunteeMembers = VolunteeMembers::find($id); // Use the correct model name 'User'
        return view('VolunteeMembers.edit', ['VolunteeMembers' => $VolunteeMembers]); // Update the view name to 'users.edit'
    }

    public function update(Request $request, $id)
    {
        // Validate and update the user record
        // Use the 'User' model to update the user
        // ...

        return redirect()->route('VolunteeMembers.show', $id)->with('success', 'VolunteeMembers updated successfully'); // Update the route name to 'users.show'
    }

    public function destroy($id)
    {
        $VolunteeMembers = VolunteeMembers::find($id); // Use the correct model name 'User'
        $VolunteeMembers->delete(); // Use the 'delete' method to delete the user

        return redirect()->route('VolunteeMembers.index')->with('success', 'VolunteeMembers deleted successfully'); // Update the route name to 'users.index'
    }
}

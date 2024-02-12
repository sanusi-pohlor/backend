<?php

namespace App\Http\Controllers;

use App\Models\VolunteerMembers; // Update the model class name to singular 'User'
use Illuminate\Http\Request;

class VolunteerMembersController extends Controller // Update the controller class name to 'UsersController'
{
    public function index()
    {
        $VolunteerMembers = VolunteerMembers::all(); // Use the correct model name 'User'
        return response()->json($VolunteerMembers);
    }

    public function upload(Request $request)
    {
        $VolunteerMembers = new VolunteerMembers([
            'vol_mem_fname' => $request['vol_mem_fname'],
            'vol_mem_lname' => $request['vol_mem_lname'],
            'vol_mem_address' => $request['vol_mem_address'],
            'vol_mem_province' => $request['vol_mem_province'],
            'vol_mem_ph_num' => $request['vol_mem_ph_num'],
            'vol_mem_email' => $request['vol_mem_email'],
            'vol_mem_get_news' => $request['vol_mem_get_news'],
        ]);
        $VolunteerMembers->save();
        return response()->json(['message' => 'Data received and processed'], 200);
    }

    public function create()
    {
        return view('VolunteerMembers.create');
    }

    public function store(Request $request)
    {
        // Validate and store a new user record
        // Use the 'User' model to create a new user
        // ...

        return redirect()->route('VolunteerMembers.index')->with('success', 'VolunteerMembers created successfully'); // Update the route name to 'users.index'
    }

    public function show($id)
    {
        $VolunteerMembers = VolunteerMembers::find($id); // Use the correct model name 'User'
        return view('VolunteerMembers.show', ['VolunteerMembers' => $VolunteerMembers]); // Update the view name to 'users.show'
    }

    public function edit($id)
    {
        $VolunteerMembers = VolunteerMembers::find($id); // Use the correct model name 'User'
        return view('VolunteerMembers.edit', ['VolunteerMembers' => $VolunteerMembers]); // Update the view name to 'users.edit'
    }

    public function update(Request $request, $id)
    {
        // Validate and update the user record
        // Use the 'User' model to update the user
        // ...

        return redirect()->route('VolunteerMembers.show', $id)->with('success', 'VolunteerMembers updated successfully'); // Update the route name to 'users.show'
    }

    public function destroy($id)
    {
        $VolunteerMembers = VolunteerMembers::find($id); // Use the correct model name 'User'
        $VolunteerMembers->delete(); // Use the 'delete' method to delete the user

        return redirect()->route('VolunteerMembers.index')->with('success', 'VolunteerMembers deleted successfully'); // Update the route name to 'users.index'
    }
}

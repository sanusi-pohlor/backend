<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ActionType;

class ActionTypeControllerr extends Controller
{
    public function index()
{
    $actionTypes = ActionType::all();
    return response()->json($actionTypes);    
}

// Show the form for adding data
public function create()
{
    return view('action_types.create');
}

// Store data in the database
public function store(Request $request)
{
    $validatedData = $request->validate([
        'act_ty_name' => 'required',
    ]);

    ActionType::create($validatedData);

    return redirect('/action-types')->with('success', 'Action Type added successfully');
}
}

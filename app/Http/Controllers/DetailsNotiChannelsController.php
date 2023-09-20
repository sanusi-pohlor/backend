<?php

namespace App\Http\Controllers;

use App\Models\DetailsNotiChannels; // Update the model class name to singular 'User'
use Illuminate\Http\Request;

class DetailsNotiChannelsController extends Controller // Update the controller class name to 'UsersController'
{
    public function index()
    {
        $DetailsNotiChannels = DetailsNotiChannels::all(); // Use the correct model name 'User'
        return response()->json($DetailsNotiChannels);    
        }

    public function upload(Request $request)
    {
        $DetailsNotiChannels = new DetailsNotiChannels([
            'dnc_med_id' => $request['dnc_med_id'],
            'dnc_info_id' => $request['dnc_info_id'],
            'dnc_pub_id' => $request['dnc_pub_id'],
            'dnc_fm_d_id' => $request['dnc_fm_d_id'],
            'dnc_prob_id' => $request['dnc_prob_id'],
            'dnc_scop_pub' => $request['dnc_scop_pub'],
            'dnc_num_mem_med' => $request['dnc_num_mem_med'],
            'dnc_date_med' => $request['dnc_date_med'],
            'dnc_capt' => $request['dnc_capt'],
            'dnc_link' => $request['dnc_link'],
        ]);
        $DetailsNotiChannels->save();
        return response()->json(['message' => 'Data received and processed'], 200);
    }

    public function create()
    {
        return view('DetailsNotiChannels.create');
    }

    public function store(Request $request)
    {
        // Validate and store a new user record
        // Use the 'User' model to create a new user
        // ...

        return redirect()->route('DetailsNotiChannels.index')->with('success', 'DetailsNotiChannels created successfully'); // Update the route name to 'users.index'
    }

    public function show($id)
    {
        $DetailsNotiChannels = DetailsNotiChannels::find($id); // Use the correct model name 'User'
        return view('DetailsNotiChannels.show', ['DetailsNotiChannels' => $DetailsNotiChannels]); // Update the view name to 'users.show'
    }

    public function edit($id)
    {
        $DetailsNotiChannels = DetailsNotiChannels::find($id); // Use the correct model name 'User'
        return view('DetailsNotiChannels.edit', ['DetailsNotiChannels' => $DetailsNotiChannels]); // Update the view name to 'users.edit'
    }

    public function update(Request $request, $id)
    {
        // Validate and update the user record
        // Use the 'User' model to update the user
        // ...

        return redirect()->route('DetailsNotiChannels.show', $id)->with('success', 'DetailsNotiChannels updated successfully'); // Update the route name to 'users.show'
    }

    public function destroy($id)
    {
        $DetailsNotiChannels = DetailsNotiChannels::find($id); // Use the correct model name 'User'
        $DetailsNotiChannels->delete(); // Use the 'delete' method to delete the user

        return redirect()->route('DetailsNotiChannels.index')->with('success', 'DetailsNotiChannels deleted successfully'); // Update the route name to 'users.index'
    }
}

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
        $validatedData = $request->validate([
            'dnc_med_id' => 'required',
            'dnc_info_id' => 'required',
            'dnc_pub_id' => 'required',
            'dnc_fm_d_id' => 'required',
            'dnc_prob_id' => 'required',
            'dnc_scop_pub' => 'required',
            'dnc_num_mem_med' => 'required',
            'dnc_date_med' => 'required',
            'dnc_capt' => 'required',
            'dnc_link' => 'required',
        ]);

        $DetailsNotiChannels = new ActionType();
        $DetailsNotiChannels->dnc_med_id = $validatedData['dnc_med_id'];
        $DetailsNotiChannels->dnc_info_id = $validatedData['dnc_info_id'];
        $DetailsNotiChannels->dnc_pub_id = $validatedData['dnc_pub_id'];
        $DetailsNotiChannels->dnc_fm_d_id = $validatedData['dnc_fm_d_id'];
        $DetailsNotiChannels->dnc_prob_id = $validatedData['dnc_prob_id'];
        $DetailsNotiChannels->dnc_scop_pub = $validatedData['dnc_scop_pub'];
        $DetailsNotiChannels->dnc_num_mem_med = $validatedData['dnc_num_mem_med'];
        $DetailsNotiChannels->dnc_date_med = $validatedData['dnc_date_med'];
        $DetailsNotiChannels->dnc_capt = $validatedData['dnc_capt'];
        $DetailsNotiChannels->dnc_link = $validatedData['dnc_link'];
        $DetailsNotiChannels->save();

        return redirect()->route('action_type.index')->with('success', 'ActionType created successfully');
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
        $validatedData = $request->validate([
            'dnc_med_id' => 'required',
            'dnc_info_id' => 'required',
            'dnc_pub_id' => 'required',
            'dnc_fm_d_id' => 'required',
            'dnc_prob_id' => 'required',
            'dnc_scop_pub' => 'required',
            'dnc_num_mem_med' => 'required',
            'dnc_date_med' => 'required',
            'dnc_capt' => 'required',
            'dnc_link' => 'required',
        ]);
    
        $DetailsNotiChannels = DetailsNotiChannels::find($id);
        $DetailsNotiChannels->dnc_med_id = $validatedData['dnc_med_id'];
        $DetailsNotiChannels->dnc_info_id = $validatedData['dnc_info_id'];
        $DetailsNotiChannels->dnc_pub_id = $validatedData['dnc_pub_id'];
        $DetailsNotiChannels->dnc_fm_d_id = $validatedData['dnc_fm_d_id'];
        $DetailsNotiChannels->dnc_prob_id = $validatedData['dnc_prob_id'];
        $DetailsNotiChannels->dnc_scop_pub = $validatedData['dnc_scop_pub'];
        $DetailsNotiChannels->dnc_num_mem_med = $validatedData['dnc_num_mem_med'];
        $DetailsNotiChannels->dnc_date_med = $validatedData['dnc_date_med'];
        $DetailsNotiChannels->dnc_capt = $validatedData['dnc_capt'];
        $DetailsNotiChannels->dnc_link = $validatedData['dnc_link'];
        $DetailsNotiChannels->save();
    
        return redirect()->route('DetailsNotiChannels.show', $id)->with('success', 'DetailsNotiChannels updated successfully');
    }
    public function delete($id)
    {
        // Find the article by ID
        $DetailsNotiChannels = DetailsNotiChannels::find($id);

        if (!$DetailsNotiChannels) {
            return response()->json(['error' => 'Article not found'], 404);
        }

        // Delete the article
        $DetailsNotiChannels->delete();

        return response()->json(['message' => 'Article deleted successfully']);
    }
    public function destroy($id)
    {
        $DetailsNotiChannels = DetailsNotiChannels::find($id); // Use the correct model name 'User'
        $DetailsNotiChannels->delete(); // Use the 'delete' method to delete the user

        return redirect()->route('DetailsNotiChannels.index')->with('success', 'DetailsNotiChannels deleted successfully'); // Update the route name to 'users.index'
    }
}

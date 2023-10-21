<?php

namespace App\Http\Controllers;

use App\Models\FakeNewsInfo;
use Illuminate\Http\Request;

class FakeNewsInfoController extends Controller
{
    public function index()
    {
        $FakeNewsInfo = FakeNewsInfo::all(); // Use the correct model name 'User'
        return response()->json($FakeNewsInfo);
    }

    public function upload(Request $request)
    {
        $request->validate([
            'fn_info_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // 2MB max
        ]);

        if ($request->file('fn_info_image')) {
            $uploadedImage  = $request->file('fn_info_image');
            $imageName = time() . '.' . $uploadedImage ->getClientOriginalExtension();
            $uploadedImage ->move('fn_info_image/', $imageName);

            $FakeNewsInfo = new FakeNewsInfo([
                'fn_info_name' => $request['fn_info_name'],
                'fn_info_province' => $request['fn_info_province'],
                'fn_info_content' => $request['fn_info_content'],
                'fn_info_source' => $request['fn_info_source'],
                'fn_info_num_mem' => $request['fn_info_num_mem'],
                'fn_info_more' => $request['fn_info_more'],
                'fn_info_link' => $request['fn_info_link'],
                //'fn_info_dmy' => $request['fn_info_dmy'],
                'fn_info_image' => $imageName,
                // 'fn_info_vdo' => $vdoName,
            ]);
            $FakeNewsInfo->save();
            return response()->json(['message' => 'Data received and processed'], 200);
        } else {
            return response()->json(['message' => 'No images to upload'], 400);
        }
    }

    public function create()
    {
        return view('FakeNewsInfo.create');
    }

    public function store(Request $request)
    {
        // Validate and store a new user record
        // Use the 'User' model to create a new user
        // ...

        return redirect()->route('FakeNewsInfo.index')->with('success', 'FakeNewsInfo created successfully'); // Update the route name to 'users.index'
    }

    public function show($id)
    {
        $FakeNewsInfo = FakeNewsInfo::find($id); // Use the correct model name 'User'
        return view('FakeNewsInfo.show', ['FakeNewsInfo' => $FakeNewsInfo]); // Update the view name to 'users.show'
    }

    public function edit($id)
    {
        $FakeNewsInfo = FakeNewsInfo::find($id); // Use the correct model name 'User'
        return view('FakeNewsInfo.edit', ['FakeNewsInfo' => $FakeNewsInfo]); // Update the view name to 'users.edit'
    }

    public function update(Request $request, $id)
    {
        // Validate and update the user record
        // Use the 'User' model to update the user
        // ...

        return redirect()->route('FakeNewsInfo.show', $id)->with('success', 'FakeNewsInfo updated successfully'); // Update the route name to 'users.show'
    }

    public function destroy($id)
    {
        $FakeNewsInfo = FakeNewsInfo::find($id); // Use the correct model name 'User'
        $FakeNewsInfo->delete(); // Use the 'delete' method to delete the user

        return redirect()->route('FakeNewsInfo.index')->with('success', 'FakeNewsInfo deleted successfully'); // Update the route name to 'users.index'
    }
}

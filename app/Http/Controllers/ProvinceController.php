<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province;

class ProvinceController extends Controller
{
    public function index()
    {
        $Province = Province::all(); // Use the correct model name 'User'
        return response()->json($Province);
    }

    public function upload(Request $request)
    {
            $FakeNewsInfo = new Province([
                'mfi_time' => $request['mfi_time'],
            ]);
            $FakeNewsInfo->save();
            return response()->json(['message' => 'Data received and processed'], 200);
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
        $FakeNewsInfo = Province::find($id);

        if (!$FakeNewsInfo) {
            return response()->json(['error' => 'Fake News not found'], 404);
        }
        $FakeNewsInfo->fn_info_image = asset('fn_info_image/' . $FakeNewsInfo->fn_info_image);
        return response()->json($FakeNewsInfo);
    }

    public function edit($id)
    {
        $FakeNewsInfo = Province::find($id);

        if (!$FakeNewsInfo) {
            return response()->json(['error' => 'Fake News not found'], 404);
        }
        $FakeNewsInfo->fn_info_image = asset('fn_info_image/' . $FakeNewsInfo->fn_info_image);
        return response()->json($FakeNewsInfo);
    }

    public function update(Request $request, $id)
    {
        // First, validate the request data
        // $request->validate([
        //     'fn_info_head' => 'required|string',
        //     'fn_info_content' => 'required|string',
        //     'fn_info_source' => 'required|string',
        //     'fn_info_num_mem' => 'required|string',
        //     'fn_info_more' => 'required|string',
        //     'fn_info_link' => 'nullable|string',
        //     'fn_info_dmy' => 'required|string',
        //     'fn_info_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);
        // $request->validate([
        //     'fn_info_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // 2MB max
        // ]);
        // Find the FakeNewsInfo record by ID
        $fakeNewsInfo = Province::find($id);

        // if (!$fakeNewsInfo) {
        //     return response()->json(['error' => 'Fake News not found'], 404);
        // }
        // Handle the image upload if a new image is provided
        if ($request->file('fn_info_image')) {
            $uploadedImage  = $request->file('fn_info_image');
            $imageName = time() . '.' . $uploadedImage->getClientOriginalExtension();
            $uploadedImage->move('fn_info_image/', $imageName);

            // Update the fields based on the validated data
            $fakeNewsInfo->fn_info_head = $request->input('fn_info_head');
            $fakeNewsInfo->fn_info_content = $request->input('fn_info_content');
            $fakeNewsInfo->fn_info_source = $request->input('fn_info_source');
            $fakeNewsInfo->fn_info_num_mem = $request->input('fn_info_num_mem');
            $fakeNewsInfo->fn_info_more = $request->input('fn_info_more');
            $fakeNewsInfo->fn_info_link = $request->input('fn_info_link');
            $fakeNewsInfo->fn_info_dmy = $request->input('fn_info_dmy');
            $fakeNewsInfo->fn_info_image = $imageName;
            // Save the changes to the database
            $fakeNewsInfo->update();

            // Return a success response or other necessary actions
            return response()->json(['message' => 'Fake News updated successfully'], 200);
        } else {
            return response()->json(['message' => 'No images to upload'], 400);
        }
    }

    public function destroy($id)
    {
        $FakeNewsInfo = Province::find($id); // Use the correct model name 'User'
        if (!$FakeNewsInfo) {
            return response()->json(['error' => 'Fake News not found'], 404);
        }
        $FakeNewsInfo->delete(); // Use the 'delete' method to delete the user

        return response()->json(['message' => 'Fake News deleted successfully'], 200);
    }

    // ตัวอย่าง code ใน Laravel
    public function UpStatus(Request $request, $id)
    {
        $fakeNewsInfo = Province::find($id); // หาข้อมูลจาก ID
        $fakeNewsInfo->fn_info_status = $request->input('status'); ; // กำหนดค่าสถานะ
        $fakeNewsInfo->save(); // บันทึกการเปลี่ยนแปลง
        return response()->json(['message' => 'อัพเดทสถานะข่าวปลอมเรียบร้อยแล้ว'], 200);
    }
}

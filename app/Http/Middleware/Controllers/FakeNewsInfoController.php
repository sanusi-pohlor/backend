<?php

namespace App\Http\Controllers;

use App\Models\FakeNewsInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            $imageName = time() . '.' . $uploadedImage->getClientOriginalExtension();
            $uploadedImage->move('fn_info_image/', $imageName);

            $FakeNewsInfo = new FakeNewsInfo([
                'fn_info_nameid' => $request['fn_info_nameid'],
                'fn_info_province' => $request['fn_info_province'],
                'fn_info_head' => $request['fn_info_head'],
                'fn_info_content' => $request['fn_info_content'],
                'fn_info_source' => $request['fn_info_source'],
                'fn_info_num_mem' => $request['fn_info_num_mem'],
                'fn_info_more' => $request['fn_info_more'],
                'fn_info_link' => $request['fn_info_link'],
                'fn_info_dmy' => $request['fn_info_dmy'],
                'fn_info_image' => $imageName,
                // 'fn_info_vdo' => $vdoName,
                'fn_info_status' => 0,
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
        $FakeNewsInfo = FakeNewsInfo::find($id);

        if (!$FakeNewsInfo) {
            return response()->json(['error' => 'Fake News not found'], 404);
        }
        $FakeNewsInfo->fn_info_image = asset('fn_info_image/' . $FakeNewsInfo->fn_info_image);
        return response()->json($FakeNewsInfo);
    }

    public function edit($id)
    {
        $FakeNewsInfo = FakeNewsInfo::find($id);

        if (!$FakeNewsInfo) {
            return response()->json(['error' => 'Fake News not found'], 404);
        }
        $FakeNewsInfo->fn_info_image = asset('fn_info_image/' . $FakeNewsInfo->fn_info_image);
        return response()->json($FakeNewsInfo);
    }

    public function update(Request $request, $id)
    {
        $fakeNewsInfo = FakeNewsInfo::find($id);

        if ($request->file('fn_info_image')) {
            $uploadedImage  = $request->file('fn_info_image');
            $imageName = time() . '.' . $uploadedImage->getClientOriginalExtension();
            $uploadedImage->move('fn_info_image/', $imageName);

            $fakeNewsInfo->fn_info_head = $request->input('fn_info_head');
            $fakeNewsInfo->fn_info_content = $request->input('fn_info_content');
            $fakeNewsInfo->fn_info_source = $request->input('fn_info_source');
            $fakeNewsInfo->fn_info_num_mem = $request->input('fn_info_num_mem');
            $fakeNewsInfo->fn_info_more = $request->input('fn_info_more');
            $fakeNewsInfo->fn_info_link = $request->input('fn_info_link');
            $fakeNewsInfo->fn_info_dmy = $request->input('fn_info_dmy');
            $fakeNewsInfo->fn_info_image = $imageName;
            $fakeNewsInfo->update();

            return response()->json(['message' => 'Fake News updated successfully'], 200);
        } else {
            return response()->json(['message' => 'No images to upload'], 400);
        }
    }

    public function destroy($id)
    {
        $FakeNewsInfo = FakeNewsInfo::find($id); // Use the correct model name 'User'
        if (!$FakeNewsInfo) {
            return response()->json(['error' => 'Fake News not found'], 404);
        }
        $FakeNewsInfo->delete(); // Use the 'delete' method to delete the user

        return response()->json(['message' => 'Fake News deleted successfully'], 200);
    }

    public function UpStatus(Request $request, $id)
    {
        $fakeNewsInfo = FakeNewsInfo::find($id); // หาข้อมูลจาก ID
        $fakeNewsInfo->fn_info_status = $request->input('status'); ; // กำหนดค่าสถานะ
        $fakeNewsInfo->save(); // บันทึกการเปลี่ยนแปลง
        return response()->json(['message' => 'อัพเดทสถานะข่าวปลอมเรียบร้อยแล้ว'], 200);
    }
}

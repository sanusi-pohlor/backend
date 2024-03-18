<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index()
    {
        $Result = Result::all();
        return response()->json($Result);
    }

    public function upload(Request $request)
    {
        $Result = new Result([
            'result_name' => $request['result_name'],
        ]);
        $Result->save();
        return response()->json(['message' => 'Data received and processed'], 200);
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'result_name' => 'required',
        ]);

        $Result = Result::find($id);
        $Result->result_name = $validatedData['result_name'];
        $Result->save();

        return redirect()->route('action_type.show', $id)->with('success', 'Result updated successfully');
    }

    public function delete($id)
    {
        $Result = Result::find($id);

        if (!$Result) {
            return response()->json(['error' => 'Article not found'], 404);
        }

        $Result->delete();

        return response()->json(['message' => 'Article deleted successfully']);
    }
    public function destroy($id)
    {
        $Result = Result::find($id);
        $Result->delete();

        return redirect()->route('action_type.index')->with('success', 'Result deleted successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\ActionType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ActionTypeController extends Controller
{
    public function index()
    {
        $ActionType = ActionType::all();
        return response()->json($ActionType);
    }

    public function upload(Request $request)
    {
        $ActionType = new ActionType([
            'act_ty_name' => $request['act_ty_name'],
        ]);
        $ActionType->save();
        return response()->json(['message' => 'Data received and processed'], 200);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'act_ty_name' => 'required',
            // Add more validation rules as needed
        ]);

        $actionType = ActionType::find($id);
        $actionType->act_ty_name = $validatedData['act_ty_name'];
        $actionType->save();

        return redirect()->route('action_type.show', $id)->with('success', 'ActionType updated successfully');
    }

    public function delete($id)
    {
        // Find the article by ID
        $actionType = actionType::find($id);

        if (!$actionType) {
            return response()->json(['error' => 'Article not found'], 404);
        }

        // Delete the article
        $actionType->delete();

        return response()->json(['message' => 'Article deleted successfully']);
    }
    public function destroy($id)
    {
        $actionType = ActionType::find($id);
        $actionType->delete();

        return redirect()->route('action_type.index')->with('success', 'ActionType deleted successfully');
    }
}

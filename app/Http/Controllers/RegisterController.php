<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function Register(Request $request)
    {
        $user = new Users([
            'username' => $request['username'],
            'lastName' => $request['lastName'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'phone_number' => $request['phone_number'],
            'Id_line' => $request['Id_line'],
            'province' => $request['province'],
            'receive_ct_email' => $request['receive_ct_email'],
        ]);
        $user->save();

        return response()->json([
            'message' => 'User registered successfully',
            // 'user' => $user
        ], 200);
    }
}

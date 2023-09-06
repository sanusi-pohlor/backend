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
        // $request->validate([
        //     'username' => 'required|max:255',
        //     'lastName' => 'required|max:255',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required|min:6|confirmed',
        //     'phone_number' => 'required|max:20',
        //     'Id_line' => 'required|max:255',
        //     'province' => ['required', Rule::in(['Krabi', 'Chumphon', 'Trang', 'NakhonSiThammarat', 'Pattani', 'PhangNga', 'Phattalung', 'Phuket', 'Yala', 'Ranong', 'Songkhla', 'Satun', 'SuratThani'])],
        // ]);

        $user = new Users([
            'username' => $request['username'],
            'lastName' => $request['lastName'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'phone_number' => $request['phone_number'],
            'Id_line' => $request['Id_line'],
            'province' => $request['province'],
        ]);
        $user->save();

        return response()->json([
            'message' => 'User registered successfully',
            // 'user' => $user
        ], 200);
    }
}

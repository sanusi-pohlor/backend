<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|max:255',
            'lastName' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'phone_number' => 'required|max:20',
            'Id_line' => 'required|max:255',
            'province' => ['required', Rule::in(['Krabi', 'Chumphon', 'Trang', 'NakhonSiThammarat', 'Pattani', 'PhangNga', 'Phattalung', 'Phuket', 'Yala', 'Ranong', 'Songkhla', 'Satun', 'SuratThani'])],
        ]);

        $user = new User([
            'username' => $validatedData['username'],
            'lastName' => $validatedData['lastName'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'phone_number' => $validatedData['phone_number'],
            'Id_line' => $validatedData['Id_line'],
            'province' => $validatedData['province'],
        ]);
        $user->save();

        return response()->json([
            'message' => 'User registered successfully',
            'user' => $user
        ], 201);
    }
}

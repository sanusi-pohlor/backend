<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    // User registration
    public function register(Request $request)
    {
        $user = User::create([
            'username' => $request->input('username'),
            'lastName' => $request->input('lastName'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'phone_number' => $request->input('phone_number'),
            'Id_line' => $request->input('Id_line'),
            'province' => $request->input('province'),
            //'receive_ct_email' => $request->input('receive_ct_email'),
            // 'about' => 3,
            // 'level' => 3,
        ]);

        $token = $user->createToken('Token')->plainTextToken;

        return response()->json(['token' => $token], 200);
    }

    public function edit($id)
    {
        $User = User::find($id);

        if (!$User) {
            return response()->json(['error' => 'User not found'], 404);
        }
        return response()->json($User);
    }
    // User login
    public function login(Request $request)
    {
        // Attempt to authenticate the user with the provided email and password
        if (!Auth::attempt($request->only('email', 'password'))) {
            // Return an error response if authentication fails
            return response([
                'message' => 'Invalid credentials!'
            ], Response::HTTP_UNAUTHORIZED); // HTTP 401 Unauthorized
        }

        // Get the authenticated user
        $user = Auth::user();

        // Create a new authentication token for the user
        $token = $user->createToken('token')->plainTextToken;

        // Store the token in an HTTP cookie (valid for 1 minute) and return it in the response
        $cookie = cookie('jwt', $token, 1); // 1 minute
        return response([
            'message' => $token
        ])->withCookie($cookie);
    }

    // Retrieve the currently authenticated user
    public function user()
    {
        // Retrieve the authenticated user
        return Auth::user();
    }

    // User logout
    public function logout()
    {
        // Clear the authentication token cookie to log the user out
        $cookie = Cookie::forget('jwt');

        // Return a success message in the response
        return response([
            'message' => 'Success'
        ])->withCookie($cookie);
    }

    public function delete($id)
    {
        // Find the article by ID
        $User = User::find($id);

        if (!$User) {
            return response()->json(['error' => 'Article not found'], 404);
        }

        // Delete the article
        $User->delete();

        return response()->json(['message' => 'Article deleted successfully']);
    }
}

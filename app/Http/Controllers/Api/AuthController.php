<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    /**
     * Register a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'status' => 400], 400);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json(['message' => 'User registered successfully','token'=>$token, 'status' => 200], 200);
    }

    /**
     * Authenticate a user and return the token if the provided credentials are correct.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'status' => 400], 400);
        }

        // Attempt to log the user in
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $token = $user->createToken('authToken')->plainTextToken;
            return response()->json(['token' => $token, 'status' => 200], 200);
        } else {
            return response()->json(['error' => 'Unauthorized', 'status' => 400], 400);
        }
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUser(Request $request)
    {
        return response()->json(['user' => $request->user(), 'status' => 200], 200);
    }



    /**
     * Logout the authenticated user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out successfully', 'status' => 200], 200);
    }

    public function updateUser(Request $request)
{
    $user = $request->user();

    $validator = Validator::make($request->all(), [
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'bio' => 'string|max:255', 
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors(), 'status' => 400], 400);
    }


    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('user_images');

        if ($user->image) {
            Storage::delete($user->image);
        }
        $user->image = $imagePath;
    }


    if ($request->filled('bio')) {
        $user->bio = $request->bio;
    }

    $user->save();

    return response()->json(['message' => 'Profile updated successfully', 'user' => $user, 'status' => 200], 200);
}

}

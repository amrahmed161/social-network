<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Connection;

class ConnectionController extends Controller
{
    public function follow(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'follower_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }


        if (Connection::where('user_id', $request->user_id)->where('follower_id', $request->follower_id)->exists()) {
            return response()->json(['error' => 'Connection already exists'], 400);
        }

        $connection = Connection::create([
            'user_id' => $request->user_id,
            'follower_id' => $request->follower_id,
            'status' => 0,
        ]);

        return response()->json(['connection' => $connection], 201);
    }
    public function accept(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'follower_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }


        if (Connection::where('user_id', $request->user_id)->where('follower_id', $request->follower_id)->exists()) {
            return response()->json(['error' => 'Connection already exists'], 400);
        }

        $connection = Connection::create([
            'user_id' => $request->user_id,
            'follower_id' => $request->follower_id,
            'status' => 1,
        ]);

        return response()->json(['connection' => $connection], 201);
    }

    public function reject(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'follower_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }


        if (Connection::where('user_id', $request->user_id)->where('follower_id', $request->follower_id)->exists()) {
            return response()->json(['error' => 'Connection already exists'], 400);
        }

        $connection = Connection::create([
            'user_id' => $request->user_id,
            'follower_id' => $request->follower_id,
            'status' => 2,
        ]);

        return response()->json(['connection' => $connection], 201);
    }
}




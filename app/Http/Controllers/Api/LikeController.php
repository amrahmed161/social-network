<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Like;
use App\Models\Post;

class LikeController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'post_id' => 'required',
        ]);


        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }


        $like = new Like();
        $like->post_id = $request->post_id;
        $like->user_id = auth()->user()->id;
        $like->save();

        return response()->json(['message' => 'Post liked successfully'], 200);
    }
}

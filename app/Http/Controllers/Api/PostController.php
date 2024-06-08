<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index()
    {
        $userId =  auth()->id();

        $posts = Post::where('user_id', $userId)->get();

        return response()->json(['posts' => $posts, 'status'=>200]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'body' => 'required|string|max:2000',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'status' => 400], 400);
        }

        $post = new Post([
            'user_id' => auth()->id(),
            'body' => $request->body,
        ]);

        $post->save();

        return response()->json(['message' => 'Post created successfully', 'status' => 200, 'post' => $post], 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'body' => 'required|string|max:255',
        ]);

        $post = Post::findOrFail($id);

        if ($post->user_id !== auth()->id()) {
            return response()->json(['error' => 'Unauthorized', 'status' => 400], 400);
        }

        $post->update([
            'body' => $request->body,
        ]);

        return response()->json(['message' => 'Post updated successfully', 'status' => 200, 'post' => $post]);
    }

    public function destroy(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        if ($post->user_id !== auth()->id()) {
            return response()->json(['error' => 'Unauthorized', 'status' => 400], 400);
        }

        $post->delete();

        return response()->json(['message' => 'Post deleted successfully', 'status' => 200]);
    }
}

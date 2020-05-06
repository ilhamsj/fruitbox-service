<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return response()->json($posts);
    }

    public function store(Request $request)
    {
        $post = Post::create($request->all());
        return response()->json($post);
    }

    public function show($id)
    {
        $post = Post::find($id);
        return response()->json($post);
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->update($request->all());

        return response()->json($post);
    }

    public function destroy($id)
    {
        $post = Post::destroy($id);

        return response()->json($post);
    }
}

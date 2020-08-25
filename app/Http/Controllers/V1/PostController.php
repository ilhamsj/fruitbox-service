<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return response()->json($posts);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:10',
            'description' => 'required:15',
        ]);

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
        $this->validate($request, [
            'title' => 'required|min:10',
            'description' => 'required:15',
        ]);
        
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

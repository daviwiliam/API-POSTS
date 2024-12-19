<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Post::all();

        return $post;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'title'=> 'required|max:255',
            'body'=>'required'
        ]);

        $post = Post::create($fields);

        return $post;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return $post;

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $fields = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required'
        ]);

        $post->update($fields);

        return $post;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post->delete($post);

        return ['message' => 'The post was deleted'];
    }
}

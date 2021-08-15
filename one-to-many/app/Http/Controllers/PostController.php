<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(3);
        return view('post.index', compact('posts'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {

        Post::create($request->all());
        return Redirect()->route('post-index')->with('success', 'Post uploaded successfully');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('post.edit', compact('post'));
    }

    public function update(Request $request, Post $id)
    {
        $id->update([
            'title' => $request->title,
            'body' => $request->body
        ]);
        return Redirect()->route('post-index');
    }

    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
        return Redirect()->back();
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('post.show', compact('post'));
    }


}

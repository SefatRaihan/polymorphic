<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class CommentsController extends Controller
{
    public function store(Request $request, Post $post, $id)
    {
        $post = Post::find($id);
        $post->comments()->create([
            'body' => $request->comment,
        ]);
        return redirect()->back();
    }
}

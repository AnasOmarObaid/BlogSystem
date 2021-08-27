<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Post $post, Request $request)
    {

        $request->validate([
            'body'  =>  'required',
        ]);

        $post->comments()->create([
            'user_id'   =>  auth()->user()->id,
            'comment'   =>  $request->body
        ]);

        return back()->with('success', 'successfully addedd comment');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = Post::with(['category', 'author'])->whenCategory($request)->whenSearch($request)->whenAuthor($request);

        return view('posts.index', [
            'posts'        =>  $posts->paginate(15)->withQueryString(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return  view('posts.show', [
            'post'  => $post->load(['author', 'category', 'comments'])
        ]);
    }

}

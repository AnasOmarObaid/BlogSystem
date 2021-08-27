<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // produced this method and the return is 403 if not admin
        $this->authorize('admin');

        $posts = post::latest();

        return view('admin.posts.index', [
            'posts' => $posts->paginate(15)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $attribute = $request->validated();

        $attribute['slug'] = Str::remove("/", bcrypt(now()));
        $attribute['user_id'] = auth()->user()->id;
        $attribute['thumbnail'] = $request->file('thumbnail')->store('images/thumbnails');

        Post::create($attribute);

        return redirect()->route('admin.posts.create')->with('success', 'successfully add post');
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
            'post'  => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post'   => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $attributes = $request->validated();

        if ($request->hasFile('thumbnail'))
            $attributes['thumbnail'] = $this->updateThumbnail($request, $post);

        $post->update($attributes);

        if ($post)
            return redirect()->back()->with('success', 'successfully updated :)');

        //if something is error
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // check if the post has thumbnail
        if (Str::afterLast($post->thumbnail, '\\') != 'default.png')
            $this->deleteThumbnail($post);

        if ($post->delete())
            return redirect()->route('admin.posts.index')->with('success', 'successfully delete post:)');

        return abort(404);
    }

    // function to update the image
    public function updateThumbnail($request, $post)
    {
        if (Str::afterLast($post->thumbnail, '\\') == 'default.png')
            return $request->file('thumbnail')->store('images/thumbnails');
        else {
            $this->deleteThumbnail($post);
            return $request->file('thumbnail')->store('images/thumbnails');
        }
    }

    // function to delete thumbnail
    public function deleteThumbnail($post)
    {
        if (!Storage::delete($post->thumbnail))
            return abort(404);
    }
}

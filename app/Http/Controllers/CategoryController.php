<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Database\Seeders\PostSeeder;
use Illuminate\Http\Request;

class CategoryController extends Controller
{


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('posts.index', [
            'posts'         =>  Post::where('category_id', $category->id)->with(['author', 'category'])->paginate(15)->withQueryString(),
            'curCat'       =>   $category->name,
            'categories'    =>  Category::all(),
        ]);
    }

}

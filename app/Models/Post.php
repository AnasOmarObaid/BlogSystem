<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['category', 'author', 'comments'];


    // one to many
    public function Category()
    {

        return $this->belongsTo(Category::class);
    }

    // belong to user
    public function author()
    {

        return $this->belongsTo(User::class, 'user_id');
    }

    // has many comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // scopes
    public static function scopeWhenSearch($query, $request) //
    {
        return $query->when($request->search, function ($q) use ($request) {
            return $q->where('title', "like", "%$request->search%")
                ->orWhere('body', "like", "%$request->search%");
        });
    }

    public static function scopeWhenCategory($query, $request)
    {
        return $query->when($request->category, function ($qu) use ($request) {
            return $qu->whereHas('category', function ($q) use ($request) {
                return $q->where('name', $request->category);
            });
        });
    }

    public static function scopeWhenAuthor($query, $request)
    {
        return $query->when($request->author, function ($qu) use ($request) {
            return $qu->whereHas('author', function ($q) use ($request) {
                return $q->where('username', $request->author);
            });
        });
    }


    // function to get the thumbnail for post
    public function get_thumbnail(){
        return  asset('/storage//' . $this->thumbnail) ;
    }


}

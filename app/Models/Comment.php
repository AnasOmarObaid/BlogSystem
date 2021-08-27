<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $with = ['user'];
    protected  $fillable = [
        'comment',
        'user_id',
        'post_id'
    ];


    // the comment belong single post
    public function post(){
        return $this->belongsTo(Post::class);
    }

    // the comment belong single user
    public function user(){
        return $this->belongsTo(User::class);
    }
}

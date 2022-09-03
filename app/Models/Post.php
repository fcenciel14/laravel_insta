<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'description',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function categoryPost()
    {
        return $this->hasMany(CategoryPost::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    // check if there is my own account among people who likes the post
    public function isLiked()
    {
        return $this->likes()->where('user_id', Auth::id())->exists();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
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

    // public function is_liked()
    // {
    //     $id = Auth::id();

    //     $users = [];
    //     foreach ($this->likes as $like) {
    //         array_push($users, $like->user_id);
    //     }

    //     if (in_array($id, $users)) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    public function is_liked()
    {
        return $this->likes()->where('user_id', Auth::id())->exists();
    }
}

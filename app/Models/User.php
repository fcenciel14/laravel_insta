<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Post;
use App\Models\Like;
use App\Models\Comment;
use App\Models\Follow;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // soft delete and restore the relational posts simultaneously
    protected static function boot()
    {
        parent::boot();

        static::deleted(function ($users) {
            $users->posts()->delete();
            $users->comments()->delete();
            $users->likes()->delete();
        });

        static::restoring(function($users) {
            $users->posts()->withTrashed()->where('deleted_at', '>=', $users->deleted_at)->restore();
            $users->comments()->withTrashed()->restore();
            $users->likes()->withTrashed()->restore();
        });
    }


    public function posts() {
        return $this->hasMany(Post::class)->latest();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function followers()
    {
        return $this->hasMany(Follow::class, 'following_id');
    }

    // check if there is my own account among people who follows someone
    public function isFollowed()
    {
        return $this->followers()->where('follower_id', Auth::user()->id)->exists();
    }

    public function followings()
    {
        return $this->hasMany(Follow::class, 'follower_id');
    }
}

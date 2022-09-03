<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;

    protected $fillable = [
        'follower_id',
        'following_id',
    ];

    public $timestamps = false;

    // get information of the follower (following you)
    public function getFollower()
    {
        return $this->belongsTo(User::class, 'follower_id', 'id');
    }

    // get information of the following person (the person who you are following)
    public function getFollowing()
    {
        return $this->belongsTo(User::class, 'following_id', 'id');
    }
}
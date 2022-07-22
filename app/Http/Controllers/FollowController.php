<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function follow($id)
    {
        Follow::create([
            'follower_id' => Auth::id(),
            'following_id' => $id,
        ]);
        return redirect()->back();
    }

    public function unfollow($id)
    {
        $follow = Follow::where('follower_id', Auth::id())->where('following_id', $id)->first();
        $follow->delete();
        return redirect()->back();
    }
}

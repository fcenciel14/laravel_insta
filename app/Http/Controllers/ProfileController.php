<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Services\ImageService;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function show($id)
    {
        $profile = $this->user->findOrFail($id);
        return view('profile.show', compact('profile'));
    }

    public function edit()
    {
        $profile = $this->user->findOrFail(Auth::user()->id);
        return view('profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email, ' . Auth::id(),
            'introduction' => 'max:100',
            'avatar' => 'mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $user = $this->user->findOrFail(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->introduction = $request->introduction;

        if ($request->avatar) {
            if ($user->avatar) {
                ImageService::delete($user->avatar, 'avatars');
            }
            $file_name_to_store = ImageService::upload($request->avatar, 'avatars');
            $user->avatar = $file_name_to_store;
        }
        $user->save();

        return redirect()->route('profile.show', Auth::user()->id);
    }

    public function showFollower($id)
    {
        $profile = $this->user->findOrFail($id);
        return view('profile.follower', compact('profile'));
    }

    public function showFollowing($id)
    {
        $profile = $this->user->findOrFail($id);
        return view('profile.following', compact('profile'));
    }
}

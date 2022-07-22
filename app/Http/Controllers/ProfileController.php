<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    private $user;
    const LOCAL_STORAGE_FOLDER = 'public/avatars/';

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
        $user = $this->user->findOrFail(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->introduction = $request->introduction;

        if ($request->avatar) {
            if ($user->avatar) {
                $this->deleteAvatar($user->avatar);
            }
            $user->avatar = $this->saveAvatar($request);
        }
        $user->save();

        return redirect()->route('profile.show', Auth::user()->id);
    }

    public function saveAvatar($request)
    {
        $avatar_name = time() . "." . $request->avatar->extension();
        $request->avatar->storeAs(self::LOCAL_STORAGE_FOLDER, $avatar_name);
        return $avatar_name;
    }

    public function deleteAvatar($avatar_name)
    {
        $avatar_path = self::LOCAL_STORAGE_FOLDER . $avatar_name;

        if (Storage::disk('local')->exists($avatar_path)) {
            Storage::disk('local')->delete($avatar_path);
        }
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

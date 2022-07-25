<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $users = $this->user->withTrashed()->latest()->get();

        return view('admin.users.index')
            ->with('users', $users);
    }

    public function deactivate($id)
    {
        $this->user->destroy($id);
        // $this->user->posts->destroy();

        return redirect()->back();
    }

    public function activate($id)
    {
        $this->user->onlyTrashed()->findOrFail($id)->restore();
        // $this->user->onlyTrashed()->findOrFail($id)->posts->restore();

        return redirect()->back();
    }
}

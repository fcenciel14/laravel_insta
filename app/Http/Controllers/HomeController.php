<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;

class HomeController extends Controller
{
    private $post;
    private $comment;
    private $user;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Post $post, Comment $comment, User $user)
    {
        // $this->middleware('auth');
        $this->post = $post;
        $this->comment = $comment;
        $this->user = $user;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = $this->post->latest()->paginate(5);
        $users = $this->user->get();
        return view('users.home', compact('posts', 'users'));
    }
}

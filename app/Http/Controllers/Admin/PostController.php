<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function index()
    {
        $posts = $this->post->withTrashed()->latest()->get();

        return view('admin.posts.index')
            ->with('posts', $posts);
    }

    public function hide($id)
    {
        $this->post->destroy($id);

        return redirect()->back();
    }

    public function display($id)
    {
        $this->post->onlyTrashed()->findOrFail($id)->restore();

        return redirect()->back();
    }
}

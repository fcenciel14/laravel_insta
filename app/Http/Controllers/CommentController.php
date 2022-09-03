<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    private $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function store(Request $request, $post_id)
    {
        $request->validate([
            'comment' => 'required|min:1|max:150',
        ]);

        $this->comment->create([
            'user_id' => Auth::user()->id,
            'post_id' => $post_id,
            'body' => $request->comment,
        ]);

        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $this->comment->where('user_id', Auth::user()->id)->where('id', $request->id)->delete();
        return response()->json([
            'message' => 'Comment deleted successfully',
        ]);
    }
}

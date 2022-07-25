<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Like;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    private $post;
    private $category;
    private $comment;

    public function __construct(Post $post, Category $category, Comment $comment)
    {
        $this->post = $post;
        $this->category = $category;
        $this->comment = $comment;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->category->get();
        return view('users.posts.create')
            ->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $file_name_to_store = ImageService::upload($request->image, 'images');

        $this->post->user_id = Auth::user()->id;
        $this->post->description = $request->description;
        $this->post->image = $file_name_to_store;

        foreach ($request->categories as $category_id) {
            $category_post[] = ['category_id' => $category_id];
        }

        $this->post->save();
        $this->post->categoryPost()->createMany($category_post);
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = $this->post->withCount('likes')->findOrFail($id);
        $comments = $this->comment->latest()->get();
        return view('users.posts.show')
            ->with('post', $post)
            ->with('comments', $comments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = $this->category->get();
        $post = $this->post->findOrFail($id);

        foreach ($post->categoryPost as $category_post) {
            $selected_categories[] = $category_post->category_id;
        }

        return view('users.posts.edit')
            ->with('categories', $categories)
            ->with('post', $post)
            ->with('selected_categories', $selected_categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, $id)
    {
        $request->validate([
            'image' => 'mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $post = $this->post->findOrFail($id);
        $post->description = $request->description;

        if ($request->image) {
            ImageService::delete($post->image, 'images');
            $file_name_to_store = ImageService::upload($request->image, 'images');
            $post->image = $file_name_to_store;
        }
        $post->save();

        $post->categoryPost()->delete();

        foreach ($request->categories as $category_id) {
            $category_post[] = ['category_id' => $category_id];
        }

        $post->categoryPost()->createMany($category_post);

        return redirect()->route('post.show', $id);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = $this->post->findOrFail($id);
        ImageService::delete($post->image, 'images');
        $this->post->destroy($id);

        return redirect()->route('index');
    }

}

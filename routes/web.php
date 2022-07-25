<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\FollowController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Profiler\Profile;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::group(['middleware' => 'auth'], function() {

    // Post
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])
        ->name('index');

    Route::get('/post/create', [PostController::class, 'create'])
        ->name('post.create');

    Route::post('/post/store', [PostController::Class, 'store'])
        ->name('post.store');

    Route::get('/post/show/{id}', [PostController::class, 'show'])
        ->name('post.show');

    Route::get('/post/edit/{id}', [PostController::class, 'edit'])
        ->name('post.edit');

    Route::patch('/post/update/{id}', [PostController::class, 'update'])
        ->name('post.update');

    Route::delete('/post/destroy/{id}', [PostController::class, 'destroy'])
        ->name('post.destroy');

    Route::post('/post/like', [LikeController::class, 'like']) // Ajax
        ->name('post.like');

    // Comment
    Route::post('/{post_id}/comment/store', [CommentController::class, 'store'])
        ->name('comment.store');

    Route::delete('/comment/delete', [CommentController::class, 'destroy']) // Ajax
        ->name('comment.delete');

    // Profile
    Route::get('/profile/show/{id}', [ProfileController::class, 'show'])
        ->name('profile.show');

    Route::get('/profile/edit', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile/update', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::get('/profile/{id}/follower', [ProfileController::class, 'showFollower'])
        ->name('profile.follower');

    Route::get('/profile/{id}/following', [ProfileController::class, 'showFollowing'])
        ->name('profile.following');

    // Follow
    Route::post('/follow/{id}', [FollowController::class, 'follow'])
        ->name('follow');

    Route::post('/unfollow/{id}', [FollowController::class, 'unfollow'])
        ->name('unfollow');

    // Admin
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {

        // User
        Route::get('/users', [UserController::class, 'index'])
            ->name('users');

        Route::delete('/users/{id}/deactivate', [UserController::class, 'deactivate'])
            ->name('users.deactivate');

        Route::post('/users/{id}/activate', [UserController::class, 'activate'])
            ->name('users.activate');

        // Post
        Route::get('/posts', [AdminPostController::class, 'index'])
            ->name('posts');

        Route::delete('/posts/{id}/hide', [AdminPostController::class, 'hide'])
            ->name('posts.hide');

        Route::post('/posts/{id}/display', [AdminPostController::class, 'display'])
            ->name('posts.display');

        // Category
        Route::get('/categories', [CategoryController::class, 'index'])
            ->name('categories');

        Route::post('/categories/store', [CategoryController::class, 'store'])
            ->name('categories.store');

        Route::delete('/categories/delete/{id}', [CategoryController::class, 'destroy'])
            ->name('categories.delete');
    });
});

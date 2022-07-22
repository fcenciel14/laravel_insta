<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
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

    Route::post('/post/{id}/like', [LikeController::class, 'like'])
        ->name('post.like');

    Route::post('/post/{id}/unlike', [LikeController::class, 'unlike'])
        ->name('post.unlike');

    // Comment
    Route::post('/{post_id}/comment/store', [CommentController::class, 'store'])
        ->name('comment.store');

    Route::delete('/comment/destroy/{id}', [CommentController::class, 'destroy'])
        ->name('comment.destroy');

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
});

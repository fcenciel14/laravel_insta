@extends('layouts.app')
@section('title', 'Post Detail')

@section('content')

    <div class="row">
        <div class="col">
            <img src="{{ asset('/storage/images/' . $post->image) }}" alt="{{ $post->image }}" class="w-100">
        </div>

        <div class="col-6 bg-white border">
            @include('users.posts.contents.title')
            <div class="card-body">
                <div class="align-items-center mb-2">
                    @if ($post->isLiked())
                        <span class="likes">
                            <i class="fa-solid fa-heart like-toggle liked" data-postid="{{ $post->id }}"></i>
                            <span class="like-counter">{{ $post->likes_count }}</span>
                        </span>
                    @else
                        <span class="likes">
                            <i class="fa-solid fa-heart like-toggle" data-postid="{{ $post->id }}"></i>
                            <span class="like-counter">{{ $post->likes_count }}</span>
                        </span>
                    @endif
                </div>

                <div class="mb-2">
                    @foreach ($post->categoryPost as $category_post)
                        <div class="badge bg-secondary bg-opacity-50">
                            #{{ $category_post->category->name }}
                        </div>
                    @endforeach
                </div>
                <a href="" class="text-decoration-none text-dark fw-bold">{{ $post->user->name }}</a>
                &nbsp; <p class="d-inline fw-light">{{ $post->description }}</p>

                <form action="{{ route('comment.store', $post->id) }}" method="post" class="mt-3">
                    @csrf
                    <div class="input-group mb-2">
                        <textarea name="comment" id="comment" cols="30" rows="1" class="form-control form-control-sm" placeholder="Add a comment..."></textarea>
                        <button type="submit" class="btn btn-sm btn-outline-secondary">Post</button>
                    </div>
                </form>
                @if ($post->comments->isNotEmpty())
                    @foreach ($post->comments as $comment)
                        <div class="bg-white mb-2 comment">
                            <a href="" class="text-decoration-none text-dark fw-bold">{{ $comment->user->name }}</a>
                            <p class="fw-light text-break m-0">{{ $comment->body }}</p>
                            <div class="row">
                                <div class="col">
                                    <p class="text-muted m-0">{{ $comment->created_at->format('Y-m-d') }}</p>
                                </div>
                                <div class="col text-end">
                                    @if ($comment->user_id === Auth::user()->id)
                                        <span class="text-danger deleteTarget" data-commentid="{{ $comment->id }}">Delete</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    </div>

    <script src="{{ mix('js/ajaxlike.js') }}"></script>
    <script src="{{ mix('js/delete_comment.js')}}"></script>
@endsection

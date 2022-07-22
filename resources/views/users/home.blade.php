@extends('layouts.app')
@section('title', 'Home')

@section('content')
    <div class="row gx-5">
        <div class="col-8">
            @if ($posts->isNotEmpty())
                @foreach ($posts as $post)
                    @if ($post->user->isFollowed() || $post->user->id === Auth::user()->id)
                        <div class="card mb-4">
                            {{-- title --}}
                                @include('users.posts.contents.title')

                            {{-- body --}}
                                @include('users.posts.contents.body')

                            {{-- comment --}}
                                @include('users.posts.contents.comment')
                        </div>
                    @endif
                @endforeach
                <div class="d-flex justify-content-center">
                    {{ $posts->links() }}
                </div>
            @else
                <div class="text-center">
                    <h2>Share Photos</h2>
                    <p class="text-muted">When you share photos, they'll appear on your profile</p>
                    <a href="{{ route('post.create') }}" class="text-decoration-none">Share your first photo</a>
                </div>
            @endif
        </div>
        <div class="col-4">
            @include('users.posts.contents.suggestions')
        </div>
    </div>
@endsection

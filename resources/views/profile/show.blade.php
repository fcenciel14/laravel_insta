@extends('layouts.app')
@section('title', 'Profile')

@section('content')

    @include('profile.contents.about')

    <div class="row">
        @foreach ($profile->posts as $post)
            <div class="col-4 mb-3">
                <a href="{{ route('post.show', $post->id) }}">
                    <img src="{{ asset('/storage/images/' . $post->image) }}" alt="{{ $post->image }}" class="img-thumbnail">
                </a>
            </div>
        @endforeach
    </div>
@endsection
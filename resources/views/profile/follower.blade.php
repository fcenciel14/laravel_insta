@extends('layouts.app')
@section('title', 'My Followers')

@section('content')

    @include('profile.contents.about')

    <div class="w-50 mx-auto">
        <h4 class="text-muted text-center mb-3">Followers</h4>
        <ul class="list-group list-group-flush">
            @foreach ($profile->followers as $follower)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        @if ($follower->getFollower->avatar)
                            <img src="{{ asset('storage/avatars/' . $follower->getFollower->avatar) }}" alt="Avatar" class="profile-img">
                        @else
                            <i class="fa-solid fa-circle-user text-secondary user-icon align-bottom fa-2x"></i>
                        @endif
                        <a href="{{ route('profile.show', $follower->getFollower->id) }}" class="text-decoration-none text-black ms-2">{{ $follower->getFollower->name }}</a>
                    </div>
                    @if (!$follower->getFollower->isFollowed())
                        <form action="{{ route('follow', $follower->getFollower->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-primary">Follow</button>
                        </form>
                    @else
                        <small>Following</small>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>

@endsection

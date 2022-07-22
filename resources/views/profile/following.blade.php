@extends('layouts.app')
@section('title', 'My Followings')

@section('content')

    @include('profile.contents.about')

    <div class="w-50 mx-auto">
        <h4 class="text-muted text-center mb-3">Followings</h4>
        <ul class="list-group list-group-flush">
            @foreach ($profile->followings as $following)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        @if ($following->getFollowing->avatar)
                            <img src="{{ asset('storage/avatars/' . $following->getFollowing->avatar) }}" alt="Avatar" class="profile-img">
                        @else
                            <i class="fa-solid fa-circle-user text-secondary user-icon align-bottom fa-2x"></i>
                        @endif
                        <a href="{{ route('profile.show', $following->getFollowing->id) }}" class="text-decoration-none text-black ms-2">{{ $following->getFollowing->name }}</a>
                    </div>
                    <form action="{{ route('unfollow', $following->getFollowing->id) }}" method="post" class="m-0">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-danger">Unfollow</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>

@endsection

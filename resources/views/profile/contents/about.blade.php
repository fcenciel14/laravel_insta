<div class="row pt-3 pb-5">
    <div class="col-4 text-center">
        @if ($profile->avatar)
            <img src="{{ asset('storage/avatars/' . $profile->avatar) }}" alt="Avatar" class="profile-img">
        @else
            <i class="fa-solid fa-circle-user text-muted fa-10x"></i>
        @endif
    </div>
    <div class="col-8">
        <h2 class="display-6 d-inline align-bottom me-5">{{ $profile->name }}</h2>
        <div class="d-flex mt-3">
            <a class="me-3 text-decoration-none text-black"><span class="fw-bold">{{ $profile->posts->count() }}</span> Posts</a>

            <!-- for modal -->
            {{-- <a href="" class="me-3 text-black" data-bs-toggle="modal" data-bs-target="#show-followers-{{ $profile->id }}"><span class="fw-bold">{{ $profile->followers->count() }}</span> Follower</a>
            <a href="" class="text-black" data-bs-toggle="modal" data-bs-target="#show-followings-{{ $profile->id }}"><span class="fw-bold">{{ $profile->followings->count() }}</span> Following</a> --}}

            <a href="{{ route('profile.follower', $profile->id) }}" class="me-3 text-black"><span class="fw-bold">{{ $profile->followers->count() }}</span> Follower</a>
            <a href="{{ route('profile.following', $profile->id) }}" class="text-black"><span class="fw-bold">{{ $profile->followings->count() }}</span> Following</a>
        </div>
        @if ($profile->id === Auth::user()->id)
            <a href="{{ route('profile.edit') }}" class="btn btn-outline-secondary d-block w-25 ms-auto"><i class="fa-solid fa-gear"></i></a>
        @else
            @if ($profile->isFollowed()) {{-- check if the user is followed or not このユーザーをフォローしている人の中に自分がいるかを判定 --}}
                <form action="{{ route('unfollow', $profile->id) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger mt-4">Unfollow</button>
                </form>
            @else
                <form action="{{ route('follow', $profile->id) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-outline-primary mt-4">Follow</button>
                </form>
            @endif
        @endif
    </div>
</div>

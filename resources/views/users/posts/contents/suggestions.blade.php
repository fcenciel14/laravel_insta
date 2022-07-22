<p class="text-muted">Suggestions for you</p>
<ul class="list-group list-group-flush">
    @foreach ($users as $user)
        @if (!$user->isFollowed() && $user->id !== Auth::user()->id)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    @if ($user->avatar)
                        <img src="{{ asset('storage/avatars/' . $user->avatar) }}" alt="Avatar" class="profile-img">
                    @else
                        <i class="fa-solid fa-circle-user text-secondary user-icon align-bottom fa-2x"></i>
                    @endif
                    <a href="{{ route('profile.show', $user->id) }}" class="text-decoration-none text-black ms-2">{{ $user->name }}</a>
                </div>
                <form action="{{ route('follow', $user->id) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-sm text-primary">Follow</button>
                </form>
            </li>
        @endif
    @endforeach
</ul>
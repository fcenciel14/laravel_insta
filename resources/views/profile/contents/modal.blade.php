<div class="modal fade" id="show-followers-{{ $profile->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Followers
                </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    @foreach ($profile->followers as $follower)
                        <li class="list-group-item"><a href="{{ route('profile.show', $follower->getFollower->id) }}">{{ $follower->getFollower->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="show-followings-{{ $profile->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Followings
                </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    @foreach ($profile->followings as $following)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="{{ route('profile.show', $following->getFollowing->id) }}">{{ $following->getFollowing->name }}</a>
                            <form action="{{ route('unfollow', $following->getFollowing->id) }}" method="post" class="m-0">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-danger">Unfollow</button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
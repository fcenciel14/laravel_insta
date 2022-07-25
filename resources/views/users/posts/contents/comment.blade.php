<div class="card-footer py-4">
    @if ($post->comments->isNotEmpty())
        <hr>
        @foreach ($post->comments->take(3) as $comment)
                <div class="bg-white mb-2 p-2 rounded border comment">
                    <a href="" class="text-decoration-none text-dark fw-bold">{{ $comment->user->name }}</a>
                    <p class="m-0 fw-light">{{ $comment->body }}</p>
                    <div class="row">
                        <div class="col">
                            <p class="text-muted m-0">{{ date("D, M d Y", strtotime($comment->created_at)) }}</p>
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
    @if ($post->comments->count() > 3)
        <a href="{{ route('post.show', $post->id) }}" class="text-decoration-none">View all comments ({{ $post->comments->count() }})</a>
    @endif
    <form action="{{ route('comment.store', $post->id) }}" method="post" class="mt-3">
        @csrf
        <div class="input-group">
            <textarea name="comment" id="comment" cols="30" rows="1" class="form-control form-control-sm" placeholder="Add a comment..."></textarea>
            <button type="submit" class="btn btn-sm btn-outline-secondary">Post</button>
        </div>
        @error('comment')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </form>

</div>
<div class="container p-0">
    <a href="{{ route('post.show', $post->id) }}">
        <img src="{{ asset('/storage/images/' . $post->image) }}" alt="" class="w-100">
    </a>
</div>

<div class="card-body py-2 px-3">
    <div class="my-1 align-items-center">
        @if ($post->is_liked())
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

    <a href="" class="text-decoration-none text-dark fw-bold">{{ $post->user->name }}</a>
    &nbsp; <p class="d-inline fw-light">{{ $post->description }}</p>

    <div class="my-2 text-start">
        @foreach ($post->categoryPost as $category_post)
            <div class="badge bg-secondary bg-opacity-50">
                #{{ $category_post->category->name }}
            </div>
        @endforeach
    </div>
</div>

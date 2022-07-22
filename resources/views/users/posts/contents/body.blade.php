<div class="container p-0">
    <a href="{{ route('post.show', $post->id) }}">
        <img src="{{ asset('/storage/images/' . $post->image) }}" alt="" class="w-100">
    </a>
</div>

<div class="card-body">
    <div class="my-2 align-items-center">
        @if ($post->is_liked())
            <form action="{{ route('post.unlike', $post->id) }}" method="post">
                @csrf
                <button type="submit" class="btn btn-sm shadow-none ps-0">
                    <i class="fa-solid fa-heart text-danger fa-2x"></i>
                </button>
                <span>{{ $post->likes->count() }}</span>
            </form>
        @else
            <form action="{{ route('post.like', $post->id) }}" method="post">
                @csrf
                <button type="submit" class="btn btn-sm shadow-none ps-0">
                    <i class="fa-regular fa-heart fa-2x"></i>
                </button>
                <span>{{ $post->likes->count() }}</span>
            </form>
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

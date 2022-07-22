@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    <form action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label class="form-label fw-bold">Category <span class="text-muted fw-normal">(Up to 3)</span></label>
            <div>
                @foreach ($categories as $category)
                    @if (in_array($category->id, $selected_categories))
                        <div class="form-check form-check-inline">
                            <input type="checkbox" name="categories[]" id="{{ $category->name }}" class="form-check-input" value="{{ $category->id }}" checked>
                            <label for="{{ $category->name }}" class="me-2">{{ $category->name }}</label>
                        </div>
                    @else
                        <div class="form-check form-check-inline">
                            <input type="checkbox" name="categories[]" id="{{ $category->name }}" class="form-check-input" value="{{ $category->id }}">
                            <label for="{{ $category->name }}" class="me-2">{{ $category->name }}</label>
                        </div>
                    @endif
                @endforeach
            </div>
            @error('categories')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label fw-bold">Description</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="What's on you mind?">{{ old('description') ?? $post->description }}</textarea>
            @error('description')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <img src="{{ asset('/storage/images/' . $post->image) }}" alt="{{ $post->image }}" style="height: 150px; width: 150px;" class="img-thumbnail mb-3">
            <label for="image" class="form-label fw-bold d-block">Image</label>
            <input type="file" name="image" id="image" class="form-control">
            <div class="form-text">
                Acceptable formats: jpeg, jpg, gif only <br>
                Max file size is 1048KB
            </div>
            @error('image')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary px-5">Post</button>
    </form>
@endsection
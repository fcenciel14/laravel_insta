@extends('layouts.app')

@section('title', 'Create post')

@section('content')
    <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label fw-bold">Category <span class="text-muted fw-normal">(Up to 3)</span></label>
            <div>
                @foreach ($categories as $category)
                    <input type="checkbox" name="categories[]" id="{{ $category->name }}" class="form-check-input" value="{{ $category->id }}">
                    <label for="{{ $category->name }}" class="me-2">{{ $category->name }}</label>
                @endforeach
            </div>
            @error('categories')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label fw-bold">Description</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="What's on you mind?"></textarea>
            @error('description')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label fw-bold d-block">Image</label>
            <input type="file" name="image" id="image" class="form-control">
            <div class="form-text">
                Acceptable formats: jpeg, jpg, gif only <br>
                Max file size is 2048KB
            </div>
            @error('image')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary px-5">Post</button>
    </form>
@endsection
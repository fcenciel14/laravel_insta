@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
    <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label class="form-label fw-bold" for="avatar">Profile Picture</label>
            <div class="row">
                <div class="col-4 text-center">
                    @if ($profile->avatar)
                        <img src="{{ asset('storage/avatars/' . $profile->avatar) }}" alt="Avatar" class="profile-img mb-3">
                    @else
                        <i class="fa-solid fa-circle-user text-muted fa-10x mb-3"></i>
                    @endif
                    <input type="file" name="avatar" id="avatar" class="form-control">
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label fw-bold d-block">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $profile->name }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label fw-bold d-block">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $profile->email }}" required>
        </div>

        <div class="mb-3">
            <label for="introduction" class="form-label fw-bold">Introduction</label>
            <textarea name="introduction" id="introduction" cols="30" rows="10" class="form-control" placeholder="What kind of person?">{{ $profile->introduction }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary d-block w-100">Save</button>
    </form>
@endsection
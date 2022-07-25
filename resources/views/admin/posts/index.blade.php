@extends('layouts.app')

@section('title', 'Admin Posts')

@section('content')
    <table class="table table-hover align-middle bg-white border text-secondary">
        <thead class="small table-primary text-secondary">
            <th></th>
            <th></th>
            <th>Category</th>
            <th>Owner</th>
            <th>Created at</th>
            <th>Status</th>
            <th></th>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td class="text-center">
                        {{ $post->id }}
                    </td>
                    <td class="text-center">
                        <a href="{{ route('post.show', $post->id) }}">
                            <img src="{{ asset('storage/images/' . $post->image) }}" alt="Post Image" class="admin-post-img">
                        </a>
                    </td>
                    <td>
                        @foreach ($post->categoryPost as $category_post)
                            <div class="badge bg-secondary bg-opacity-50">
                                #{{ $category_post->category->name }}
                            </div>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('profile.show', $post->user->id) }}" class="text-decoration-none text-primary fw-bold">{{ $post->user->name }}</a>
                    </td>
                    <td>
                        {{ $post->created_at }}
                    </td>
                    <td>
                        @if ($post->trashed())
                            <i class="fa-solid fa-circle text-secondary"></i> &nbsp;Hidden
                        @else
                            <i class="fa-solid fa-circle text-primary"></i> &nbsp;Visible
                        @endif
                    </td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-sm" data-bs-toggle="dropdown">
                                <i class="fa-solid fa-ellipsis"></i>
                            </button>

                            @if ($post->trashed())
                                <div class="dropdown-menu">
                                    <button type="button" class="dropdown-item text-primary" data-bs-toggle="modal" data-bs-target="#display-post-{{ $post->id }}">
                                        <i class="fa-solid fa-eye"></i>Display Post-{{ $post->id }}
                                    </button>

                                </div>
                            @else
                                <div class="dropdown-menu">
                                    <button type="button" class="dropdown-item text-secondary" data-bs-toggle="modal" data-bs-target="#hide-post-{{ $post->id }}">
                                        <i class="fa-solid fa-eye-slash"></i>Hide Post-{{ $post->id }}
                                    </button>

                                </div>
                            @endif
                        </div>
                    </td>
                </tr>

                @include('admin.posts.modals.status')
            @endforeach
        </tbody>
    </table>
@endsection
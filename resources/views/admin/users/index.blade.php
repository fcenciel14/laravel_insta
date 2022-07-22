@extends('layouts.app')

@section('title', 'Admin Users')

@section('content')
    <table class="table table-hover align-middle bg-white border text-secondary">
        <thead class="small table-success text-secondary">
            <th></th>
            <th>Name</th>
            <th>Email</th>
            <th>Created at</th>
            <th>Status</th>
            <th></th>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td class="text-center">
                        @if ($user->avatar)
                            <img src="{{ asset('storage/avatars/' . $user->avatar) }}" alt="Avatar" class="profile-img">
                        @else
                            <i class="fa-solid fa-circle-user text-secondary user-icon align-bottom fa-2x"></i>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('profile.show', $user->id) }}" class="text-decoration-none text-dark fw-bold">{{ $user->name }}</a>
                    </td>
                    <td>
                        {{ $user->email }}
                    </td>
                    <td>
                        {{ $user->created_at }}
                    </td>
                    <td>
                        @if ($user->trashed())
                            <i class="fa-solid fa-circle text-danger"></i> &nbsp;Deactivated
                        @else
                            <i class="fa-solid fa-circle text-success"></i> &nbsp;Active
                        @endif
                    </td>
                    <td>
                        @if (Auth::user()->id !== $user->id)
                            <div class="dropdown">
                                <!-- Button trigger modal -->
                                @if ($user->trashed())
                                    <button class="btn btn-sm" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>

                                    <div class="dropdown-menu">
                                        <button type="button" class="dropdown-item text-success" data-bs-toggle="modal" data-bs-target="#activate-user-{{ $user->id }}">
                                            <i class="fa-solid fa-user-check"></i>Activate {{ $user->name }}
                                        </button>
                                    </div>
                                @else
                                    <button class="btn btn-sm" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>

                                    <div class="dropdown-menu">
                                        <button type="button" class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#deactivate-user-{{ $user->id }}">
                                            <i class="fa-solid fa-user-slash"></i>Deactivate {{ $user->name }}
                                        </button>
                                    </div>
                                @endif
                            </div>
                        @endif
                    </td>
                </tr>

                @include('admin.users.modals.status')
            @endforeach
        </tbody>
    </table>
@endsection


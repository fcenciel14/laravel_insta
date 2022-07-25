@extends('layouts.app')

@section('title', 'Admin Categories')

@section('content')
    <table class="table table-hover align-middle bg-white border text-secondary">
        <thead class="small table-warning text-secondary">
            <th></th>
            <th>Name</th>
            <th>Created at</th>
            <th></th>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td class="text-center">
                        {{ $category->id }}
                    </td>
                    <td class="fw-bold">
                        {{ $category->name }}
                    </td>
                    <td>
                        {{ $category->created_at }}
                    </td>
                    <td>
                        <form action="{{ route('admin.categories.delete', $category->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger"><i class="fa-solid fa-trash-can"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-end">
        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#create-category">
            <i class="fa-solid fa-plus"></i>New Category
        </button>
        @error('category')
            <small class="text-danger d-block mt-2">{{ $message }}</small>
        @enderror
    </div>

    @include('admin.categories.modals.create')

@endsection


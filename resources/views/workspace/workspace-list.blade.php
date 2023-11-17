@extends('layout.default_layout')

@section('title', 'Workspace List')

@section('content')
    <h2 class="text-center">Workspace Create</h2>
    <form class="w-50 m-auto d-flex flex-column gap-3 my-4" action="{{ route('workspace.store') }}" method="POST">
        @csrf
        @method('post')
        <div class="form-group">
            <input name="title" class="form-control" type="text" placeholder="Title">
        </div>
        <div class="form-group">
            <input name="description" class="form-control" type="text" placeholder="Description">
        </div>
        <button type="submit" class="btn btn-dark">
            Create Workspace
        </button>
        @if(session()->has('message'))
            <span class="alert alert-success">
                {{ session()->get('message') }}
            </span>
        @endif
    </form>
    <h2 class="text-center">Workspace List</h2>
    <table class="m-auto w-75 bg-light rounded-top-4 bg-secondary">
        <thead>
            <tr class="border-bottom">
                <th class="p-2">Title</th>
                <th class="p-2">Description</th>
                <th class="p-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($workspaces AS $workspace)
            <tr>
                    <td class="p-2">
                        {{ $workspace->title }}
                    </td>
                    <td class="p-2">
                        {{ $workspace->description }}
                    </td>
                    <td class="p-2">
                        <a href="{{ route('workspace.edit', $workspace->id) }}" class="btn btn-dark">
                            Edit
                        </a>
                    </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection

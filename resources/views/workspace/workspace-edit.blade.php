@extends('layout.workspace-edit-nav')

@section('title', 'Workspace Edit')
@section('workspace-id', $workspace->id)
@section('workspace-title', $workspace->title)

@section('content')
    <h2 class="text-black text-center">
        Edit workspace
    </h2>
    <form class="w-50 m-auto d-flex flex-column gap-3 my-4" action="{{ route('workspace.update', $workspaceId) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <input name="title" value="{{ $workspace->title }}" class="form-control" type="text" placeholder="Title">
        </div>
        <div class="form-group">
            <input name="description" value="{{ $workspace->description }}" class="form-control" type="text" placeholder="Description">
        </div>
        <button type="submit" class="btn btn-dark">
            Save
        </button>
        @if(session()->has('message'))
            <span class="alert alert-success">
                {{ session()->get('message') }}
            </span>
        @endif
    </form>
@endsection

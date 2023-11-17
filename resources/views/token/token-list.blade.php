@extends('layout.workspace-edit-nav')

@section('title', 'ApiToken List')

@section('workspace-title', $workspace->title)

@section('content')
    <h2 class="text-center">Token Create</h2>
    <form class="w-50 m-auto d-flex flex-column gap-3 my-4" action="{{ route('workspace.token.store', $workspaceId) }}" method="POST">
        @csrf
        @method('post')
        <div class="form-group">
            <input name="name" class="form-control" type="text" placeholder="Title">
        </div>
        <button type="submit" class="btn btn-dark">
            Create Token
        </button>
        @if(session()->has('message'))
            <span class="alert alert-success">
                {{ session()->get('message') }}
            </span>
        @endif
    </form>
    <h2 class="text-center">
        Token list
    </h2>
    <table class="m-auto w-75 bg-light rounded-top-4 bg-secondary">
        <thead>
        <tr class="border-bottom">
            <th class="p-2">Name</th>
            <th class="p-2">Revoked at</th>
            <th class="p-2">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tokens AS $token)
            @if($token->revoked_at)
                <tr class="bg-primary-subtle opacity-50 text-body-secondary border">
                    <td class="p-2">
                        {{ $token->name }}
                    </td>
                    <td class="p-2">
                            <span>{{ $token->revoked_at }}</span>
                    </td>
                    <td class="p-2">
                        <a href="{{ route('workspace.edit', $workspace->id) }}" class="btn btn-dark disabled">
                            Revoke
                        </a>
                    </td>
                </tr>
                @else
                <tr class="bg-primary text-white border">
                    <td class="p-2">
                        {{ $token->name }}
                    </td>
                    <td class="p-2">
                        <span>{{ $token->revoked_at }}</span>
                    </td>
                    <td class="p-2">
                        <form action="{{ route('workspace.token.destroy', [$workspace->id, $token->id]) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-dark">
                                Revoke
                            </button>
                        </form>
                    </td>
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>
@endsection

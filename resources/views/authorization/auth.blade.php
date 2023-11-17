@extends('layout.centered_layout')

@section('title', 'Login')

@section('content')
    <form
        action="{{ route('login.store') }}"
        method="POST"
        class="login-form mx-2 bg-white shadow rounded p-5 d-flex flex-column gap-5"
    >
        @csrf
        <h2>Welcome</h2>
        <div class="d-flex flex-column gap-3">
            <div class="form-group">
                <input
                    name="username"
                    type="text"
                    class="p-1 w-100 border-0 border-bottom"
                    placeholder="Username"
                >
                @error('username')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <input
                    name="password"
                    type="password"
                    class="p-1 w-100 border-0 border-bottom"
                    placeholder="Password"
                >
                @error('password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <button
            class="btn btn-outline-primary"
        >
            Login
        </button>
        @if($errors->any())
            <span class="text-danger">{{ implode('', $errors->all(':message')) }}</span>
        @endif
    </form>
@endsection

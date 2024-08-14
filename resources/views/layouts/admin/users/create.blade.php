@extends('layouts.admin')

@section('title', isset($user) ? 'Edit User' : 'Create User')

@section('content')

<div class="container mt-5">
    <h2 class="mb-4">{{ isset($user) ? 'Edit User' : 'Create User' }}</h2>

    <form action="{{ isset($user) ? route('admin.users.update', $user->id) : route('admin.users.store') }}"
        method="POST">
        @csrf

        @if (isset($user))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name"
                value="{{ old('name', isset($user) ? $user->name : '') }}" required>
            @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email"
                value="{{ old('email', isset($user) ? $user->email : '') }}" required>
            @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for="role">Role</label>
            <select class="form-control" id="role" name="role">
                @if (auth()->user()->isAdmin())
                    <option value="admin" {{ old('role', isset($user) ? $user->role : '') == 'admin' ? 'selected' : '' }}>
                        Admin
                    </option>
                    <option value="author" {{ old('role', isset($user) ? $user->role : '') == 'author' ? 'selected' : '' }}>
                        Author
                    </option>
                    <option value="user" {{ old('role', isset($user) ? $user->role : '') == 'user' ? 'selected' : '' }}>
                        User
                    </option>
                @else
                    <option value="author" {{ old('role', isset($user) ? $user->role : '') == 'author' ? 'selected' : '' }}>
                        Author
                    </option>
                @endif
            </select>
            @if ($errors->has('role'))
                <span class="text-danger">{{ $errors->first('role') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
            @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            @if ($errors->has('password_confirmation'))
                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">
            {{ isset($user) ? 'Update User' : 'Create User' }}
        </button>
    </form>
</div>

@endsection
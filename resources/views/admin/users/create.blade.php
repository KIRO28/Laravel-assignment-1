<!-- resources/views/admin/users/form.blade.php -->
@extends('admin')

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
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email"
                value="{{ old('email', isset($user) ? $user->email : '') }}" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}">
            @if (isset($user))
                <small class="form-text text-muted">Leave blank to keep current password.</small>
            @endif
        </div>

        <div class="form-group">
            <label for="is_admin">Admin</label>
            <select class="form-control" id="is_admin" name="is_admin" required>
                <option value="0" {{ old('is_admin', isset($user) ? $user->is_admin : 0) == 0 ? 'selected' : '' }}>No
                </option>
                <option value="1" {{ old('is_admin', isset($user) ? $user->is_admin : 0) == 1 ? 'selected' : '' }}>Yes
                </option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">{{ isset($user) ? 'Update User' : 'Create User' }}</button>
    </form>
</div>

@endsection
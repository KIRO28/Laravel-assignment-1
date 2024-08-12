@extends('layouts.app')

@section('title', 'Blog Posts')

@section('content')

<div class="container mt-5">
    <h2 class="mb-4">Blog Posts</h2>
    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary mb-3">Create New Blog Post</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Description</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->Author }}</td>
                    <td>{{ $post->Description }}</td>
                    <td>{{ $post->Date }}</td>
                    <td>
                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
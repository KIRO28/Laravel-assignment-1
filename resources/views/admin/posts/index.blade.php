<!-- resources/views/admin/posts/index.blade.php -->
@extends('admin')

@section('title', 'Blog Posts')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Blog Posts</h2>
    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary mb-3">Add New Post</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Description</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->Author }}</td>
                    <td>{{ $post->Description }}</td>
                    <td>{{ $post->Date }}</td>
                    <td>
                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No blog posts found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
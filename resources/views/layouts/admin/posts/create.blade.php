@extends('layouts.admin')

@section('title', isset($post) ? 'Edit Blog Post' : 'Create Blog Post')

@section('content')

<div class="container mt-5">
    <h2 class="mb-4">{{ isset($post) ? 'Edit Blog Post' : 'Create Blog Post' }}</h2>
    <form action="{{ isset($post) ? route('admin.posts.update', $post->id) : route('admin.posts.store') }}"
        method="POST">
        @csrf

        @if (isset($post))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title"
                value="{{ old('title', isset($post) ? $post->title : '') }}" required>
        </div>

        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" class="form-control" id="author" name="author"
                value="{{ old('author', isset($post) ? $post->Author : '') }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="4"
                required>{{ old('description', isset($post) ? $post->Description : '') }}</textarea>
        </div>

        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" class="form-control" id="date" name="date"
                value="{{ old('date', isset($post) ? $post->Date : '') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">{{ isset($post) ? 'Update Post' : 'Create Post' }}</button>
    </form>
</div>

@endsection
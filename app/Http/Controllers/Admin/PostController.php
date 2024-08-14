<?php

namespace App\Http\Controllers\Admin;

use App\Models\BlogModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Ensure only admins can access these routes
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the blog posts.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = BlogModel::all(); // Fetch all blog posts
        return view('layouts.admin.posts.index', compact('posts')); // Pass posts to the index view
    }

    /**
     * Show the form for creating a new blog post.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        return view('layouts.admin.posts.create'); // Return the view to create a new blog post
    }

    /**
     * Store a newly created blog post in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
        ]);

        BlogModel::create($request->all()); // Create a new blog post
        return redirect()->route('layouts.admin.posts.index')->with('success', 'Blog post created successfully.');
    }

    /**
     * Show the form for editing the specified blog post.
     *
     * @param  \App\Models\BlogModel  $post
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(BlogModel $post)
    {
        return view('layouts.admin.posts.edit', compact('post')); // Return the view to edit a blog post
    }

    /**
     * Update the specified blog post in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogModel  $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, BlogModel $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
        ]);

        $post->update($request->all()); // Update the blog post
        return redirect()->route('layouts.admin.posts.index')->with('success', 'Blog post updated successfully.');
    }

    /**
     * Remove the specified blog post from storage.
     *
     * @param  \App\Models\BlogModel  $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(BlogModel $post)
    {
        $post->delete(); // Delete the blog post
        return redirect()->route('layouts.admin.posts.index')->with('success', 'Blog post deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\BlogModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * Show the form for creating a new blog post or editing an existing one.
     *
     * @param  \App\Models\BlogModel|null  $post
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create(BlogModel $post = null)
    {
        return view('layouts.admin.posts.create', compact('post')); // Return the view to create or edit a blog post
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

        BlogModel::create([
            'title' => $request->title,
            'Author' => $request->author,
            'Description' => $request->description,
            'Date' => $request->date,
            'user_id' => Auth::id(), // Associate the post with the currently authenticated user
        ]);
        return redirect()->route('admin.posts.index')->with('success', 'Blog post created successfully.');
    }

    public function edit($id)
    {
        $post = BlogModel::findOrFail($id); // Find the blog post by ID or fail if not found
        return view('layouts.admin.posts.create', compact('post')); // Return the view for editing, passing the post data
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

        $post->update([
            'title' => $request->title,
            'Author' => $request->author,
            'Description' => $request->description,
            'Date' => $request->date,
        ]);
        return redirect()->route('admin.posts.index')->with('success', 'Blog post updated successfully.');
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
        return redirect()->route('admin.posts.index')->with('success', 'Blog post deleted successfully.');
    }
}

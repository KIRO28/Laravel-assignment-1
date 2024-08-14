<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogModel;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    // Display the initial page (i.e., show page) with posts specific to the logged-in user.
    public function index()
    {
        $user = Auth::user();

        if ($user->isAdmin()) {
            $posts = BlogModel::all(); // Admin can see all posts
        } else {
            $posts = BlogModel::where('user_id', $user->id)->get(); // Non-admins can see only their posts
        }

        return view('show', compact('posts'));
    }

    // Display the create page.
    public function create()
    {
        return view('create');
    }

    // Store the user input in the database.
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'date' => 'required|date',
        ]);

        BlogModel::create([
            'title' => $request->title,
            'Author' => $request->author,
            'Description' => $request->description,
            'Date' => $request->date,
            'user_id' => Auth::id(), // Associate the post with the currently authenticated user
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    // Edit the blogs.
    public function edit($id)
    {
        $post = BlogModel::findOrFail($id);

        // Ensure that only the owner or an admin can edit the post
        if (Auth::user()->id !== $post->user_id && !Auth::user()->isAdmin()) {
            return redirect()->route('posts.index')->with('error', 'You do not have permission to edit this post.');
        }

        return view('create', compact('post'));
    }

    // Update the blogs.
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'date' => 'required|date',
        ]);

        $post = BlogModel::findOrFail($id);

        // Ensure that only the owner or an admin can update the post
        if (Auth::user()->id !== $post->user_id && !Auth::user()->isAdmin()) {
            return redirect()->route('posts.index')->with('error', 'You do not have permission to update this post.');
        }

        $post->update([
            'title' => $request->title,
            'Author' => $request->author,
            'Description' => $request->description,
            'Date' => $request->date,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    // Delete the blogs.
    public function destroy($id)
    {
        $post = BlogModel::findOrFail($id);

        // Ensure that only the owner or an admin can delete the post
        if (Auth::user()->id !== $post->user_id && !Auth::user()->isAdmin()) {
            return redirect()->route('posts.index')->with('error', 'You do not have permission to delete this post.');
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}

<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogModel;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{

    // new functions 
    public function page()
    {
        try {
            return response()->json(BlogModel::all());
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    // public function detail($id)
    // {
    //     try {
    //         return response()->json(BlogModel::findOrFail($id));
    //     } catch (\Exception $e) {
    //         return response()->json(['error' => $e->getMessage()], 500);
    //     }
    // }




    // Display the initial page (i.e., show page) with posts specific to the logged-in user.
    public function index()
    {
        $user = Auth::user();

        // If the user is not authenticated, redirect to the login page
        if (!$user) {
            return redirect()->route('login');
        }

        // If the user is an admin, redirect back
        if ($user->isAdmin()) {
            return redirect()->route('admin.dashboard')->with('error', 'Admins are not allowed to view user or author page.');
        }

        // If the user is a regular user or author, allow them to see their own posts
        if ($user->isUser() || $user->isAuthor()) {
            $posts = BlogModel::where('user_id', $user->id)->get(); // Non-admins can see only their posts
        } else {
            // Optional: Handle other roles or cases where no role matches
            return redirect()->back()->with('error', 'You are not allowed to view this page.');
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

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to create a post.');
        }

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
        if (!Auth::check() || (Auth::user()->id !== $post->user_id && !Auth::user()->isAdmin())) {
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
        if (!Auth::check() || (Auth::user()->id !== $post->user_id && !Auth::user()->isAdmin())) {
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
        if (!Auth::check() || (Auth::user()->id !== $post->user_id && !Auth::user()->isAdmin())) {
            return redirect()->route('posts.index')->with('error', 'You do not have permission to delete this post.');
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}

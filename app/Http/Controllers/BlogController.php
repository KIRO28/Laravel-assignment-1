<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogModel;

class BlogController extends Controller
{
    // it displays initial page i.e. show page.
    public function index()
    {
        $posts = BlogModel::all();
        return view('show', compact('posts'));
    }

    // it display create page.
    public function create()
    {
        return view('create');
    }

    // it store the user input in the databsae.
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
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }


    // this function is to edit the blogs
    public function edit($id)
    {
        // it is to find the BlogModel with the given $id
        $post = BlogModel::findOrFail($id);
        return view('create', compact('post'));
    }

    // this function is to update the blogs 
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'date' => 'required|date',
        ]);

        $post = BlogModel::findOrFail($id);
        $post->update([
            'title' => $request->title,
            'Author' => $request->author,
            'Description' => $request->description,
            'Date' => $request->date,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }


    // this function is to delete the blogs
    public function destroy($id)
    {
        $post = BlogModel::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }


}

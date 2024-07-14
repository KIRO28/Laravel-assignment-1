<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogModel;

class BlogController extends Controller
{
    public function index()
    {
        $posts = BlogModel::all();
        return view('show', compact('posts'));
    }

    public function create()
    {
        return view('create');
    }

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

    public function edit($id)
    {
        $post = BlogModel::findOrFail($id);
        return view('create', compact('post'));
    }

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

    public function destroy($id)
    {
        $post = BlogModel::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }


}

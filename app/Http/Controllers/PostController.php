<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::where('status', 1)->latest()->get();
        $topics = Topic::all(); 
        return view('posts.index', compact('posts', 'topics'));
    }

    public function dashboard() {
        return view('posts.dashboard');
    }

    public function manageposts() {
        $posts = Post::paginate(10);
        return view('posts.manageposts', compact('posts'));
    }

    public function create() {
        $topics = Topic::all();
        return view('posts.create', data: compact('topics'));
    }
   

    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'topic_id' => 'required',
            'featuredImage' => 'nullable|image',
            'content' => 'required',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->author = $request->author;
        $post->topic_id = $request->topic_id;
        $post->status = $request->has('status') ? 1 : 0;
        $post->content = $request->content;

        if ($request->hasFile('featuredImage')) {
            $post->featuredImage = file_get_contents($request->file('featuredImage'));
        }

        $post->save();

        return redirect()->route('posts.manageposts')->with('success', 'Post created successfully.');
    }

    public function show($id)
    {
        $post = Post::with('topic')->findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function edit($id) {
        $post = Post::findOrFail($id);
        $topics = Topic::all();
        return view('posts.edit', compact('post', 'topics'));
    }

    public function update(Request $request, $id) {
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->author = $request->author;
        $post->topic_id = $request->topic_id;
        $post->status = $request->has('status') ? 1 : 0;
        $post->content = $request->content;

        if ($request->hasFile('featuredImage')) {
            $post->featuredImage = file_get_contents($request->file('featuredImage'));
        }

        $post->save();

        return redirect()->route('posts.manageposts')->with('success', 'Post updated successfully.');
    }

    public function destroy($id) {
        Post::destroy($id);
        return redirect()->route('posts.manageposts')->with('success', 'Post deleted.');
    }
    public function filterByTopic($id)
{
    $posts = Post::with('topic')->where('topic_id', $id)->latest()->get();
    $topics = Topic::all();
    $activeTopic = Topic::find($id);

    return view('posts.index', compact('posts', 'topics', 'activeTopic'));
}
    
}
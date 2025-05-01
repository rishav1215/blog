<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function index()
    {
        $topics = Topic::all();
        return view('topics.index', compact('topics'));
    }

    public function create()
    {
        return view('topics.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'topic_name' => 'required|string|max:255|unique:topics',
            'description' => 'nullable|string|max:500',
        ]);
    
        Topic::create([
            'topic_name' => $request->topic_name,
            'description' => $request->description
        ]);
    
        return redirect()->route('topics.index')->with('success', 'Topic created successfully.');
    }
    public function edit(Topic $topic)
{
    return view('topics.edit', compact('topic'));
}

public function update(Request $request, Topic $topic)
{
    $request->validate([
        'topic_name' => 'required|string|max:255|unique:topics,topic_name,'.$topic->id,
        'description' => 'nullable|string|max:500',
    ]);

    $topic->update($request->all());
    
    return redirect()->route('topics.index')
                    ->with('success', 'Topic updated successfully');
}

public function destroy(Topic $topic)
{
    $topic->delete();
    
    return redirect()->route('topics.index')
                    ->with('success', 'Topic deleted successfully');
}
}
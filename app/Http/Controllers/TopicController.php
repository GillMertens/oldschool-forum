<?php

namespace App\Http\Controllers;

use App\Models\ReactionEmoji;
use App\Models\Topic;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;

class TopicController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        if (Auth::check()) {
            // If the user is authenticated, create a new topic
            $topic = new Topic;
            $topic->title = $request->title;
            $topic->body = $request->body;
            $topic->category_id = $request->category_id;
            $topic->user_id = auth()->id();
            $topic->save();

            return redirect()->route('topics.show', $topic);
        } else {
            // If the user is not authenticated, save the topic data in the session and redirect to the login page
            Session::put('topic_data', $request->only(['title', 'body', 'category_id']));
            return redirect()->route('login');
        }
    }

    public function show(Topic $topic)
    {
        $reactionEmojis = ReactionEmoji::all();
        return view('topics.show', ['topic' => $topic, 'reactionEmojis' => $reactionEmojis]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // Other methods...

    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required',
            'topic_id' => 'required|exists:topics,id',
            'comment_id' => 'nullable|exists:comments,id',
        ]);

        $comment = new Comment;
        $comment->body = $request->body;
        $comment->topic_id = $request->topic_id;
        $comment->comment_id = $request->comment_id;
        $comment->user_id = auth()->id();
        $comment->save();

        return redirect()->route('topics.show', $comment->topic->slug);
    }
}

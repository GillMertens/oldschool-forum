<?php

namespace Database\Factories;

use App\Models\Reaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReactionFactory extends Factory
{
    protected $model = Reaction::class;

    public function definition()
    {
        $topic_id = null;
        $comment_id = null;

        // Randomly decide whether the reaction is for a comment or a topic
        if (rand(0, 1) === 0 && \App\Models\Comment::exists()) {
            // The reaction is for a comment
            $comment_id = \App\Models\Comment::pluck('id')->random();
        } elseif (\App\Models\Topic::exists()) {
            // The reaction is for a topic
            $topic_id = \App\Models\Topic::pluck('id')->random();
        }

        return [
            'reaction_emoji_id' => \App\Models\ReactionEmoji::pluck('id')->random(),
            'user_id' => \App\Models\User::pluck('id')->random(),
            'comment_id' => $comment_id,
            'topic_id' => $topic_id,
        ];
    }
}

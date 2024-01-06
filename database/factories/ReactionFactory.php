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
            'emoji_code' => $this->faker->randomElement(['1F600', '1F603', '1F604', '1F601', '1F606', '1F605', '1F923']),
            'comment_id' => $comment_id,
            'topic_id' => $topic_id,
            'user_id' => \App\Models\User::pluck('id')->random(),
        ];
    }
}

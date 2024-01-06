<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition()
    {
        return [
            'body' => $this->faker->paragraph,
            'user_id' => \App\Models\User::pluck('id')->random(),
            'topic_id' => \App\Models\Topic::pluck('id')->random(),
        ];
    }

    public function canHaveCommentId()
    {
        return $this->state(function (array $attributes) {
            if (\App\Models\Comment::where('topic_id', $attributes['topic_id'])->exists()) {
                $parent_comment = \App\Models\Comment::where('topic_id', $attributes['topic_id'])->get()->random();
                return [
                    'comment_id' => $parent_comment->id,
                ];
            }

            return []; // Return an empty array if a parent comment does not exist
        });
    }
}

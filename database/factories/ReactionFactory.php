<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Reaction;
use App\Models\ReactionEmoji;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReactionFactory extends Factory
{
    protected $model = Reaction::class;

    public function definition()
    {
        // Fetch all necessary data once
        $userIds = User::pluck('id')->all();
        $topicIds = Topic::pluck('id')->all();
        $commentIds = Comment::pluck('id')->all();
        $reactionEmojiIds = ReactionEmoji::pluck('id')->all();

        // Randomly select reactable_type
        $reactable_type = $this->faker->randomElement(['App\\Models\\Topic', 'App\\Models\\Comment']);

        // Select a random ID based on reactable_type
        $reactable_id = $reactable_type === 'App\\Models\\Topic'
            ? $this->faker->randomElement($topicIds)
            : $this->faker->randomElement($commentIds);

        // Initialize user_id
        $user_id = null;

        // Find a unique combination
        do {
            $user_id = $this->faker->randomElement($userIds);
        } while (Reaction::where('user_id', $user_id)
            ->where('reactable_type', $reactable_type)
            ->where('reactable_id', $reactable_id)
            ->exists());

        return [
            'reaction_emoji_id' => $this->faker->randomElement($reactionEmojiIds),
            'user_id' => $user_id,
            'reactable_type' => $reactable_type,
            'reactable_id' => $reactable_id,
        ];
    }
}

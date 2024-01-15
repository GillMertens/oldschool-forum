<?php

namespace Database\Factories;

use App\Models\ReactionEmoji;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReactionEmojiFactory extends Factory
{
    protected $model = ReactionEmoji::class;

    public function definition()
    {
        return [
            'emoji_code' => $this->faker->randomElement(['1F600', '1F603', '1F604', '1F601', '1F606', '1F605', '1F923']),
        ];
    }
}

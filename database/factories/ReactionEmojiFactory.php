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
            'emoji_code' => $this->faker->randomElement(['U+2764', 'U+1F44D', 'U+1F64F', 'U+1F525', 'U+1F602', 'U+1F614']),
        ];
    }
}

<?php

namespace Database\Seeders;

use App\Models\ReactionEmoji;
use App\Models\Role;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Topic;
use App\Models\Tag;
use App\Models\Comment;
use App\Models\Reaction;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);

        $users = User::factory(10)->create();
        $categories = Category::factory(3)->create();
        Tag::factory(10)->create();
        $topics = Topic::factory(30)->create();


        Comment::factory(10)->create();


        Comment::factory(25)->canHaveCommentId()->create();

        $emojiCodes = ['U+2764', 'U+1F44D', 'U+1F64F', 'U+1F525', 'U+1F602', 'U+1F614'];

        foreach ($emojiCodes as $emojiCode) {
            ReactionEmoji::create(['emoji_code' => $emojiCode]);
        }


        $reactions = [
            ['user_id' => 1, 'reactable_type' => 'App\\Models\\Topic', 'reactable_id' => 1, 'reaction_emoji_id' => 1],
            ['user_id' => 2, 'reactable_type' => 'App\\Models\\Topic', 'reactable_id' => 1, 'reaction_emoji_id' => 2],
            ['user_id' => 3, 'reactable_type' => 'App\\Models\\Topic', 'reactable_id' => 1, 'reaction_emoji_id' => 3],
            ['user_id' => 4, 'reactable_type' => 'App\\Models\\Topic', 'reactable_id' => 1, 'reaction_emoji_id' => 4],
            ['user_id' => 5, 'reactable_type' => 'App\\Models\\Topic', 'reactable_id' => 1, 'reaction_emoji_id' => 5],
            ['user_id' => 6, 'reactable_type' => 'App\\Models\\Topic', 'reactable_id' => 1, 'reaction_emoji_id' => 6],
            ['user_id' => 7, 'reactable_type' => 'App\\Models\\Topic', 'reactable_id' => 1, 'reaction_emoji_id' => 1],
            ['user_id' => 8, 'reactable_type' => 'App\\Models\\Topic', 'reactable_id' => 1, 'reaction_emoji_id' => 2],
            ['user_id' => 9, 'reactable_type' => 'App\\Models\\Topic', 'reactable_id' => 1, 'reaction_emoji_id' => 3],
            ['user_id' => 10, 'reactable_type' => 'App\\Models\\Topic', 'reactable_id' => 1, 'reaction_emoji_id' => 4],
            ['user_id' => 1, 'reactable_type' => 'App\\Models\\Topic', 'reactable_id' => 2, 'reaction_emoji_id' => 5],
            ['user_id' => 2, 'reactable_type' => 'App\\Models\\Topic', 'reactable_id' => 2, 'reaction_emoji_id' => 6],
            ['user_id' => 3, 'reactable_type' => 'App\\Models\\Topic', 'reactable_id' => 2, 'reaction_emoji_id' => 1],
            ['user_id' => 4, 'reactable_type' => 'App\\Models\\Topic', 'reactable_id' => 2, 'reaction_emoji_id' => 2],
            ['user_id' => 5, 'reactable_type' => 'App\\Models\\Topic', 'reactable_id' => 2, 'reaction_emoji_id' => 3],
            ['user_id' => 6, 'reactable_type' => 'App\\Models\\Topic', 'reactable_id' => 2, 'reaction_emoji_id' => 4],
            ['user_id' => 7, 'reactable_type' => 'App\\Models\\Topic', 'reactable_id' => 2, 'reaction_emoji_id' => 5],
            ['user_id' => 8, 'reactable_type' => 'App\\Models\\Topic', 'reactable_id' => 2, 'reaction_emoji_id' => 6],
            ['user_id' => 9, 'reactable_type' => 'App\\Models\\Topic', 'reactable_id' => 2, 'reaction_emoji_id' => 1],
            ['user_id' => 10, 'reactable_type' => 'App\\Models\\Topic', 'reactable_id' => 2, 'reaction_emoji_id' => 2],
            ['user_id' => 1, 'reactable_type' => 'App\\Models\\Topic', 'reactable_id' => 3, 'reaction_emoji_id' => 3],
            ['user_id' => 2, 'reactable_type' => 'App\\Models\\Topic', 'reactable_id' => 3, 'reaction_emoji_id' => 4],
            ['user_id' => 3, 'reactable_type' => 'App\\Models\\Topic', 'reactable_id' => 3, 'reaction_emoji_id' => 5],
            ['user_id' => 4, 'reactable_type' => 'App\\Models\\Topic', 'reactable_id' => 3, 'reaction_emoji_id' => 6],
            ['user_id' => 5, 'reactable_type' => 'App\\Models\\Topic', 'reactable_id' => 3, 'reaction_emoji_id' => 1],
            ['user_id' => 6, 'reactable_type' => 'App\\Models\\Topic', 'reactable_id' => 3, 'reaction_emoji_id' => 2],
            ['user_id' => 7, 'reactable_type' => 'App\\Models\\Topic', 'reactable_id' => 3, 'reaction_emoji_id' => 3],
            ['user_id' => 8, 'reactable_type' => 'App\\Models\\Topic', 'reactable_id' => 3, 'reaction_emoji_id' => 4],
            ['user_id' => 9, 'reactable_type' => 'App\\Models\\Topic', 'reactable_id' => 3, 'reaction_emoji_id' => 5],
            ['user_id' => 10, 'reactable_type' => 'App\\Models\\Topic', 'reactable_id' => 3, 'reaction_emoji_id' => 6],
            ['user_id' => 1, 'reactable_type' => 'App\\Models\\Topic', 'reactable_id' => 4, 'reaction_emoji_id' => 1],
            ['user_id' => 2, 'reactable_type' => 'App\\Models\\Topic', 'reactable_id' => 4, 'reaction_emoji_id' => 2],
            ['user_id' => 3, 'reactable_type' => 'App\\Models\\Topic', 'reactable_id' => 4, 'reaction_emoji_id' => 3],
            ['user_id' => 4, 'reactable_type' => 'App\\Models\\Topic', 'reactable_id' => 4, 'reaction_emoji_id' => 4],
            ['user_id' => 5, 'reactable_type' => 'App\\Models\\Topic', 'reactable_id' => 4, 'reaction_emoji_id' => 5],
            ['user_id' => 6, 'reactable_type' => 'App\\Models\\Topic', 'reactable_id' => 4, 'reaction_emoji_id' => 6],
            ['user_id' => 7, 'reactable_type' => 'App\\Models\\Topic', 'reactable_id' => 4, 'reaction_emoji_id' => 1],
            ['user_id' => 8, 'reactable_type' => 'App\\Models\\Topic', 'reactable_id' => 4, 'reaction_emoji_id' => 2],
            ['user_id' => 9, 'reactable_type' => 'App\\Models\\Topic', 'reactable_id' => 4, 'reaction_emoji_id' => 3],
            ['user_id' => 10, 'reactable_type' => 'App\\Models\\Topic', 'reactable_id' => 4, 'reaction_emoji_id' => 4],
            ['user_id' => 1, 'reactable_type' => 'App\\Models\\Topic', 'reactable_id' => 5, 'reaction_emoji_id' => 5],
            ['user_id' => 2, 'reactable_type' => 'App\\Models\\Topic', 'reactable_id' => 5, 'reaction_emoji_id' => 6],
            ['user_id' => 3, 'reactable_type' => 'App\\Models\\Topic', 'reactable_id' => 5, 'reaction_emoji_id' => 1],
            ['user_id' => 4, 'reactable_type' => 'App\\Models\\Topic', 'reactable_id' => 5, 'reaction_emoji_id' => 2],
            ['user_id' => 5, 'reactable_type' => 'App\\Models\\Topic', 'reactable_id' => 5, 'reaction_emoji_id' => 3],
            ['user_id' => 6, 'reactable_type' => 'App\\Models\\Topic', 'reactable_id' => 5, 'reaction_emoji_id' => 4],
            ['user_id' => 7, 'reactable_type' => 'App\\Models\\Topic', 'reactable_id' => 5, 'reaction_emoji_id' => 5],
            ['user_id' => 8, 'reactable_type' => 'App\\Models\\Topic', 'reactable_id' => 5, 'reaction_emoji_id' => 6],
            ['user_id' => 9, 'reactable_type' => 'App\\Models\\Topic', 'reactable_id' => 5, 'reaction_emoji_id' => 1],
            ['user_id' => 10, 'reactable_type' => 'App\\Models\\Topic', 'reactable_id' => 5, 'reaction_emoji_id' => 2]

        ];

        foreach ($reactions as $reaction) {
            Reaction::create($reaction);
        }

    }
}

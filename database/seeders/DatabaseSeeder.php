<?php

namespace Database\Seeders;

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
        $users = User::factory(10)->create();
        $categories = Category::factory(5)->create();
        $topics = Topic::factory(20)->create();


        Comment::factory(10)->create();


        Comment::factory(50)->canHaveCommentId()->create();


        Reaction::factory(100)->create();

        Tag::factory(10)->create();
    }
}

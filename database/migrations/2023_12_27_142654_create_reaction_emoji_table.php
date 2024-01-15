<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReactionEmojiTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('reaction_emoji', function (Blueprint $table) {
            $table->id();
            $table->string('emoji_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('reaction_emoji');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reaction', function (Blueprint $table) {
            $table->id();
            $table->string('emoji_code');
            $table->timestamps();

            $table->foreignId('comment_id')->constrained('comment');
            $table->foreignId('topic_id')->constrained('topic');
            $table->foreignId('user_id')->constrained('user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reaction');
    }
};

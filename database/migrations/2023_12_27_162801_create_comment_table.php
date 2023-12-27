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
        Schema::create('comment', function (Blueprint $table) {
            $table->id();
            $table->string('body');
            $table->timestamps();

            $table->foreignId('topic_id')->nullable()->constrained('topic');
            $table->foreignId('comment_id')->nullable()->constrained('answer');
            $table->foreignId('user_id')->constrained('user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answer');
    }
};

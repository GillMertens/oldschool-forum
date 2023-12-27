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
        Schema::create('tag_topic', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tag_id')->constrained('tag')->onDelete('cascade');
            $table->foreignId('topic_id')->constrained('topic');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tag_topic');
    }
};

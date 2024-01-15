<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqAnswersTable extends Migration
{
    public function up()
    {
        Schema::create('faq_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('faq_id');
            $table->text('answer');
            $table->timestamps();

            $table->foreign('faq_id')->references('id')->on('faq')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('faq_answers');
    }
}

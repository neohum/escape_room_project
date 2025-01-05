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
        Schema::create('game_makers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title')->nullable();
            $table->text('editorjs')->nullable();
            $table->string('select')->nullable();
            $table->string('question')->nullable();
            $table->string('choice1')->nullable();
            $table->string('choice2')->nullable();
            $table->string('choice3')->nullable();
            $table->string('choice4')->nullable();
            $table->string('choice5')->nullable();
            $table->string('answer1')->nullable();
            $table->string('answer2')->nullable();
            $table->string('answer3')->nullable();
            $table->string('answer4')->nullable();
            $table->string('answer5')->nullable();
            $table->string('publish')->default('off');
            $table->string('prev_id')->default('0');
            $table->string('next_id')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_makers');
    }
};

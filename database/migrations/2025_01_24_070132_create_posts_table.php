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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->text('post_slug');
            $table->text('post_title');
            $table->mediumText('post_content');
            $table->mediumText('post_excerpt');
            $table->string('post_type', 500);
            $table->string('post_status', 500);
            $table->mediumText('post_image');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('post_category_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};

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
        Schema::create('collections', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image_thumbnail')->nullable();
            $table->text('description')->nullable();
            $table->string('banner_image')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->boolean('is_wedding_collection')->default(1);
            $table->boolean('is_active')->default(0);
            $table->timestamps();

            $table->foreign('brand_id')->references('id')->on('brands')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collections');
    }
};

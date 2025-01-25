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
        Schema::create('size_charts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_type_id');
            $table->string('title', 200);
            $table->text('description')->nullable();
            $table->text('measurement_guide')->comment("Hướng dẫn đo size");
            $table->string("size_chart_image");
            $table->timestamps();

            $table->foreign('product_type_id')->references('id')->on('product_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('size_charts');
    }
};

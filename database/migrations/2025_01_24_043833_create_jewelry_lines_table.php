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
        Schema::create('jewelry_lines', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('banner_image')->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_wedding')->default(1);
            $table->boolean('is_active')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jewelry_lines');
    }
};

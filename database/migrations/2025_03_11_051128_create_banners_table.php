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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('banner_image');
            $table->string('link')->nullable();
            $table->enum('position', ['slide', 'submenu', 'collections', 'jewelry_lines', 'brands']);
            // Bảng và ID tham chiếu (nếu có)
            $table->string('reference_table')->nullable();
            $table->unsignedBigInteger('reference_id')->nullable();

            $table->tinyInteger('priority')->default(1);
            $table->boolean('is_active')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};

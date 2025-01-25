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
        Schema::create('product_type_jewelry_lines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jewelry_line_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_type_id')->constrained()->onDelete('cascade');
            $table->string('banner_image')->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_type_jewelry_lines');
    }
};

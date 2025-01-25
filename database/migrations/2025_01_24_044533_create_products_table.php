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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->decimal('original_price', 12, 2);
            $table->decimal('sale_price', 12, 2);
            $table->string('product_image')->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_featured')->default(0);
            $table->boolean('is_wedding')->default(false);
            $table->boolean('product_status')->default(0);
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('jewelry_line_id');
            $table->unsignedBigInteger('collection_id');
            $table->unsignedBigInteger('product_type_id');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            $table->foreign('jewelry_line_id')->references('id')->on('jewelry_lines')->onDelete('cascade');
            $table->foreign('collection_id')->references('id')->on('collections')->onDelete('cascade');
            $table->foreign('product_type_id')->references('id')->on('product_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

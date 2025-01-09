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
            $table->string('product_code')->unique();
            $table->string('product_name')->unique();
            $table->decimal('original_price', 10, 2);
            $table->decimal('sale_price', 10, 2);
            $table->string('product_image');
            $table->integer('product_quantity')->unsigned();
            $table->text('description')->nullable();
            $table->boolean('is_featured')->default(0);
            $table->boolean('product_status')->default(0);
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('jewelry_line_id')->nullable();
            $table->unsignedBigInteger('collection_id')->nullable();
            $table->unsignedBigInteger('product_type_id')->nullable();
            $table->boolean('is_new')->default(false);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');

            $table->foreign('jewelry_line_id')->references('id')->on('jewelry_lines')->onDelete('set null');
            $table->foreign('collection_id')->references('id')->on('collections')->onDelete('set null');
            $table->foreign('product_type_id')->references('id')->on('product_types')->onDelete('set null');
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

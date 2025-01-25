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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('variant_id');
            $table->unsignedBigInteger('store_id');
            $table->integer('quantity')->default(0);
            $table->timestamps();

            // Khóa ngoại
            $table->foreign('variant_id')
                ->references('id')
                ->on('variants')
                ->onDelete('cascade');

            $table->foreign('store_id')
                ->references('id')
                ->on('shop_stores')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};

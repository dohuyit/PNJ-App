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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('voucher_code', 255)->unique();
            $table->string('voucher_name', 255);
            $table->text('description')->nullable();
            $table->unsignedInteger('uses')->default(0);
            $table->unsignedInteger('max_uses')->default(0);
            $table->unsignedInteger('max_uses_user')->default(0);
            $table->decimal('min_order_value', 12, 2)->default(0);
            $table->tinyInteger('type')->default(0);
            $table->decimal('discount_amount', 12, 2);
            $table->boolean('is_fixed')->default(0);
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
};

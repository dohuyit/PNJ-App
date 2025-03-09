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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_code', 100); // Mã đơn hàng
            $table->unsignedBigInteger('user_id');
            $table->string('name', 255);
            $table->string('email', 255);
            $table->integer('phone');
            $table->date('date');
            $table->decimal('total_amount', 12, 2);
            $table->decimal('discount_amount', 12, 2)->nullable();
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('district_id');
            $table->unsignedBigInteger('ward_id');
            $table->text('address');
            $table->text('note')->nullable();
            $table->unsignedBigInteger('payment_method_id'); // Liên kết phương thức thanh toán
            $table->unsignedBigInteger('status_id'); // Liên kết trạng thái
            $table->string('transaction_code', 200)->nullable(); // Mã giao dịch
            $table->boolean('payment_status')->default(0);
            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->foreign('ward_id')->references('id')->on('wards')->onDelete('cascade');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('order_statuses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

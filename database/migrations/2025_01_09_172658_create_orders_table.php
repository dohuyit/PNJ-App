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
            $table->unsignedBigInteger('user_id'); // Liên kết tài khoản
            $table->string('order_name', 255);
            $table->string('order_email', 255);
            $table->integer('order_phone');
            $table->text('order_address');
            $table->date('order_date');
            $table->decimal('total_amount', 10, 2);
            $table->text('note')->nullable();
            $table->unsignedBigInteger('payment_method_id'); // Liên kết phương thức thanh toán
            $table->unsignedBigInteger('status_id'); // Liên kết trạng thái
            $table->string('transaction_code', 200)->nullable(); // Mã giao dịch
            $table->boolean('payment_status')->default(false);
            $table->timestamps();

            // Foreign keys
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods')->onDelete('restrict');
            $table->foreign('status_id')->references('id')->on('order_statuses')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');

        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Xóa khóa ngoại
        });
    }
};

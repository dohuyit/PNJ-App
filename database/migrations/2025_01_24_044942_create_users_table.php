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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('password');
            $table->string('email')->unique();
            $table->boolean('gender')->default(0);
            $table->dateTime('birthday')->nullable();
            $table->string('avatar')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->string('remember_token')->nullable();
            $table->string('activate_code')->nullable();
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('city_id')->nullable(); // Thành phố
            $table->unsignedBigInteger('district_id')->nullable(); // Quận/Huyện
            $table->unsignedBigInteger('ward_id')->nullable(); // Phường/Xã
            $table->boolean('status')->default(0);
            $table->timestamps();

            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('set null');
            $table->foreign('ward_id')->references('id')->on('wards')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

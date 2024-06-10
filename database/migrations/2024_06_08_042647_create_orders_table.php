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
            $table->foreignId('customer_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('merchant_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('total_price');
            $table->enum('status', ['pending', 'paid', 'cancelled','completed'])->default('pending');
            $table->enum('payment_method', ['cash', 'bank_transfer'])->default('cash');
            $table->string('payment_date');
            $table->timestamps();
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

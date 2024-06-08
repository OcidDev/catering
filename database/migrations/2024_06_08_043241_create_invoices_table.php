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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->references('id')->on('menus')->onDelete('cascade');
            $table->string('invoice_number');
            $table->string('invoice_date');
            $table->string('invoice_status');
            $table->string('invoice_payment_method');
            $table->string('invoice_payment_status');
            $table->string('invoice_payment_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};

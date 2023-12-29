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
        Schema::create('sale_receipts', function (Blueprint $table) {
            $table->id();
            $table->integer('cash_price');
            $table->integer('fitting_price')->nullable();
            $table->integer('registration_price')->nullable();
            $table->integer('customer_id');
            $table->integer('purchase_id');
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_receipts');
    }
};

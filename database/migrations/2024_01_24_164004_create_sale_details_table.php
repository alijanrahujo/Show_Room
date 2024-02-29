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
        Schema::create('sale_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sale_id')->constrained('sales')->cascadeOnDelete();
            $table->string('tc_no')->nullable();
            $table->string('register_no')->nullable();
            $table->string('purchase_id');
            $table->string('type');
            $table->string('title');
            $table->string('engine');
            $table->string('chassis');
            $table->string('model');
            $table->string('color');
            $table->string('sale_price');
            $table->string('sale_tax');
            $table->string('total');
            $table->string('guarantor_name')->nullable();
            $table->string('guarantor_father')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('pre_refrence')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_details');
    }
};

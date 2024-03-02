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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('time')->nullable();
            $table->string("type")->nullable();
            $table->foreignId('customer_id')->constrained('customers')->cascadeOnDelete();
            $table->string("amount")->nullable();
            $table->string("installment")->nullable();
            $table->string("months")->nullable();
            $table->string("status")->default(1);
            // $table->string('title');
            // $table->string('engine');
            // $table->string('chassis');
            // $table->string('model');
            // $table->string('color');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};

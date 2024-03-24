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
            $table->date('date')->nullable();
            $table->integer('sale_id')->nullable();
            $table->string('title')->nullable();
            $table->string('maker')->nullable();
            $table->string('engine')->nullable();
            $table->string('chassis')->nullable();
            $table->string('horse_power')->nullable();
            $table->string('model')->nullable();
            $table->string('color')->nullable();
            $table->string('buyer_name')->nullable();
            $table->string('buyer_father')->nullable();
            $table->string('buyer_cnic')->nullable();
            $table->string('buyer_phone')->nullable();
            $table->string('buyer_address')->nullable();
            $table->integer('status')->default(10);
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

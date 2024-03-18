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
        Schema::create('purchase_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('purchase_id')->constrained('purchases')->cascadeOnDelete();
            $table->foreignId('vehicle_id')->constrained('vehicle_types')->cascadeOnDelete();
            $table->string("customer_id")->nullable();
            $table->string("cnic")->nullable();
            $table->string("phone")->nullable();
            $table->string("name")->nullable();
            $table->string("father_name")->nullable();
            $table->string("address")->nullable();
            $table->string("owner_name")->nullable();
            $table->string("owner_father")->nullable();
            $table->string("owner_cnic")->nullable();
            $table->string("owner_address")->nullable();
            $table->string("owner_phone")->nullable();
            $table->string('engine');
            $table->string('title')->nullable();
            $table->string('chassis');
            $table->string('model');
            $table->string('color');
            $table->string('horse_power');
            $table->string('maker')->nullable();
            $table->string('tc_no')->nullable();
            $table->string('register_no')->nullable();
            $table->string('type');
            $table->string('purchase_amount');
            $table->string('purchase_tax');
            $table->string('total');
            $table->string('do_number')->nullable();
            $table->string('do_date')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_details');
    }
};

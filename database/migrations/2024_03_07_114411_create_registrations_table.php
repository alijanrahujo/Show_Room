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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->date("date")->nullable();
            $table->string("type")->nullable();
            $table->string("title")->nullable();
            $table->string("engine")->nullable();
            $table->string("chassis")->nullable();
            $table->string("model")->nullable();
            $table->string("color")->nullable();
            $table->string("horse_power")->nullable();
            $table->string("vehicle_id")->nullable();
            $table->string("name")->nullable();
            $table->string("father_name")->nullable();
            $table->string("cnic")->nullable();
            $table->string("phone")->nullable();
            $table->string("address")->nullable();
            $table->string("ref_name")->nullable();
            $table->string("ref_father")->nullable();
            $table->string("ref_cnic")->nullable();
            $table->string("ref_phone")->nullable();
            $table->string("ref_address")->nullable();
            $table->string("description")->nullable();
            $table->integer("payment")->nullable();
            $table->text('image')->nullable();
            $table->string("status")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};

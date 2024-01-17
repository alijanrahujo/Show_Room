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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->morphs('purchaseable');
            $table->string('title');
            $table->string('engine');
            $table->string('chassis');
            $table->string('model');
            $table->string('color');
            $table->foreignId('vehicle_id')->constrained('vehicle_types')->cascadeOnDelete();
            $table->integer('excluding_tax')->nullable();
            $table->integer('rate_tax')->nullable();
            $table->integer('paybel_tax')->nullable();
            $table->integer('including_tax')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};

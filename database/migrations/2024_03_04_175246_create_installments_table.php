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
        Schema::create('installments', function (Blueprint $table) {
            $table->id();
            $table->date("date")->nullable();
            $table->decimal("amount")->nullable();
            $table->date("paid_date")->nullable();
            $table->decimal("paid_amount")->nullable();
            $table->decimal("due_amount")->nullable();
            $table->string("description")->nullable();
            $table->morphs('installmentable');
            $table->integer('status')->default(4);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('installments');
    }
};

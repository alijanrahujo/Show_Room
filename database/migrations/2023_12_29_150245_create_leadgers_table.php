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
        Schema::create('leadgers', function (Blueprint $table) {
            $table->id();
            $table->string("account_id");
            $table->string("particulars")->nullable();
            $table->date("date")->nullable();
            $table->integer("debit")->nullable();
            $table->integer("credit")->nullable();
            $table->integer("balance")->nullable();
            $table->integer("status")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leadgers');
    }
};

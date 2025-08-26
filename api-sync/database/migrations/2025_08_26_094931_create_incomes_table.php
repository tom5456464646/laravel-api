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
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('income_id')->nullable();
            $table->dateTime('date')->nullable();
            $table->decimal('total_amount', 12, 2)->nullable();
            $table->decimal('expenses', 12, 2)->nullable();
            $table->decimal('profit', 12, 2)->nullable();
            $table->string('warehouse_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incomes');
    }
};

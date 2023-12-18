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
        Schema::create('employee_meal_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('barcode_id');
            $table->date('date_scanned')->default(NULL);
            $table->time('time_scanned')->default(NULL);
            $table->unsignedBigInteger('meal_type_id');
            $table->timestamps();

            $table->foreign('barcode_id')->references('id')->on('barcodes');
            $table->foreign('meal_type_id')->references('id')->on('meal_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_meal_logs');
    }
};

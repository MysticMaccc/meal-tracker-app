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
        Schema::create('trainee_meal_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trainee_list_id');
            $table->date('date_scanned')->default(NULL);
            $table->time('time_scanned')->default(NULL);
            $table->unsignedBigInteger('meal_type_id');
            $table->timestamps();

            $table->foreign('trainee_list_id')->references('id')->on('trainee_lists');
            $table->foreign('meal_type_id')->references('id')->on('meal_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainee_meal_logs');
    }
};

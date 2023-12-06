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
        Schema::table('trainee_meal_logs', function (Blueprint $table) {
            $table->unsignedBigInteger('trainee_id')->default(NULL)->after('trainee_list_id');

            $table->foreign('trainee_id')->references('trainee_id')->on('trainee_lists');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

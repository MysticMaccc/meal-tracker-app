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
        Schema::create('trainee_lists', function (Blueprint $table) {
            $table->id();
            $table->integer('trainee_id');
            $table->integer('enroled_id');
            $table->string('rank');
            $table->string('lastname');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('suffix')->nullable();
            $table->string('course');
            $table->string('course_code');
            $table->string('course_type');
            $table->string('company');
            $table->string('bus');
            $table->string('dorm');
            $table->date('training_start_date');
            $table->date('training_end_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainee_lists');
    }
};

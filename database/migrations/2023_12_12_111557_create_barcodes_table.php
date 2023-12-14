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
        Schema::create('barcodes', function (Blueprint $table) {
            $table->id();
            $table->integer('card_number')->default(NULL);
            $table->string('barcode_value')->default(NULL);
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('category_type_id');
            $table->string('owner')->default(NULL);
            $table->string('company')->default(NULL);            
            $table->date('start_date')->default(NULL);
            $table->date('end_date')->default(NULL);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('category_type_id')->references('id')->on('category_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barcodes');
    }
};

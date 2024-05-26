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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('weight');
            $table->enum('unit', ['Gramm', 'Milliliter'])->nullable();
            $table->date('expiry_date')->nullable();
            $table->unsignedBigInteger('pantry_id');
            $table->foreign('pantry_id')->references('id')->on('pantries')->onDelete('cascade');
            $table->timestamps();

        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};

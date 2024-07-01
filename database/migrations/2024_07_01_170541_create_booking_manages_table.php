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
        Schema::create('booking_manages', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('services_id'); 
            $table->date('date');
            $table->string('time');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->text('description')->nullable();
            $table->string('status'); // Adding status column

            $table->foreign('services_id')->references('id')->on('services')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_manages');
    }
};

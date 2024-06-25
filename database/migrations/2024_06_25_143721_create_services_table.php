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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_category_id');
            $table->foreign('service_category_id')
                  ->references('id')
                  ->on('service_categories')
                  ->onDelete('cascade');
            $table->string('title');
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->string('time_duration')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->string('location')->nullable();
            $table->string('image')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};

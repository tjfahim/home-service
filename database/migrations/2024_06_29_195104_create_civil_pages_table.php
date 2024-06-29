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
        Schema::create('civil_pages', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->string('book_link')->nullable();
            $table->string('service1title')->nullable();
            $table->string('service1image')->nullable();
            $table->text('service1description')->nullable();
            $table->string('service2title')->nullable();
            $table->string('price1')->nullable();
            $table->string('price2')->nullable();
            $table->string('price3')->nullable();
            $table->string('service2image')->nullable();
            $table->text('service2description')->nullable();
            $table->string('service3title')->nullable();
            $table->string('service3image')->nullable();
            $table->text('service3description')->nullable();
            $table->text('final_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('civil_pages');
    }
};

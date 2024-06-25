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
        Schema::create('home_contents', function (Blueprint $table) {
            $table->id();
            $table->string('section1title')->nullable();
            $table->string('section1subtitle')->nullable();
            $table->string('section1buttontext')->nullable();
            $table->string('section1buttonlink')->nullable();
            $table->string('section1image')->nullable();
            $table->string('section2title')->nullable();
            $table->text('section2description')->nullable();
            $table->string('section2buttontext')->nullable();
            $table->string('section2buttonlink')->nullable();
            $table->string('section2image')->nullable();
            $table->string('aboutservicetitle')->nullable();
            $table->text('aboutservicedescription')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_contents');
    }
};

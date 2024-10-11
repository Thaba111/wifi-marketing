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
        Schema::create('banner_impressions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('banner_id'); // Reference to banners table
            $table->integer('impressions')->default(0); // Total impressions
            $table->integer('clicks')->default(0); // Total clicks
            $table->timestamps();

             // Foreign key constraint
             $table->foreign('banner_id')->references('id')->on('banners')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banner_impressions');
    }
};

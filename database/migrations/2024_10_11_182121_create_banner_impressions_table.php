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
            $table->foreignId('banner_id')->constrained('banners')->onDelete('cascade'); // Foreign key to banners table
            $table->integer('impressions'); 
            $table->integer('clicks'); 
            $table->timestamps();
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

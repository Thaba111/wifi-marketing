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
        Schema::create('campaign_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('campaign_id')->nullable()->change();            $table->integer('clicks')->default(0); 
            $table->integer('opens')->default(0); 
            $table->integer('conversions')->default(0); 
            $table->date('report_date'); 
            $table->timestamps();

             // Foreign key constraint
             $table->foreign('campaign_id')->references('id')->on('campaigns')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaign_reports');
    }
};

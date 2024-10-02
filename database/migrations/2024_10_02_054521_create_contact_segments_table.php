<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('contact_segments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contact_id');
            $table->foreignId('segment_id');
            $table->timestamps();

            $table->foreign('contact_id')->references('id')->on('contacts')->onDelete('cascade');
            $table->foreign('segment_id')->references('id')->on('segments')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_segments');
    }
};

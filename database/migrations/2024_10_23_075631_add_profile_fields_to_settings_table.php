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
        Schema::table('settings', function (Blueprint $table) {
        $table->string('name')->nullable();
        $table->string('email')->nullable()->unique();
        $table->string('phone')->nullable();
        $table->string('role')->nullable();
        $table->string('location')->nullable();
        $table->string('country')->nullable();
        $table->string('county')->nullable();
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            //
        });
    }
};

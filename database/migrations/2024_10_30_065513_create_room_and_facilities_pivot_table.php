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
        Schema::create('room_and_facilities_pivot', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rooms_id')->constrained()->onDelete('cascade');
            $table->foreignId('room_facilities_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_and_facilities_pivot');
    }
};

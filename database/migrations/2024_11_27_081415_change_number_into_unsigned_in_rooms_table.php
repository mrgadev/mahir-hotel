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
        Schema::table('rooms', function (Blueprint $table) {
            $table->unsignedBigInteger('price')->change();
            $table->unsignedInteger('total_rooms')->change();
            $table->unsignedInteger('available_rooms')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->bigInteger('price')->change();
            $table->integer('total_rooms')->change();
            $table->integer('available_rooms')->change();
        });
    }
};

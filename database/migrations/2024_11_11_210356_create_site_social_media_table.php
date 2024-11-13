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
        Schema::create('site_social_media', function (Blueprint $table) {
            $table->id();
            $table->string('icon')->nullable();
            $table->string('username')->nullable();
            $table->string('link')->nullable();

            $table->unsignedBigInteger('site_settings_id')->nullable();
            $table->foreign('site_settings_id')->references('id')->on('site_settings');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_social_media');
    }
};

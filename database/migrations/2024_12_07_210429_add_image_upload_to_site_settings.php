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
        Schema::table('site_settings', function (Blueprint $table) {
            $table->text('hero_cover')->nullable();
            $table->text('service_image')->nullable();
            $table->text('faq_illustration')->nullable();
            $table->text('cta_cover')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn('hero_cover');
            $table->dropColumn('service_image');
            $table->dropColumn('faq_illustration');
            $table->dropColumn('cta_cover');
        });
    }
};

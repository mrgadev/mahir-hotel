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
            $table->dropColumn('tagline');
            $table->dropColumn('description');
            $table->dropColumn('our_service_title');
            $table->dropColumn('our_location_title');
            $table->dropColumn('our_location_desc');
            $table->dropColumn('our_facilities_title');
            $table->dropColumn('testimonial_title');
            $table->dropColumn('award_title');
            $table->dropColumn('award_desc');
            $table->dropColumn('cta_text');
            $table->dropColumn('cta_button_link');
            $table->dropColumn('cta_button_text');
            $table->dropColumn('hero_cover');
            $table->dropColumn('service_image');
            $table->dropColumn('faq_illustration');
            $table->dropColumn('cta_cover');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->string('tagline')->nullable();
            $table->string('description')->nullable();
            $table->string('our_service_title')->nullable();
            $table->string('our_location_title')->nullable();
            $table->string('our_location_desc')->nullable();
            $table->string('our_facilities_title')->nullable();
            $table->string('testimonial_title')->nullable();
            $table->string('award_title')->nullable();
            $table->string('award_desc')->nullable();
            $table->string('cta_text')->nullable();
            $table->string('cta_button_link')->nullable();
            $table->string('cta_button_text')->nullable();
            $table->string('hero_cover')->nullable();
            $table->string('service_image')->nullable();
            $table->string('faq_illustration')->nullable();
            $table->string('cta_cover')->nullable();
        });
    }
};

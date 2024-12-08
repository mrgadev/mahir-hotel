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
            $table->string('our_service_title')->nullable();

            $table->string('our_location_title')->nullable();
            $table->text('our_location_desc')->nullable();

            $table->string('our_facilities_title')->nullable();

            $table->string('testimonial_title')->nullable();

            $table->string('award_title')->nullable();
            $table->string('award_desc')->nullable();

            $table->string('cta_text')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn('our_service_title');

            $table->dropColumn('our_location_title');
            $table->dropColumn('our_location_desc');

            $table->dropColumn('our_facilities_title');

            $table->dropColumn('testimonial_title');

            $table->dropColumn('award_title');
            $table->dropColumn('award_desc');

            $table->dropColumn('cta_text');

        });
    }
};

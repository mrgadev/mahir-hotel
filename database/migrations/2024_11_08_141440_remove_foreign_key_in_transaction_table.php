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
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropForeign('transactions_accomodation_plan_id_foreign');
            $table->dropColumn('accomodation_plan_id');
            $table->dropForeign('transactions_promo_id_foreign');
            $table->dropColumn('promo_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->foreign('transactions_accomodation_plan_id_foreign')->references('id')->on('accomodation_plans');
            $table->unsignedBigInteger('accomodation_plan_id');
            $table->foreign('transactions_promo_id_foreign')->references('id')->on('promos');
            $table->unsignedBigInteger('promo_id');
        });
    }
};

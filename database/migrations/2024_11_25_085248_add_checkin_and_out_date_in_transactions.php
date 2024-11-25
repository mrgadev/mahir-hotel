<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            // DB::statement('ALTER TABLE transactions MODIFY checkin_status type VARCHAR(255)');
            $table->string('checkin_status')->default('Belum')->change();
            $table->dateTime('checkin_date')->nullable();
            $table->dateTime('checkout_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            // DB::statement('ALTER TABLE transactions MODIFY checkin_status type ENUM("Sudah", "Belum", "Dibatalkan")');
            $table->enum('checkin_status', ['Sudah', 'Belum', 'Dibatalkan'])->default('Belum')->change();
            $table->dropColumn('checkin_date');
            $table->dropColumn('checkout_date');
        });
    }
};

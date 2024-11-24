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
        Schema::table('penarikan_saldos', function (Blueprint $table) {
            // Hapus foreign key
            $table->dropForeign(['saldo_id']);

            // Hapus kolom
            $table->dropColumn('saldo_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('penarikan_saldos', function (Blueprint $table) {
            // Tambahkan kembali kolom dan constraint
            $table->foreignId('saldo_id')->constrained()->onDelete('cascade');
        });
    }
};

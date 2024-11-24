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
        Schema::create('penarikan_saldos', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('amount');
            $table->text('notes');
            $table->enum('status', ['Tertunda', 'Disetujui', 'Dibatalkan']);

            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('saldo_id')->constrained()->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penarikan_saldos');
    }
};

<?php

// use Xendit\Charges;
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
        // 'user_id',
        // 'name',
        // 'email',
        // 'phone',
        // 'room_id',
        // 'check_in',
        // 'check_out',
        // 'accomdation_plan_id',
        // 'service_id',
        // 'notes',
        // 'checkin_status',

        // 'invoice',
        // 'payment_url',
        // 'payment_status',
        // 'payment_method',
        // 'total_price',
        // 'promo_id'
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();

            $table->unsignedBigInteger('room_id')->nullable();
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');

            $table->date('check_in');
            $table->date('check_out');

            $table->unsignedBigInteger('accomodation_plan_id')->nullable();
            $table->foreign('accomodation_plan_id')->references('id')->on('accomdation_plans')->onDelete('cascade');
            
            $table->unsignedBigInteger('service_id')->nullable();
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');

            $table->longText('notes')->nullable();
            $table->enum('checkin_status', ['Sudah', 'Belum', 'Dibatalkan'])->default('Belum');

            $table->string('invoice');
            $table->string('payment_url');
            $table->string('payment_status')->default('Belum bayar');
            $table->string('payment_method');
            $table->integer('total_price');
            
            $table->unsignedBigInteger('promo_id')->nullable();
            $table->foreign('promo_id')->references('id')->on('promos')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};

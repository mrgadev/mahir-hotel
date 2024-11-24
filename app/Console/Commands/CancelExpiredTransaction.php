<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Transaction;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;

class CancelExpiredTransaction extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:cancel-expired-transaction';
    

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cancel expired booking transactions and reset room availability';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Cari data transaksi yg expired
        $expiredTransactions = Transaction::where('payment_status', 'PENDING')
        // ->where('user_id', Auth::user()->id)
        ->where('payment_deadline', '<', Carbon::now())
        // ->latest()
        // ->first();
        ->get();

        foreach($expiredTransactions as $transaction) {
            // Update transaction status
            $transaction->payment_status = 'CANCELLED';
            $transaction->notes = 'Transaksi Anda dibatalkan secara otomatis, karena telah melewati tenggat waktu yang disediakan.';
            $transaction->save();
            $transaction->room->incrementAvailableRooms();
        }
        // $expiredTransactions->payment_status = 'Dibatalkan';
        //     $expiredTransactions->notes = 'Transaksi Anda dibatalkan secara otomatis, karena telah melewati tenggat waktu yang disediakan.';
        //     $expiredTransactions->save();
        //     $expiredTransactions->room->incrementAvailableRooms();
        $this->info('Expired bookings cancelled: '. $expiredTransactions->count());
    }
}

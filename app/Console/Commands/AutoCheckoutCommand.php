<?php

namespace App\Console\Commands;

use App\Models\Transaction;
use Illuminate\Console\Command;

class AutoCheckoutCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:auto-checkout-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatically checkout reservation when time is over';

    /**
     * Execute the console command.
     */
    protected function performAutoCheckout(Transaction $transaction) {
        $transaction->update([
            'checkin_status' => 'Sudah Checkout',
            'checkout_time' => now()
        ]);
    }

    public function handle()
    {
        // Find booking that still active and past their checkout time
        $overdueTransactions = Transaction::where('checkin_status', 'Sudah Checkin')
        ->where('check_out', '<', now())
        ->get();

        foreach($overdueTransactions as $transaction) {
            $this->performAutoCheckout($transaction);
        }

        $this->info(count($overdueTransactions));
        return Command::SUCCESS;
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index() {
        $transactions = Transaction::latest()->get();
        return view('dashboard.admin.transaction.index', compact('transactions'));
    }

    public function show(Transaction $transaction) {
        return view('dashboard.admin.transaction.detail', compact('transaction'));
    }
    
    public function changeCheckInStatus(Request $request, Transaction $transaction) {
        $data = $request->validate([
            'checkin_status' => 'required'
        ]);
        if($data['checkin_status'] == 'Sudah Checkin') {
            $data['checkin_date'] = now();
        } elseif($data['checkin_status'] == 'Sudah Checkout') {
            $data['checkout_date'] = now();
            $transaction->room->incrementAvailableRooms();
        } 
        $transaction->update($data);
        $room = Room::where('id', $transaction->room_id)->first();
        // if($data['checkin_status'] == 'Sudah') {
        //     $room->available_rooms -= 1;
        //     $room->save();
        // } else {
        //     $room->available_rooms += 1;
        //     $room->save();
        // }

        return view('dashboard.admin.transaction.detail', compact('transaction'));
    }

    public function changePaymentStatus(Request $request, Transaction $transaction) {
        $data = $request->validate([
            'payment_status' => 'required|string'
        ]);

        $transaction->update($data);
        return view('dashboard.admin.transaction.detail', compact('transaction'));
    }

    public function getMonthlyRevenue()
    {
        // Get selected year (default to current year)
        $selectedYear = request('year', date('Y'));

        // Fetch monthly revenue data
        $monthlyRevenue = DB::table('transactions')
            ->select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('SUM(total_price) as total_revenue')
            )
            ->whereYear('created_at', $selectedYear)
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            // Transform to include month names
            ->map(function ($item) {
                $item->month_name = date('F', mktime(0, 0, 0, $item->month, 1));
                return $item;
            });

        // Get available years
        $years = DB::table('transactions')
            ->select(DB::raw('YEAR(created_at) as year'))
            ->groupBy('year')
            ->orderBy('year', 'desc')
            ->pluck('year');

        return response()->json([
            'monthly_revenue' => $monthlyRevenue,
            'available_years' => $years,
            'selected_year' => $selectedYear
        ]);
    }
}

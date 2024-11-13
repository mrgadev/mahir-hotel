<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Spatie\SimpleExcel\SimpleExcelWriter;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        // Mengambil semua tahun yang ada di kolom created_at
        $years = Transaction::selectRaw('YEAR(created_at) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        // Inisialisasi variabel transaksi dan total
        $transactions = collect();
        $totalAmount = 0;

        // Jika tahun dan bulan dipilih, ambil data transaksi
        if ($request->has('year') && $request->has('month')) {
            $year = $request->input('year');
            $month = $request->input('month');

            // Mengambil transaksi berdasarkan tahun dan bulan
            $transactions = Transaction::query();

            if ($year) {
                $transactions->whereYear('created_at', $year);
            }

            if ($month) {
                $monthNumber = date('m', strtotime($month)); // Mengubah nama bulan menjadi angka
                $transactions->whereMonth('created_at', $monthNumber);
            }

            $transactions = $transactions->get();

            // Menghitung total jumlah transaksi
            $totalAmount = $transactions->sum('total_price'); // Ganti 'amount' dengan nama kolom yang sesuai
        }

        return view('dashboard.admin.report.index', compact('years', 'transactions', 'totalAmount'));
    }

    public function exportTransactions(Request $request)
    {
        // Ambil tahun dari request
        $year = $request->input('years');

        // Pemetaan nama bulan (huruf kecil) ke angka
        $monthsMapping = [
            'januari' => 1,
            'februari' => 2,
            'maret' => 3,
            'april' => 4,
            'mei' => 5,
            'juni' => 6,
            'juli' => 7,
            'agustus' => 8,
            'september' => 9,
            'oktober' => 10,
            'november' => 11,
            'desember' => 12,
        ];

        // Ambil bulan dari request dan konversi ke angka
        $monthName = $request->input('months');
        $month = $monthsMapping[$monthName]; // Mengambil angka bulan dari pemetaan

        // Ambil data transaksi berdasarkan tahun dan bulan
        $transactions = Transaction::whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->get();

        // Hitung total pengeluaran
        $totalExpenses = $transactions->sum('total_price');

        // Menggunakan streamDownload untuk mengunduh file
        return SimpleExcelWriter::streamDownload("transactions_export_{$year}_{$month}.xlsx")
            ->addHeader([
                'ID',
                'Nama',
                'Nama Kamar',
                'Nomor Innvoice',
                'Status Pembayaran',
                'Metode pembayaran',
                'Total Biaya',
                'Tanggal'
            ]) // Menambahkan header
            ->addRows($transactions->map(function ($transaction) {
                return [
                    $transaction->id,
                    $transaction->name,
                    $transaction->room->name,
                    $transaction->invoice,
                    $transaction->payment_status,
                    $transaction->payment_method,
                    $transaction->total_price,
                    $transaction->created_at->format('Y-m-d'), // Format tanggal
                ];
            }))
            ->addRow(['Total', $totalExpenses]) // Menambahkan total
            ->close();
    }
}

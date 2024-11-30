<?php

namespace App\Http\Controllers;


// use Xendit\/Invoice;
use Carbon\Carbon;
use App\Models\Room;
use App\Models\Saldo;
use App\Traits\Fonnte;
use Xendit\Configuration;
use Xendit\Payout\Payout;
use App\Models\Transaction;
use Xendit\Invoice\Invoice;
use App\Models\SiteSettings;
use Illuminate\Http\Request;
use Xendit\Invoice\InvoiceApi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Xendit\Invoice\CreateInvoiceRequest;
use Xendit\BalanceAndTransaction\TransactionApi;
use Xendit\PaymentRequest\PaymentRequestParameters;

class PaymentController extends Controller
{
    use Fonnte;
    private $site_settings;
    // Buat construct untuk mendapatkan token Xendit
    public function __construct() {
        // Configuration::setXenditKey(env('XENDIT_SECRET_KEY'));
        Configuration::setXenditKey(config('services.xendit.secret_key'));
        $this->site_settings = SiteSettings::where('id', 1)->first();
        // Configuration::setXenditKey("xnd_development_GXTQuLgR0APNfJKZZg74MoXTrzueUJEKIlRCHb411Jr8H7lgQixMNN7olF9JkVHy");
        // Xendit::setApiKey(env('XENDIT_SECRET_KEY'));
    }

    // Method untuk payment dengan Xendit
    public function onlinePayment(Request $request) {
        // Xendit::setApiKey(env('XENDIT_SECRET_KEY'));
        // dd($request->all());
        // ambil dan validasi seluruh request dari user
        $data = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'room_id' => 'required|exists:rooms,id',
            'check_in' => 'required',
            'check_out' => 'required',
            'accomodation_plan_id' => 'nullable|array',
            'accomodation_plan_id.*' => 'exists:accomdation_plans,id',
            'promo_id' => 'nullable|array',
            'promo_id.*' => 'exists:promos,id',
        ]);
        // buat data invoice
        $data['invoice'] = 'MH-'.rand(000000,999999); 
        // buat data jumlah malam dari selisih tanggal check in dan out untuk kalkulasi harga akhir
        $nights = date_diff(date_create($data['check_in']), date_create($data['check_out']))->format("%a");
        // Buat data transaction baru dengan beberapa data awal
        // Adapun data lain spt, harga total akan diperbarui di akhir
        // $payment_deadline = now()->addHours(5);
        // dd($payment_deadline);
        $checkIn = Carbon::parse($data['check_in']);
        $checkOut = Carbon::parse($data['check_out']);

        // Check if room is available for the requested dates

        $transaction = new Transaction();
        $transaction->user_id = $data['user_id'];
        $transaction->name = $data['name'];
        $transaction->email = $data['email'];
        $transaction->phone = $data['phone'];
        $transaction->room_id = $data['room_id'];
        $transaction->check_in = $data['check_in'];
        $transaction->check_out = $data['check_out'];
        $transaction->invoice = $data['invoice'];
        $transaction->payment_method = 'Xendit';
        // $transaction->payment_deadline = now()->addMinutes(2);
        $transaction->payment_deadline = now()->addHours($this->site_settings->payment_deadline);
        
        $transaction->save();
        // dd($transaction);
        // lakukan sinkronisasi data accomodation_plan_id dan promo_id
        $transaction->accomodation_plans()->sync($request->accomodation_plan_id);
        $transaction->promos()->sync($request->promo_id);
        // lakukan foreach untuk menghitung jumlah 
        $accomodation_plan_amount = 0;
        foreach($transaction->accomodation_plans as $accomodation_plan) {
            // dd($accomodation_plan->name);
            $accomodation_plan_amount += $accomodation_plan->price;
            // dd($accomodation_plan->id);
        }
        // dd($accomodation_plan_amount);
        $promo_amount = 0;
        foreach($transaction->promos as $promo) {
            // dd($promo);
            $promo_amount += $promo->amount;
            // dd($promo->amount/100);
        }
        // dd($nights);
        $base_price = $nights * $transaction->room->price;
        $promo_price = (int) $base_price * ($promo_amount / 100);
        // dd($promo_price);
        // $total_amount = 
        // dd($base_price);
        // $total_amount = ;
        // dd($promo_amount);
        $total_amount = $base_price + $accomodation_plan_amount - $promo_price;
        // dd($total_amount);
        // dd($transaction->room->name);
        // $deadline_seconds = Carbon::parse($transaction->payment_deadline)->diffInSeconds();
        // dd($deadline_seconds);
        $paymentData = [
            'external_id' => $data['invoice'],
            'amount' => $total_amount,
            'description' => 'Pembayaran '.$transaction->room->name.' dari Mahir Hotel selama '.$nights.' malam',
            'invoice_duration' => 60 * 60 * $this->site_settings->payment_deadline,
            'customer' => [
                'given_names' => $transaction->name,
                'email' => $transaction->email,
                'mobile_number' => $transaction->phone,
            ],
            'success_redirect_url' => route('payment.success', $transaction->invoice),
            'failure_redirect_url' => 'https://yahoo.com',
            'currency' => 'IDR',
            // 'items' => [
            //     'name' => $transaction->room->name,
            //     'quantity' => $nights,
            //     'price' => $base_price
            // ],
            'payment_method' => ["CREDIT_CARD", "BCA", "BNI", "BSI", "BRI", "MANDIRI", "PERMATA", "SAHABAT_SAMPOERNA", "BNC", "ALFAMART", "INDOMARET", "OVO", "DANA", "SHOPEEPAY", "LINKAJA", "JENIUSPAY", "DD_BRI", "DD_BCA_KLIKPAY", "KREDIVO", "AKULAKU", "UANGME", "ATOME", "QRIS"]
        ];
        $room = Room::where('id', $transaction->room_id)->first();
        $apiInstance = new InvoiceApi();
        $createInvoiceRequest = new CreateInvoiceRequest($paymentData);
        
        // $result = $apiInstance->createInvoice($createInvoiceRequest);
        // $transaction->payment_status = "PENDING";
        // $transaction->payment_url = $result['invoice_url'];
        // $transaction->save();
        // dd($result);
        try {
            $result = $apiInstance->createInvoice($createInvoiceRequest);
            $transaction->payment_status = "PENDING";
            $transaction->payment_url = $result['invoice_url'];
            $transaction->total_price = $total_amount;
            // $transaction->payment_deadline = Carbon::parse($paymentData['invoice_duration']);
            // $transaction->payment_deadline = date('Y-m-d H:i:s', $paymentData['invoice_duration']);
            // $transaction->payment_deadline = $transaction->created_at->addHours(5)->format('Y-m-d H:i:s');
            $transaction->save();
            $room->decrementAvailableRooms();
            // return redirect($result['invoice_url']);
            return redirect()->route('payment.bill', $transaction->invoice);
        } catch(\Xendit\XenditSdkException $e) {

        }
        // $paymentResponse = Invoice::create($paymentData);
        // dd($paymentResponse);
    }

    public function cashPayment(Request $request) {
        $data = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'room_id' => 'required|exists:rooms,id',
            'check_in' => 'required',
            'check_out' => 'required',
            'accomodation_plan_id' => 'nullable|array',
            'accomodation_plan_id.*' => 'exists:accomdation_plans,id',
            'promo_id' => 'nullable|array',
            'promo_id.*' => 'exists:promos,id',
        ]);
        // buat data invoice
        $data['invoice'] = 'MH-'.rand(000000,999999); 
        // buat data jumlah malam dari selisih tanggal check in dan out untuk kalkulasi harga akhir
        $nights = date_diff(date_create($data['check_in']), date_create($data['check_out']))->format("%a");

        // Buat data transaction baru dengan beberapa data awal
        // Adapun data lain spt, harga total akan diperbarui di akhir
        $transaction = new Transaction();
        $transaction->user_id = $data['user_id'];
        $transaction->name = $data['name'];
        $transaction->email = $data['email'];
        $transaction->phone = $data['phone'];
        $transaction->room_id = $data['room_id'];
        $transaction->check_in = $data['check_in'];
        $transaction->check_out = $data['check_out'];
        $transaction->invoice = $data['invoice'];
        $transaction->payment_method = 'Cash';
        $transaction->payment_deadline = now()->addHours($this->site_settings->payment_deadline);
        $transaction->save();
        // lakukan sinkronisasi data accomodation_plan_id dan promo_id
        $transaction->accomodation_plans()->sync($request->accomodation_plan_id);
        $transaction->promos()->sync($request->promo_id);
        $accomodation_plan_amount = 0;
        // Lakukan perulangan untuk menghitung total biaya accomodation plan
        foreach($transaction->accomodation_plans as $accomodation_plan) {
            $accomodation_plan_amount += $accomodation_plan->price;
        }
        $promo_amount = 0;
        // Lakukan perulangan untuk menghituyng total promo
        foreach($transaction->promos as $promo) {
            $promo_amount += $promo->amount;
        }
        $base_price = $nights * $transaction->room->price;
        $promo_price = (int) $base_price * ($promo_amount / 100);

        $total_amount = $base_price + $accomodation_plan_amount - $promo_price;

        $transaction->payment_status = "PENDING";
        $transaction->payment_url = '';
        $transaction->total_price = $total_amount;
        $transaction->save();

        return redirect()->route('payment.success', $transaction->invoice);
    }

    public function creditPayment(Request $request){
        $data = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'room_id' => 'required|exists:rooms,id',
            'check_in' => 'required',
            'check_out' => 'required',
            'accomodation_plan_id' => 'nullable|array',
            'accomodation_plan_id.*' => 'exists:accomdation_plans,id',
            'promo_id' => 'nullable|array',
            'promo_id.*' => 'exists:promos,id',
        ]);
        // buat data invoice
        $data['invoice'] = 'MH-'.rand(000000,999999); 
        // buat data jumlah malam dari selisih tanggal check in dan out untuk kalkulasi harga akhir
        $nights = date_diff(date_create($data['check_in']), date_create($data['check_out']))->format("%a");

        // Buat data transaction baru dengan beberapa data awal
        // Adapun data lain spt, harga total akan diperbarui di akhir
        $transaction = new Transaction();
        $transaction->user_id = $data['user_id'];
        $transaction->name = $data['name'];
        $transaction->email = $data['email'];
        $transaction->phone = $data['phone'];
        $transaction->room_id = $data['room_id'];
        $transaction->check_in = $data['check_in'];
        $transaction->check_out = $data['check_out'];
        $transaction->invoice = $data['invoice'];
        $transaction->payment_method = 'Saldo';
        $transaction->save();
        // lakukan sinkronisasi data accomodation_plan_id dan promo_id
        $transaction->accomodation_plans()->sync($request->accomodation_plan_id);
        $transaction->promos()->sync($request->promo_id);
        $accomodation_plan_amount = 0;
        // Lakukan perulangan untuk menghitung total biaya accomodation plan
        foreach($transaction->accomodation_plans as $accomodation_plan) {
            $accomodation_plan_amount += $accomodation_plan->price;
        }
        $promo_amount = 0;
        // Lakukan perulangan untuk menghituyng total promo
        foreach($transaction->promos as $promo) {
            $promo_amount += $promo->amount;
        }
        $base_price = $nights * $transaction->room->price;
        $promo_price = (int) $base_price * ($promo_amount / 100);

        $total_amount = $base_price + $accomodation_plan_amount - $promo_price;

        $transaction->payment_status = "PENDING";
        $transaction->payment_url = '';
        $transaction->total_price = $total_amount;
        $transaction->payment_deadline = now()->addHours($this->site_settings->payment_deadline);
        $transaction->save();
        $room = Room::where('id', $transaction->room_id)->first();
        $room->decrementAvailableRooms();

        $lastBalance = Saldo::where('user_id', $transaction->user_id)
                        ->latest()
                        ->first(); // Gunakan first() karena kita akan handle jika null

        // Hitung saldo baru
        $newAmount = $lastBalance ? $lastBalance->amount - $transaction->total_price : $transaction->total_price;

        // Buat record saldo baru
        Saldo::create([
            'user_id' => $transaction->user_id,
            'transaction_id' => $transaction->id, // Pastikan ini sesuai dengan kolom di database
            'debit' => 0,
            'credit' => $transaction->total_price,
            'amount' => $newAmount,
            'description' => 'Reservasi Kamar'
        ]);

        return redirect()->route('payment.bill', $transaction->invoice);
    }

    public function bill(Transaction $transaction) {
        if($transaction->payment_deadline < Carbon::now()) {
            return redirect()->route('payment.timeout', $transaction->invoice);
        }

        return view('frontpage.payment.bill', compact('transaction'));
    }

    public function timeout(Transaction $transaction) {
        // $transaction = Transaction::where('invoice',$id)->firstOrFail();
        $room = Room::where('id', $transaction->room_id)->firstOrFail();
        if($transaction->payment_status == "PENDING")  {
            $transaction->payment_status = "CANCELLED";
            $transaction->save();
            $room->incrementAvailableRooms();
            return view('frontpage.payment.timeout');
        } elseif($transaction->payment_status == 'PAID') {
            return redirect()->route('payment.success', $transaction->invoice);
        }
    }

    public function success(Transaction $transaction)
    {
        // $transaction = Transaction::where('invoice',$id)->firstOrFail();
        $room = Room::where('id', $transaction->room_id)->firstOrFail();
        if(($transaction->payment_method == 'Xendit')) {
            $transaction->payment_status = "PAID";

            $transaction->room_number = rand(1,$transaction->room->total_rooms);

            $transaction->payment_deadline = NULL;

            $transaction->save();
            // $room->available_rooms -= 1;
            // $room->save();
        } elseif($transaction->payment_method == 'Saldo') {
            $transaction->payment_status = "PAID";

            $transaction->room_number = rand(1,$transaction->room->total_rooms);

            $transaction->payment_deadline = NULL;

            $transaction->save();

            $lastBalance = Saldo::where('user_id', $transaction->user_id)
                            ->latest()
                            ->first(); // Gunakan first() karena kita akan handle jika null

            // Hitung saldo baru
            $newAmount = $lastBalance ? $lastBalance->amount - $transaction->total_price : $transaction->total_price;

            // Buat record saldo baru
            Saldo::create([
                'user_id' => $transaction->user_id,
                'transaction_id' => $transaction->id, // Pastikan ini sesuai dengan kolom di database
                'debit' => 0,
                'credit' => $transaction->total_price,
                'amount' => $newAmount,
                'description' => 'Reservasi Kamar'
            ]);
        }elseif($transaction->payment_method == 'Cash'){

            $transaction->payment_status = "PENDING";

            $transaction->room_number = rand(1,$transaction->room->total_rooms);

            $transaction->payment_deadline = NULL;

            $transaction->save();
        }elseif($transaction->payment_method == 'Split Payment (Saldo & Cash)'){
            $transaction->payment_status = "PENDING";
            
            $transaction->room_number = rand(1,$transaction->room->total_rooms);

            $transaction->payment_deadline = NULL;
            
            $transaction->save();
        }elseif($transaction->payment_method == 'Split Payment (Saldo & Xendit)'){
            $transaction->payment_status = "PAID";

            $transaction->room_number = rand(1,$transaction->room->total_rooms);

            $transaction->payment_deadline = NULL;

            $transaction->save();

            $lastBalance = Saldo::where('user_id', $transaction->user_id)
                            ->latest()
                            ->first(); // Gunakan first() karena kita akan handle jika null

            // Hitung saldo baru
            $newAmount = $lastBalance ? $lastBalance->amount - $transaction->total_price : $transaction->total_price;

            // Buat record saldo baru
            Saldo::create([
                'user_id' => $transaction->user_id,
                'transaction_id' => $transaction->id, // Pastikan ini sesuai dengan kolom di database
                'debit' => 0,
                'credit' => $transaction->total_price,
                'amount' => $newAmount,
                'description' => 'Reservasi Kamar'
            ]);            
        }
        
        $pesan = "Halo ".$transaction->user->name."!\nTerimakasih telah melakukan pemesanan kamar di Mahir Hotel\nBerikut ini detail reservasi Anda: \nNomor Kamar: *".$transaction->room_number."*\nTipe Kamar: *".$transaction->room->name."*\nTanggal Check-in: *".Carbon::parse($transaction->check_in)->isoFormat('dddd, D MMM YYYY')."*\n\nSemoga liburan Anda menyenangkan!";
        $this->send_message($transaction->phone, $pesan);
        return view('frontpage.payment.success', compact('transaction'));
    }

    public function failed($id)
    {
        $transaction = Transaction::where('invoice',$id)->firstOrFail();
        $room = Room::where('id', $transaction->room_id)->firstOrFail();
        if($transaction->payment_status == "PENDING")  {
            $transaction->payment_status = "CANCELLED";
            $transaction->save();
            $room->incrementAvailableRooms();
        }
        return view('frontpage.payment.failed', compact('transaction'));
    }

    public function addCash(Request $request){
        $data = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'room_id' => 'required|exists:rooms,id',
            'check_in' => 'required',
            'check_out' => 'required',
            'accomodation_plan_id' => 'nullable|array',
            'accomodation_plan_id.*' => 'exists:accomdation_plans,id',
            'promo_id' => 'nullable|array',
            'promo_id.*' => 'exists:promos,id',
        ]);
        // buat data invoice
        $data['invoice'] = 'MH-'.rand(000000,999999); 
        // buat data jumlah malam dari selisih tanggal check in dan out untuk kalkulasi harga akhir
        $nights = date_diff(date_create($data['check_in']), date_create($data['check_out']))->format("%a");

        // Buat data transaction baru dengan beberapa data awal
        // Adapun data lain spt, harga total akan diperbarui di akhir
        $transaction = new Transaction();
        $transaction->user_id = $data['user_id'];
        $transaction->name = $data['name'];
        $transaction->email = $data['email'];
        $transaction->phone = $data['phone'];
        $transaction->room_id = $data['room_id'];
        $transaction->check_in = $data['check_in'];
        $transaction->check_out = $data['check_out'];
        $transaction->invoice = $data['invoice'];
        $transaction->payment_method = 'Split Payment (Saldo & Cash)';
        $transaction->save();
        // lakukan sinkronisasi data accomodation_plan_id dan promo_id
        $transaction->accomodation_plans()->sync($request->accomodation_plan_id);
        $transaction->promos()->sync($request->promo_id);
        $accomodation_plan_amount = 0;
        // Lakukan perulangan untuk menghitung total biaya accomodation plan
        foreach($transaction->accomodation_plans as $accomodation_plan) {
            $accomodation_plan_amount += $accomodation_plan->price;
        }
        $promo_amount = 0;
        // Lakukan perulangan untuk menghituyng total promo
        foreach($transaction->promos as $promo) {
            $promo_amount += $promo->amount;
        }
        $base_price = $nights * $transaction->room->price;
        $promo_price = (int) $base_price * ($promo_amount / 100);
        $saldo = Saldo::where('user_id', Auth::user()->id)->latest()->first();

        $total_amount = $base_price + $accomodation_plan_amount - $promo_price - $saldo->amount;

        $transaction->payment_status = "PENDING";
        $transaction->payment_url = '';
        $transaction->total_price = $total_amount;
        $transaction->save();

        $lastBalance = Saldo::where('user_id', Auth::user()->id)->latest()->first();

        Saldo::create([
            'amount' => 0,
            'user_id' => Auth::user()->id,
            'credit' => $lastBalance->amount,
            'debit' => 0,
            'description' => 'Reservasi Kamar',
        ]);

        return redirect()->route('payment.success', $transaction->invoice);
    }

    public function addXendit(Request $request){
        // Xendit::setApiKey(env('XENDIT_SECRET_KEY'));
        // dd($request->all());
        // ambil dan validasi seluruh request dari user
        $data = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'room_id' => 'required|exists:rooms,id',
            'check_in' => 'required',
            'check_out' => 'required',
            'accomodation_plan_id' => 'nullable|array',
            'accomodation_plan_id.*' => 'exists:accomdation_plans,id',
            'promo_id' => 'nullable|array',
            'promo_id.*' => 'exists:promos,id',
        ]);
        $data['invoice'] = 'MH-'.rand(000000,999999); 
        $nights = date_diff(date_create($data['check_in']), date_create($data['check_out']))->format("%a");
        $transaction = new Transaction();
        $transaction->user_id = $data['user_id'];
        $transaction->name = $data['name'];
        $transaction->email = $data['email'];
        $transaction->phone = $data['phone'];
        $transaction->room_id = $data['room_id'];
        $transaction->check_in = $data['check_in'];
        $transaction->check_out = $data['check_out'];
        $transaction->invoice = $data['invoice'];
        $transaction->payment_method = 'Split Payment (Saldo & Xendit)';
        $transaction->payment_deadline = now()->addHours($this->site_settings->payment_deadline);
        $transaction->save();
        $transaction->accomodation_plans()->sync($request->accomodation_plan_id);
        $transaction->promos()->sync($request->promo_id);
        $accomodation_plan_amount = 0;

        foreach($transaction->accomodation_plans as $accomodation_plan) {
            $accomodation_plan_amount += $accomodation_plan->price;
        }
        $promo_amount = 0;
        foreach($transaction->promos as $promo) {
            $promo_amount += $promo->amount;
        }

        $base_price = $nights * $transaction->room->price;
        $promo_price = (int) $base_price * ($promo_amount / 100);
        $saldo = Saldo::where('user_id', Auth::user()->id)->latest()->first();

        $total_amount = $base_price + $accomodation_plan_amount - $promo_price - $saldo->amount;

        $paymentData = [
            'external_id' => $data['invoice'],
            'amount' => $total_amount,
            'description' => 'Pembayaran '.$transaction->room->name.' dari Mahir Hotel selama '.$nights.' malam',
            'invoice_duration' => 60 * 60 * $this->site_settings->payment_deadline,
            'customer' => [
                'given_names' => $transaction->name,
                'email' => $transaction->email,
                'mobile_number' => $transaction->phone,
            ],
            'success_redirect_url' => route('payment.success', $transaction->invoice),
            'failure_redirect_url' => 'https://yahoo.com',
            'currency' => 'IDR',
            'payment_method' => ["CREDIT_CARD", "BCA", "BNI", "BSI", "BRI", "MANDIRI", "PERMATA", "SAHABAT_SAMPOERNA", "BNC", "ALFAMART", "INDOMARET", "OVO", "DANA", "SHOPEEPAY", "LINKAJA", "JENIUSPAY", "DD_BRI", "DD_BCA_KLIKPAY", "KREDIVO", "AKULAKU", "UANGME", "ATOME", "QRIS"]
        ];
        $room = Room::where('id', $transaction->room_id)->first();
        $apiInstance = new InvoiceApi();
        $createInvoiceRequest = new CreateInvoiceRequest($paymentData);
        try {
            $result = $apiInstance->createInvoice($createInvoiceRequest);
            $transaction->payment_status = "PENDING";
            $transaction->payment_url = $result['invoice_url'];
            $transaction->total_price = $total_amount;
            $transaction->save();

            $lastBalance = Saldo::where('user_id', Auth::user()->id)->latest()->first();

            Saldo::create([
                'amount' => $transaction->total_price - $lastBalance->amount,
                'user_id' => Auth::user()->id,
                'credit' => 0,
                'debit' => $transaction->total_price - $lastBalance->amount,
                'description' => 'Penambahan Saldo dari Xendit',
            ]);

            $room->decrementAvailableRooms();
            return redirect()->route('payment.bill', $transaction->invoice);
        } catch(\Xendit\XenditSdkException $e) {

        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Xendit\Xendit;
class TransactionController extends Controller
{
    public function __consturct() {
        Xendit::setApiKey(env('XENDIT_SECRET_KEY'));
    }

    public function store(Request $request) {
        dd($request->all());
        // $data = $request->validate([
        //     // 'user_id' =>
        // ])
    }
}

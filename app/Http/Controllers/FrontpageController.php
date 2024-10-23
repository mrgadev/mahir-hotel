<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontpageController extends Controller
{
    public function index() {
        return view('frontpage.index');
    }

<<<<<<< HEAD
    public function checkout(){
        return view('frontpage.checkout');
=======
    public function promo() {
        return view('frontpage.promo');
    }

    public function rooms() {
        return view('frontpage.rooms');
    }

    public function room_detail() {
        return view('frontpage.room-detail');
>>>>>>> fd48bc1ea40ff99f407dc4f3421e4bf7623d3ad5
    }
}

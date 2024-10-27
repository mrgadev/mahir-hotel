<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontpageController extends Controller
{
    public function index() {
        return view('frontpage.index');
    }
    public function checkout(){
        return view('frontpage.checkout');
    }
    
    public function promo() {
        return view('frontpage.promo');
    }

    public function rooms() {
        return view('frontpage.rooms');
    }

    public function room_detail() {
        return view('frontpage.room-detail');
    }

    public function services() {
        return view('frontpage.services');
    }

    public function services_detail() {
        return view('frontpage.services-detail');
    }

    public function contact() {
        return view('frontpage.contact');
    }

    public function about() {
        return view('frontpage.about');
    }
}

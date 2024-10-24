<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index() {
        return view('dashboard.admin.dashboard');
    }

    public function editProfile() {
        return view('dashboard.admin.profile.index');
    }
}
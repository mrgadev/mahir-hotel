<?php

namespace App\Http\Controllers;

use App\Models\Regency;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index() {
        return view('dashboard.admin.dashboard');
    }

    public function editProfile() {
        $regencies = Regency::all();
        return view('dashboard.admin.profile.index', compact('regencies'));
    }
}

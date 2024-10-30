<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Room;
use App\Models\Promo;
use App\Models\Room;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use App\Models\NearbyLocation;
use App\Models\HotelFacilities;
use App\Models\ServiceCategory;

class FrontpageController extends Controller
{
    public function index() {
        $faqs = Faq::all();
        $nearby_locations = NearbyLocation::all();
        $hotel_facilities = HotelFacilities::all();
        $rooms = Room::all();
        return view('frontpage.index', compact('faqs', 'nearby_locations', 'hotel_facilities', 'rooms'));
    }
    public function checkout(){
        return view('frontpage.checkout');
    }
    
    public function promo() {
        $promos = Promo::all();
        return view('frontpage.promo', compact('promos'));
    }

    public function rooms() {
        $rooms = Room::all();
        return view('frontpage.rooms', compact('rooms'));
    }

    public function room_detail(string $id) {
        $room = Room::with('room_facility')->findOrFail($id);
        // dd($room->id);
        return view('frontpage.room-detail', compact('room'));
    }

    public function services(Request $request) {
        $serviceCategories = ServiceCategory::all();

        $selectedCategory = $request->input('category', 'Semua');

        if ($selectedCategory === 'Semua') {
            $services = Service::all();
        } else {
            $services = Service::whereHas('serviceCategory', function ($query) use ($selectedCategory) {
                $query->where('name', $selectedCategory);
            })->get();
        }
        return view('frontpage.services', [
            'serviceCategories' => $serviceCategories,
            'selectedCategory' => $selectedCategory,
            'services' => $services,
        ]);
    }

    public function services_detail(String $id) {
        $service = Service::findOrFail($id);
        return view('frontpage.services-detail', compact('service'));
    }

    public function contact() {
        return view('frontpage.contact');
    }

    public function about() {
        return view('frontpage.about');
    }
}

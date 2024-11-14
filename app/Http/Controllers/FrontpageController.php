<?php

namespace App\Http\Controllers;

use App\Models\AccomdationPlan;
use App\Models\Faq;
use App\Models\Room;
use App\Models\Promo;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use App\Models\NearbyLocation;
use App\Models\HotelFacilities;
use App\Models\RoomReview;
use App\Models\SiteSettingPartner;
use App\Models\SiteSettings;

class FrontpageController extends Controller
{
    public function index() {
        $faqs = Faq::all();
        $nearby_locations = NearbyLocation::all();
        $hotel_facilities = HotelFacilities::all();
        $rooms = Room::all();
        $site_setting = SiteSettings::where('id', 1)->firstOrFail();
        $partners = SiteSettingPartner::all();
        return view('frontpage.index', compact('faqs', 'nearby_locations', 'hotel_facilities', 'rooms', 'site_setting', 'partners'));
    }
    public function checkout(String $id, Request $request){
        $room = Room::find($id);

        $accomodation_plans = AccomdationPlan::all();

        $promos = Promo::where('is_all', true)->get();

        if ($request->filled(['check_in', 'check_out'])) {
            session([
                'check_in' => $request->check_in,
                'check_out' => $request->check_out,
            ]);
        }

        return view('frontpage.checkout', compact('room', 'accomodation_plans', 'promos'));
    }
    
    public function promo() {
        $promos = Promo::all();
        return view('frontpage.promo', compact('promos'));
    }

    public function rooms(Request $request) {
        $room_id = $request->input('room_id');
    
        $rooms = Room::when($room_id, function($query) use ($room_id) {
            return $query->where('id', $room_id);
        })->get();
        
        return view('frontpage.rooms', compact('rooms', 'room_id'));
    }

    public function room_detail(Room $room) {
        // $room = Room::where('slug',$slug)->with('room_facility')->get();
        // dd($room->id);
        // $promo = Promo::where('room_id', $room->id)->get();
        $other_room = Room::whereNot('id', $room->id)->get();
        $reviews = RoomReview::where('room_id', $room->id)->get();
        return view('frontpage.room-detail', compact('room', 'other_room', 'reviews'));
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

    public function search(Request $request){
        if($request->input('room_id')){
            $room_id = $request->input('room_id');
            $room = Room::where('id', $room_id)->first();

            if ($request->filled(['check_in', 'check_out'])) {
                session([
                    'check_in' => $request->check_in,
                    'check_out' => $request->check_out,
                ]);
            }
        
            return redirect()->route('frontpage.rooms.detail', $room->slug);
        }else{
            return redirect()->route('frontpage.rooms');
        }
    }
}

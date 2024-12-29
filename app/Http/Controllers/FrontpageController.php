<?php

namespace App\Http\Controllers;

use App\Models\AccomdationPlan;
use App\Models\Faq;
use App\Models\FrontpageSiteSetting;
use App\Models\HotelAward;
use App\Models\Room;
use App\Models\Promo;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use App\Models\NearbyLocation;
use App\Models\HotelFacilities;
use App\Models\HotelService;
use App\Models\RoomReview;
use App\Models\Saldo;
use App\Models\SiteSettingPartner;
use App\Models\SiteSettings;
use Illuminate\Support\Facades\Auth;

class FrontpageController extends Controller
{
    public function index() {
        $faqs = Faq::all();
        $nearby_locations = NearbyLocation::all();
        $hotel_facilities = HotelFacilities::all();
        $rooms = Room::all();
        $site_setting = SiteSettings::where('id', 1)->firstOrFail();
        $frontpage_site_setting = FrontpageSiteSetting::where('id',1)->first();
        $partners = SiteSettingPartner::all();
        $room_reviews = RoomReview::where('visibility', 'Tampilkan')->limit(4)->get();
        $hotel_services = HotelService::limit(4)->get();
        $hotel_awards = HotelAward::limit(4)->get();
        return view('frontpage.index', compact('faqs', 'nearby_locations', 'hotel_facilities', 'rooms', 'site_setting', 'partners', 'room_reviews', 'hotel_services', 'hotel_awards', 'frontpage_site_setting'));
    }
    public function checkout(String $id, Request $request){
        $room = Room::find($id);

        $accomodation_plans = AccomdationPlan::all();

        $promos = Promo::where('is_all', true)->get();

        $user = Auth::user();
        if($user) {
            if ($request->filled(['check_in', 'check_out'])) {
                session([
                    'check_in' => $request->check_in,
                    'check_out' => $request->check_out,
                ]);
                $saldo = Saldo::where('user_id', $user->id)
                        ->latest()
                        ->first();
                return view('frontpage.checkout', compact('room', 'accomodation_plans', 'promos', 'saldo'));
            } else {
                return redirect()->back()->with('error', 'Tanggal check-in wajib diisi!');
            }
        } else {
            return redirect()->route('login')->with('error', 'Silahkan login untuk melakukan reservasi');
        }


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
        $site_setting = SiteSettings::where('id', 1)->first();
        $other_room = Room::whereNot('id', $room->id)->get();
        $reviews = RoomReview::where('room_id', $room->id)->where('visibility', 'Tampilkan')->paginate(5);
        return view('frontpage.room-detail', compact('room', 'other_room', 'reviews', 'site_setting'));
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
            return redirect()->route('frontpage.index')->with('error', 'Kamar atau tanggal reservasi belum dipilih!');
        }
    }
}

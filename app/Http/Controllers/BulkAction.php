<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Room;
use App\Models\User;
use App\Models\Promo;
use App\Models\Message;
use App\Models\Service;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\NearbyLocation;
use App\Models\RoomFacilities;
use App\Models\AccomdationPlan;
use App\Models\HotelFacilities;
use App\Models\ServiceCategory;

class BulkAction extends Controller
{
    public function hotelFacilitiesBulkDelete(Request $request) {
        $facilities_ids = $request->input('facilities_ids', []);
        
        if (empty($facilities_ids)) {
            return response()->json(['success' => false, 'message' => 'Tidak ada data yang dipilih']);
        }

        HotelFacilities::whereIn('id', $facilities_ids)->delete();

        return response()->json(['success' => true, 'message' => 'Data fasilitas berhasil dihapus']);
    }

    public function nearbyLocationBulkDelete(Request $request)
    {
        $location_ids = $request->input('location_ids', []);
        
        if (empty($location_ids)) {
            return response()->json(['success' => false, 'message' => 'Tidak ada data yang dipilih']);
        }

        NearbyLocation::whereIn('id', $location_ids)->delete();

        return response()->json(['success' => true, 'message' => 'Data lokasi berhasil dihapus']);
    }

    public function faqBulkDelete(Request $request){
        $faq_ids = $request->input('faq_ids', []);
        
        if (empty($faq_ids)) {
            return response()->json(['success' => false, 'message' => 'Tidak ada data yang dipilih']);
        }

        Faq::whereIn('id', $faq_ids)->delete();

        return response()->json(['success' => true, 'message' => 'Data FAQ berhasil dihapus']);
    }

    public function roomBulkDelete(Request $request){
        $room_ids = $request->input('room_ids', []);
        
        if (empty($room_ids)) {
            return response()->json(['success' => false, 'message' => 'Tidak ada data yang dipilih']);
        }

        Room::whereIn('id', $room_ids)->delete();

        return response()->json(['success' => true, 'message' => 'Data kamar berhasil dihapus']);
    }

    public function roomFacilitiesBulkDelete(Request $request){
        $facilities_ids = $request->input('facilities_ids', []);
        
        if (empty($facilities_ids)) {
            return response()->json(['success' => false, 'message' => 'Tidak ada data yang dipilih']);
        }

        RoomFacilities::whereIn('id', $facilities_ids)->delete();

        return response()->json(['success' => true, 'message' => 'Data fasilitas kamar berhasil dihapus']);
    }

    public function accomodationPlanBulkDelete(Request $request){
        $plan_ids = $request->input('plan_ids', []);
        
        if (empty($plan_ids)) {
            return response()->json(['success' => false, 'message' => 'Tidak ada data yang dipilih']);
        }

        AccomdationPlan::whereIn('id', $plan_ids)->delete();

        return response()->json(['success' => true, 'message' => 'Data paket kamar berhasil dihapus']);
    }

    public function serviceBulkDelete(Request $request){
        $service_ids = $request->input('service_ids', []);
        
        if (empty($service_ids)) {
            return response()->json(['success' => false, 'message' => 'Tidak ada data yang dipilih']);
        }

        Service::whereIn('id', $service_ids)->delete();

        return response()->json(['success' => true, 'message' => 'Data layanan berhasil dihapus']);
    }

    public function serviceCategoryBulkDelete(Request $request){
        $service_category_ids = $request->input('service_category_ids', []);
        
        if (empty($service_category_ids)) {
            return response()->json(['success' => false, 'message' => 'Tidak ada data yang dipilih']);
        }

        ServiceCategory::whereIn('id', $service_category_ids)->delete();

        return response()->json(['success' => true, 'message' => 'Data kategori layanan berhasil dihapus']);
    }

    public function promoBulkDelete(Request $request){
        $promo_ids = $request->input('promo_ids', []);
        
        if (empty($promo_ids)) {
            return response()->json(['success' => false, 'message' => 'Tidak ada data yang dipilih']);
        }

        Promo::whereIn('id', $promo_ids)->delete();

        return response()->json(['success' => true, 'message' => 'Data promo berhasil dihapus']);
    }

    public function pesanBulkDelete(Request $request){
        $message_ids = $request->input('message_ids', []);
        
        if (empty($message_ids)) {
            return response()->json(['success' => false, 'message' => 'Tidak ada data yang dipilih']);
        }

        Message::whereIn('id', $message_ids)->delete();

        return response()->json(['success' => true, 'message' => 'Data Pesan berhasil dihapus']);
    }

    public function updateRole(Request $request)
    {
        $user_ids = $request->input('user_ids', []);
        $role_id = $request->input('role_id');
        
        if (empty($user_ids)) {
            return redirect()->back()->with('error', 'Tidak ada data yang dipilih');
        }

        if (empty($role_id)) {
            return redirect()->back()->with('error', 'tidak ada role yang dipilih');
        }

        foreach($user_ids as $user_id) {
            $user = User::find($user_id);
            if($user) {
                $user->syncRoles([$role_id]);
            }
        }

        return redirect()->route('dashboard.users_management.index')->with('success', 'Data pengguna berhasil diubah');
    }
    public function updateCheckInStatus(Request $request)
    {
        $transaction_ids = $request->input('transaction_ids', []);
        $checkin_status = $request->input('checkin_status');
        
        if (empty($user_ids)) {
            return redirect()->back()->with('error', 'Tidak ada data yang dipilih');
        }

        foreach($transaction_ids as $transaction_id) {
            $transaction = Transaction::find($transaction_id);
            if($transaction) {
                $transaction->checkin_status = $checkin_status;
                $transaction->save;
            }
        }

        return redirect()->route('dashboard.transaction.index')->with('success', 'Status check-in berhasil diubah');
    }
}

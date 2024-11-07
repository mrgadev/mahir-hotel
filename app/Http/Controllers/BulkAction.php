<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HotelFacilities;

class BulkAction extends Controller
{
    public function hotelFacilitiesBulkDelete(Request $request) {
        try {
            $ids = $request->ids;
            HotelFacilities::whereIn('id', $ids)->delete();
            
            return response()->json([
                'success' => true,
                'message' => 'Records deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting records: ' . $e->getMessage()
            ], 500);
        }
    }
}

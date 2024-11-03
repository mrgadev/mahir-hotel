<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoogleIcons extends Model
{
    protected $fillable = ['name', 'entity'];
    public function hotel_facilities() {
        return $this->hasMany(HotelFacilities::class);
    }

    public function room_facilities() {
        return $this->hasMany(RoomFacilities::class);
    }
}

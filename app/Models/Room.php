<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'photos', 'cover', 'room_facilities_id', 'price'];

    public function room_facility() {
        return $this->belongsToMany(RoomFacilities::class);
    }
}

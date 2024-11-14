<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'photos', 'cover', 'room_facilities_id', 'price', 'total_rooms', 'available_rooms'];

    public function room_facility() {
        return $this->belongsToMany(RoomFacilities::class);
    }

    public function promos(){
        return $this->belongsToMany(Promo::class);
    }

    public function transactions() {
        return $this->hasMany(Transaction::class);
    }

    public function room_reviews() {
        return $this->hasMany(RoomReview::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Room extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'photos', 'cover', 'room_facilities_id', 'price', 'total_rooms', 'available_rooms'];

    // protected $casts = ['photos' => 'array'];

    // protected static function boot() {
    //     parent::boot();

    //     static::deleting(function($room) {
    //         // if room has many photos
    //         if(!empty($room->photos)) {
    //             $photos = explode('|',$room->photos);
    //             foreach($photos as $photo) {
    //                 // $fullPath = 'rooms/' . $photo;
    //                 // Delete the room photos physically
    //                 if(Storage::exists($photo)) {
    //                     Storage::delete($photo);
    //                 }
    //             }
    //         }
    //         if(!empty($room->cover) && Storage::exists($room->cover)) {
    //             Storage::delete($room->cover);
    //         }
    //     });
    // }

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

    public function decrementAvailableRooms()
    {
        $this->decrement('available_rooms');
    }

    public function incrementAvailableRooms()
    {
        $this->increment('available_rooms');
    }

    public function room_rules() {
        return $this->hasMany(RoomRule::class);
    }
}

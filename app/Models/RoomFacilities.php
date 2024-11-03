<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomFacilities extends Model
{
    protected $fillable = ['icon', 'name', 'description', 'google_icons_id'];

    public function rooms() {
        return $this->belongsToMany(Room::class);
    }

    public function google_icons() {
        return $this->belongsTo(GoogleIcons::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomFacilities extends Model
{
    protected $fillable = ['icon', 'name', 'description'];

    public function rooms() {
        return $this->belongsToMany(Room::class);
    }
}

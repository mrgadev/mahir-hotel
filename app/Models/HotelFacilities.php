<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelFacilities extends Model
{
    protected $fillable = [
        'name',
        'description',
        'icon',
        'google_icons_id'
    ];

    public function google_icons() {
        return $this->belongsTo(GoogleIcons::class);
    }
}

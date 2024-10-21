<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelFacilities extends Model
{
    protected $fillable = [
        'name',
        'description',
        'icon',
    ];
}

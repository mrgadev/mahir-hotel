<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomReview extends Model
{
    protected $fillable = ['title', 'review', 'images', 'rating'];
}

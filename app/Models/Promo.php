<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    protected $fillable = ['name', 'code', 'cover', 'amount','start_date', 'end_date'];
}

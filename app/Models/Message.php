<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['title', 'slug', 'name', 'user_id', 'email', 'phone', 'message'];
    public function user() {
        return $this->belongsTo(User::class);
    }
}

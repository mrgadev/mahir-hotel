<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSettings extends Model
{
    protected $fillable = ['tagline', 'description', 'maps_link', 'address', 'phone', 'phone_text', 'payment_deadline'];
    public function site_social_media() {
        return $this->hasMany(SiteSocialMedia::class);
    }
}

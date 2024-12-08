<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSettings extends Model
{
    protected $fillable = [
        'tagline',
        'description',
        'maps_link',
        'address',
        'phone',
        'phone_text',
        'payment_deadline',
        'checkin_time',
        'checkout_time',
        'our_service_title',
        'our_location_title',
        'our_location_desc',
        'our_facilities_title',
        'testimonial_title',
        'award_title',
        'award_desc',
        'cta_text',
        'cta_button_link',
        'cta_button_text',

        'hero_cover',
        'service_image',
        'faq_illustration'
    ];

    public function site_social_media() {
        return $this->hasMany(SiteSocialMedia::class);
    }
}

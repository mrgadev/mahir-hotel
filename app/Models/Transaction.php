<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'room_id',
        'check_in',
        'check_out',
        'accomdation_plan_id',
        'service_id',
        'notes',
        'checkin_status',

        'invoice',
        'payment_url',
        'payment_status',
        'payment_method',
        'total_price',
        'promo_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function room() {
        return $this->belongsTo(Room::class);
    }

    public function accomodation_plans() {
        return $this->belongsToMany(AccomdationPlan::class, 'transaction_accomodation_plans');
    }

    public function service() {
        return $this->belongsTo(Service::class);
    }

    public function promos() {
        return $this->belongsToMany(Promo::class, 'transaction_promos');
    }
}

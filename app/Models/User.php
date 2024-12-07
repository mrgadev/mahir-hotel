<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use  HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'birth',
        'otp',
        'access',
        'regency_id',
        'avatar',
        'id_number',
        'id_photo',
        'bank_id',
        'nomor_rekening'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'birth' => 'date',
    ];

    public function regency() {
        return $this->belongsTo(Regency::class);
    }

    public function messages() {
        return $this->hasMany(Message::class);
    }

    public function transactions() {
        return $this->hasMany(Transaction::class);
    }

    public function room_reviews() {
        return $this->hasMany(RoomReview::class);
    }

    public function saldo(){
        return $this->hasMany(Saldo::class);
    }

    public function PenarikanSaldo(){
        return $this->hasMany(PenarikanSaldo::class);
    }

    public function bank(){
        return $this->belongsTo(Bank::class);
    }
}
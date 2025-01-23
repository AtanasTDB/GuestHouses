<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'user_id',
        'guest_house_id',
        'reservation_date',
        'leaving_date',
        'price',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function guestHouse()
    {
        return $this->belongsTo(GuestHouse::class);
    }
}

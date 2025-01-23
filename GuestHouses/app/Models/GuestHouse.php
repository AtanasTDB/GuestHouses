<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuestHouse extends Model
{
    protected $fillable = [
        'name',
        'type',
        'single_beds',
        'double_beds',
        'price_per_night',
        'hasPool',
        'hasInternet',
        'rating',
        'location_id',

    ];
    public static function boot(){
    
    parent::boot(); 

    static::saving(function ($guestHouse) {
        
        $guestHouse->capacity = $guestHouse->single_beds + ($guestHouse->double_beds * 2);
    });
    }
    
    public function images()
    {
        return $this->hasMany(GuestHouseImageUrl::class);
    }

    
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    
    public function location()
    {
        return $this->belongsTo(GuestHouseLocation::class);
    }
}

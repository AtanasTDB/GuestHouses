<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuestHouseLocation extends Model
{
    protected $fillable = ['name','type'];

    public function guestHouses()
    {
        return $this->hasMany(GuestHouse::class);
    }
}

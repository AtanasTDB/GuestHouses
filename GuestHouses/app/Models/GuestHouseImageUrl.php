<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuestHouseImageUrl extends Model
{
    protected $table = 'guest_houses_imageurls';
    protected $fillable = ['guest_house_id', 'image_path'];

    public function guestHouse()
    {
        return $this->belongsTo(GuestHouse::class);
    }
}

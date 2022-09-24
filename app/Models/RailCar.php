<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RailCar extends Model
{
    use HasFactory;
    protected $guarded = [];

    //STATUS CONSTANTS
     const STATUS_PARKED = 'PARKED';
     const STATUS_LOADING = 'LOADING';
     const STATUS_LOADED = 'LOADED';
     const STATUS_SHIPPED = 'SHIPPED';
     const STATUS_ARCHIVED = 'ARCHIVED';

    //AREA CONSTANTS
    const AREA_YARD = 'YARD';
    const AREA_NORTH_GATE = 'NORTH_GATE';
    const AREA_SOUTH_SIDE = 'SOUTH_SIDE';
    const AREA_PLATFORM_1 = 'PLATFORM_1';
    const AREA_PLATFORM_2 = 'PLATFORM_2';
    const AREA_PLATFORM_3 = 'PLATFORM_3';

    public function user(){
        return $this->belongsTo(User::class);
    }

}

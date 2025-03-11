<?php

namespace App\Models\Booking;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{

    protected $fillable = [
        'name',
        'email' , 
        'phone', 
        'date',
        'time',
        'partysize'
    ];
}


<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    protected $fillable = ['user_id','services_id','associate_id', 'disp_id', 'booking_date', 'booking_time'];
}

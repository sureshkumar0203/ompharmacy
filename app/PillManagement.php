<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PillManagement extends Model
{
	protected $table = 'pills_managements';
	
    protected $fillable = ['user_id','medicine','start_date', 'time', 'days', 'alert_type', 'status'];

    public function user_det()
    {
        return $this->belongsTo('App\UserRegistration', 'user_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class measurement extends Model
{
    protected $fillable = ['user_id', 'measurements_type_id', 'measurements_value'];

    public function user_det(){
    	return $this->belongsTo('App\UserRegistration', 'user_id'); 
    }

    public function measurement_types(){
    	return $this->belongsTo('App\measurement_type', 'measurements_type_id'); 
    }
}

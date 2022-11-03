<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HealthActivity extends Model
{
    protected $fillable = ['user_id', 'description'];

    public function user_det(){
    	return $this->belongsTo('App\UserRegistration', 'user_id'); 
    }
}

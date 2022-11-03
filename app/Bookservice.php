<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookservice extends Model
{
	protected $table = 'book_services';
	
    protected $fillable = ['user_id', 'services_id', 'associate_ids', 'acpt_status', 'req_acpt_id', 'req_assign_by', 'disp_only_adm', 'price', 'booking_date', 'booking_time', 'service_address', 'lat', 'lng', 'cancel_note'];

    public function user_det(){
    	return $this->belongsTo('App\UserRegistration','user_id'); 
    }

    public function service_det(){
    	return $this->belongsTo('App\Services','services_id');
    }

    public function ass_det(){
    	return $this->belongsTo('App\User','req_acpt_id');
    }

    public function assign_by(){
        return $this->belongsTo('App\User','req_assign_by');
    }

    public function feedback(){
        return $this->hasMany('App\RatingReview','booking_id');
    }
}

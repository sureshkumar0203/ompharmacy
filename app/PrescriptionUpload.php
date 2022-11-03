<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrescriptionUpload extends Model
{
    protected $fillable = ['user_id','image','note', 'address', 'status'];

    public function user_det()
    {
        return $this->belongsTo('App\UserRegistration', 'user_id');
    }
}

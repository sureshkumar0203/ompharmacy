<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class AssociateDocument extends Model
{
    protected $fillable = ['user_id', 'id_proof', 'residence_proof', 'educational_certificates', 'verification_certificate', 'experience_certificate', 'agreement_letter'];

    public function associate_user(){
    	return $this->belongsTo('App\User');
    }
}

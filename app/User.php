<?php

namespace App;
use App\AssociateDocument;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'phone_no', 'landline', 'tollfree_no', 'address', 'lat', 'lng', 'permanent_address', 'dob', 'skill', 'experience', 'fathers_name', 'zone', 'gst_no', 'facebook_url', 'twitter_url', 'linkedin_url', 'googleplus_url', 'image', 'associate_id', 'type', 'active'];

    public function associate_doc(){
        return $this->hasMany('App\AssociateDocument');
        
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}

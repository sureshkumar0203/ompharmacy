<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRegistration extends Model
{
    protected $fillable = ['first_name','last_name','phone', 'email', 'address', 'pincode', 'profile_img', 'disease_profile', 'consultant_contact_dtls', 'hospital_dtls', 'relative_contact_dtls', 'password', 'lat', 'lng', 'status'];

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class deviceToken extends Model
{
    protected $table = 'device_tokens';
	
    protected $fillable = ['ass_user_id', 'user_type', 'device_token'];
}

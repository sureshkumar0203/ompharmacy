<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuPermit extends Model
{
    protected $table = 'menu_permit';
	
    protected $fillable = ['user_id', 'menu_id', 'sub_menu_id', 'status'];
}

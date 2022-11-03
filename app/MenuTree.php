<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuTree extends Model
{
    protected $table = 'menu';
	
    protected $fillable = ['menu_name', 'link', 'class_name', 'status'];
}

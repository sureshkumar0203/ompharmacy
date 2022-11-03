<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubmenuTree extends Model
{
    protected $table = 'sub_menu';
	
    protected $fillable = ['menu_id', 'name', 'link', 'status'];
}

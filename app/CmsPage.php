<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmsPage extends Model
{
    protected $fillable = ['title', 'slug', 'description', 'image', 'banner_img', 'adv_img', 'btn_name', 'parent_id', 'status', 'service_request', 'from_time', 'to_time', 'time24_status'];

    public function parent()
    {
        return $this->belongsTo('App\CmsPage');
    }

    public function service(){
    	return $this->hasMany('App\Services','cms_id');
    }
}

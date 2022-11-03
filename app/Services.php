<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $fillable = ['cms_id', 'name', 'shot_description', 'test_id', 'sale_price', 'hour', 'minute'];

    public function cms_page()
    {
        return $this->belongsTo('App\CmsPage','cms_id');
    }
}

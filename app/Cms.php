<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cms extends Model
{
    protected $fillable = ['title', 'slug', 'content', 'meta_title', 'meta_keywords', 'meta_description'];
}

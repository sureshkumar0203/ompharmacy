<?php

namespace App;
use App\BlogComment;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['title', 'slug', 'sort_description', 'description', 'image', 'author', 'meta_title', 'meta_keyword', 'meta_description'];

    public function blog_comment(){
    	return $this->haMany('App\BlogComment'); 
    }
}

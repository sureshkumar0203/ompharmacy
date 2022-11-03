<?php

namespace App;
use App\Blog;
use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    protected $fillable = ['blog_id','name','email', 'comment'];

    public function blog(){
    	return $this->belongsTo('App\Blog'); 
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RatingReview extends Model
{
    protected $fillable = ['booking_id','rated_by','type', 'rating', 'feedback'];

    public function book_det(){
        return $this->belongsTo('App\Bookservice','booking_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionHistory extends Model
{
    protected $table = 'transaction_history';
	
    protected $fillable = ['user_id', 'booking_id', 'transfer_status', 'debit_amount', 'credit_amount', 'transaction_id', 'transfer_id'];

    public function book_ser(){
    	return $this->belongsTo('App\Bookservice','booking_id'); 
    }

    public function user(){
    	return $this->belongsTo('App\UserRegistration', 'user_id');
    }

    public function transfer(){
    	return $this->belongsTo('App\Banktransfer','transfer_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banktransfer extends Model
{
	protected $table = 'bank_transfers';
	
    protected $fillable = ['account_holder_name', 'account_number', 'branch_name', 'bank_name', 'ifsc_code', 'amount', 'status'];

    public function banktrans(){
    	return $this->hasMany('App\TransactionHistory','transfer_id');
    }
}

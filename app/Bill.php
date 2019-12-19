<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bills';

    public function bill_detail()
    {
    	return $this->hasMany('App\BillDetail','id_bill','bill_id');
    }

    public function customer()
    {
    	return $this->belongsTo('App\Customer','id_customer','cus_id');
    	// return $this->belongsTo('App\Customer','id_customer','id');
    }
}

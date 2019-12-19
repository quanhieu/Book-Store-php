<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';

    public function bill()
    {
    	return $this->hasMany('App\Bill','id_customer','cus_id');
    }

    public function comment()
    {
    	return $this->belongsTo('App\Comment','id_customer','cus_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';
    protected $primaryKey = 'com_id';
    protected $guarded = [];

    public function customer()
    {
    	return $this->hasMany('App\Customer','id_customer','cus_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bills';
    protected $primaryKey = 'bill_id';
    protected $guarded = [];
}

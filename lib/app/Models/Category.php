<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'type_products';
    protected $primaryKey = 'cate_id';
    protected $guarded = [];
}

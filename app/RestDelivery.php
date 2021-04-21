<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestDelivery extends Model
{
    protected $fillable = [
        'tienda_id','delivery_id'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $table = 'deliveries';

    protected $fillable = [
        'persona_id', 'telefono', 'logo'
    ];

}

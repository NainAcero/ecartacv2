<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $fillable = [
        'day','tienda_id', 'estatus', 'start_time', 'end_time'
    ];
}

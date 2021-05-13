<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    //

    public function tiendas()
    {
        return $this->hasMany(Tienda::class);
    }
}

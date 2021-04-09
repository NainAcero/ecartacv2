<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
    public function tienda()
    {
        return $this->hasOne(Tienda::class);
    }
}

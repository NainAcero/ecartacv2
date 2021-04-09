<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tienda extends Model
{
    protected $fillable = [
        'portada'
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }
    public function categorias()
    {
        return $this->hasMany(Categoria::class);
    }

}

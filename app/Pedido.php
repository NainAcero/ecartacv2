<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';

    protected $fillable = [
        'tienda_id', 'nombre', 'telefono', 'direccion', 'estado'
    ];

    public function cartas() {
        return $this->hasMany(Carta::class);
    }
}

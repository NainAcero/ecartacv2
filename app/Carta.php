<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carta extends Model
{
    protected $table = 'cartas';

    protected $fillable = [
        'pedido_id', 'cantidad', 'precio', 'descripcion', 'producto_id'
    ];

    public function producto() {
        return $this->belongsTo(Producto::class);
    }
}

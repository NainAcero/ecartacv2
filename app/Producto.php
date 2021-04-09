<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Producto extends Model
{
    use Searchable;

    protected $fillable = [
        'portada','estado'
    ];

    public function tienda()
    {
        return $this->belongsTo(Tienda::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    // public function searchableAs()
    // {
    //     return 'posts_index';
    // }
    public function shouldBeSearchable()
    {
        return $this->estado;
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();
        $array['tienda'] = $this->tienda['tienda'];
        $array['categoria'] = $this->categoria['categoria'];
        // $array['products'] = $this->producto;

        return $array;
    }
}

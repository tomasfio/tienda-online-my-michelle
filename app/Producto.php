<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $primaryKey = 'codigo';
    public $incrementing = false;

    public function subcategoria()
    {
        return $this->belongsTo('App\Subcategoria');
    }

    public function imagenes()
    {
        return $this->hasMany(ImagenesProducto::class, 'cod_producto', 'codigo');
    }

    public function opciones()
    {
        return $this->hasMany(OpcionProducto::class, 'cod_producto', 'codigo');
    }
}

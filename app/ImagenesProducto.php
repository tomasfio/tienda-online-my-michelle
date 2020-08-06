<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagenesProducto extends Model
{
    protected $table = 'imagenes_productos';
    protected $primaryKey = 'nombre_imagen';
    public $incrementing = false;
}

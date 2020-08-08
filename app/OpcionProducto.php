<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OpcionProducto extends Model
{
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}

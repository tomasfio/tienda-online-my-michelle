<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{
    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }
}

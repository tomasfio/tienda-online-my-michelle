<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public function subcategoria()
    {
        return $this->belongsTo('App\Subcategoria');
    }
}

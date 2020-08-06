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
}

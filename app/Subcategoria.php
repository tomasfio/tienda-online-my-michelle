<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;

class Subcategoria extends Model
{
    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }

    public function productos(){
        return $this->hasMany(Producto::class, 'subcategoria_id', 'id');
    }

    public function deleteProductos(){
        if($this->productos != null){
            foreach($this->productos as $producto){
                try{
                    $producto->DeleteImagenes();
                    $producto->delete();
                }
                catch(QueryException $e){
                    $producto->activo = false;
                    $producto->update();
                }
            }
        }
    }
}

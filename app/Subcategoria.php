<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\File;

class Subcategoria extends Model
{
    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }

    public function productos(){
        return $this->hasMany(Producto::class, 'subcategoria_id', 'id');
    }

    public function delete_imagen(){
        if($this->nombre_imagen != null){
            $image_path = public_path().'/img/'.$this->nombre_imagen;
            if(File::exists($image_path)){
                File::delete($image_path);
            }

            $this->nombre_imagen = null;
        }
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

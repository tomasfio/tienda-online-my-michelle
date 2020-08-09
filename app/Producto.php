<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

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

    public function DeleteImagenes(){
        if($this->imagenes != null){
            foreach($this->imagenes as $imagen){
                $image_path = public_path().'/img/'.$imagen->nombre_imagen;
                if(File::exists($image_path)){
                    File::delete($image_path);
                }
            }
        }
    }
}

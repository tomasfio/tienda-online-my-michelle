<?php

namespace App;

use DateTime;
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
        return $this->hasMany(ImagenesProducto::class, 'cod_producto', 'codigo')
            ->orderBy('principal', 'desc');
    }

    public function opciones()
    {
        return $this->hasMany(OpcionProducto::class, 'cod_producto', 'codigo');
    }
    
    public function imagen_principal()
    {
        return $this->hasOne(ImagenesProducto::class, 'cod_producto', 'codigo')
            ->where('principal', '=', '1')
            ->oldest();
    }

    public function nuevo()
    {
        return date_diff($this->created_at, new DateTime('now'))->d <= 14;
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

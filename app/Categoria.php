<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;

class Categoria extends Model
{
    public $timestamps = false;

    public function subcategorias(){
        return $this->hasMany(Subcategoria::class, 'categoria_id', 'id');
    }

    public function deleteSubcategorias(){
        if($this->subcategorias != null){
            foreach($this->subcategorias as $subCat){
                $subCat->deleteProductos();
                try{
                    $subCat->delete();
                }
                catch(QueryException $e){
                    $subCat->activo = false;
                    $subCat->update();
                }
            }
        }
    }
}

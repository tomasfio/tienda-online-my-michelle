<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'Tienda\HomeController@index');
Route::get('/contact', 'Tienda\ContactoController@index');
Route::get('/categoria/{categoria}', 'Tienda\CategoriaController@index');
Route::get('/subcategoria/{subcategoria}', 'Tienda\SubCategoriaController@index');
Route::get('/producto/{producto}', 'Tienda\ProductoController@index');
Route::get('/productos', 'Tienda\ProductosController@index');
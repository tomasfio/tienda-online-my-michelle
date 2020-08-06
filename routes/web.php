<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', 'HomeController@index');

Route::group(['middleware' => ['auth', 'permission:gestionar_pagina']], function () {
    Route::get('/usuarios', 'UserController@index')->middleware('permission:users_abm');
    Route::resource('/productos', 'ProductoController');
    Route::resource('/subcategorias', 'SubcategoriaController');

    Route::get('/productos/{producto}/galeria', 'GaleriaController@index')->name('product.galleria.index');
    Route::post('/productos/{producto}/galeria', 'GaleriaController@add')->name('product.galleria.add');
    Route::delete('/productos/{producto}/galeria', 'GaleriaController@delete')->name('product.galeria.destroy');
    Route::patch('/productos/{producto}/galeria', 'GaleriaController@update')->name('product.galeria.update');
});

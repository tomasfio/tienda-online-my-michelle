<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'Gestion\AdminHomeController@index');
Route::get('login', 'Gestion\Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Gestion\Auth\LoginController@login');
Route::post('logout', 'Gestion\Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => ['auth', 'permission:gestionar_pagina']], function () {
    Route::get('/usuarios', 'Gestion\UserController@index')->middleware('permission:users_abm');
    Route::resource('/categorias', 'Gestion\CategoriaController');
    Route::resource('/productos', 'Gestion\ProductoController');
    Route::resource('/subcategorias', 'Gestion\SubcategoriaController');
    Route::resource('/clientes', 'Gestion\ClienteController');

    Route::get('/productos/{producto}/galeria', 'Gestion\GaleriaController@index')->name('product.galleria.index');
    Route::post('/productos/{producto}/galeria', 'Gestion\GaleriaController@add')->name('product.galleria.add');
    Route::delete('/productos/{producto}/galeria', 'Gestion\GaleriaController@delete')->name('product.galeria.destroy');
    Route::patch('/productos/{producto}/galeria', 'Gestion\GaleriaController@update')->name('product.galeria.update');
});
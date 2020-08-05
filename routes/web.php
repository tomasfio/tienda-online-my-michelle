<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', 'HomeController@index');

Route::group(['middleware' => ['auth', 'permission:gestionar_pagina']], function () {
    Route::get('/usuarios', 'UserController@index')->middleware('permission:users_abm');
    Route::resource('/productos', 'ProductoController');
    Route::resource('/subcategorias', 'SubcategoriaController');
});

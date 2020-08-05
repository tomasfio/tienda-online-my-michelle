<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/usuarios', 'UserController@index');
    Route::resource('/productos', 'ProductoController');
    Route::resource('/subcategorias', 'SubcategoriaController');
});

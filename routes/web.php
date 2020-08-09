<?php

use Illuminate\Support\Facades\Route;


Route::group(['domain' => env('APP_URL')], function(){
    Route::get('/', function(){
        return view('tienda.home');
    });
});

Route::group(['domain' => 'gestion.' . env('APP_URL')], function(){
    Route::get('/', 'AdminHomeController@index');
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    Route::group(['middleware' => ['auth', 'permission:gestionar_pagina']], function () {
        Route::get('/usuarios', 'UserController@index')->middleware('permission:users_abm');
        Route::resource('/categorias', 'CategoriaController');
        Route::resource('/productos', 'ProductoController');
        Route::resource('/subcategorias', 'SubcategoriaController');
    
        Route::get('/productos/{producto}/galeria', 'GaleriaController@index')->name('product.galleria.index');
        Route::post('/productos/{producto}/galeria', 'GaleriaController@add')->name('product.galleria.add');
        Route::delete('/productos/{producto}/galeria', 'GaleriaController@delete')->name('product.galeria.destroy');
        Route::patch('/productos/{producto}/galeria', 'GaleriaController@update')->name('product.galeria.update');
    });
});


// Registration Routes...
/*if ($options['register'] ?? true) {
    $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    $this->post('register', 'Auth\RegisterController@register');
}

// Password Reset Routes...
if ($options['reset'] ?? true) {
    $this->resetPassword();
}

// Password Confirmation Routes...
if ($options['confirm'] ??
    class_exists($this->prependGroupNamespace('Auth\ConfirmPasswordController'))) {
    $this->confirmPassword();
}

if ($options['verify'] ?? false) {
    $this->emailVerification();
}
*/
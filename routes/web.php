<?php

use Illuminate\Support\Facades\Route;


Route::group(['domain' => env('APP_URL')], function(){
    Route::get('/', function(){
        return view('tienda.home');
    });
});

Route::prefix('gestion')->group(function(){
    Route::get('/', 'Gestion\AdminHomeController@index');
    Route::get('login', 'Gestion\Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Gestion\Auth\LoginController@login');
    Route::post('logout', 'Gestion\Auth\LoginController@logout')->name('logout');

    Route::group(['middleware' => ['auth', 'permission:gestionar_pagina']], function () {
        Route::get('/usuarios', 'Gestion\UserController@index')->middleware('permission:users_abm');
        Route::resource('/categorias', 'Gestion\CategoriaController');
        Route::resource('/productos', 'Gestion\ProductoController');
        Route::resource('/subcategorias', 'Gestion\SubcategoriaController');
    
        Route::get('/productos/{producto}/galeria', 'Gestion\GaleriaController@index')->name('product.galleria.index');
        Route::post('/productos/{producto}/galeria', 'Gestion\GaleriaController@add')->name('product.galleria.add');
        Route::delete('/productos/{producto}/galeria', 'Gestion\GaleriaController@delete')->name('product.galeria.destroy');
        Route::patch('/productos/{producto}/galeria', 'Gestion\GaleriaController@update')->name('product.galeria.update');
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
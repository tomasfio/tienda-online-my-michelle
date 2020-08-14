<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function(){
    return view('tienda.home');
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
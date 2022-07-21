<?php

use Illuminate\Support\Facades\Route;

Route::put('/users/{user}/update', 'UserController@update')->name('user.profile.update');
Route::delete('//users/{user}/destroy', 'UserController@destroy')->name('user.destroy');
Route::put('/users/{user}/attach', 'UserController@attach')->name('user.role.attach');

Route::middleware(['role:admin','auth'])->group(function(){
    Route::get('/users', 'UserController@index')->name('users.index');
    Route::get('/users/create', 'UserController@create')->name('users.create');
    Route::post('/users', 'UserController@store')->name('users.store');
    Route::put('/users/{user}/detach', 'UserController@detach')->name('user.role.detach');
});
Route::middleware(['can:view,user'])->group(function(){
    Route::get('/users/{user}/profile', 'UserController@show')->name('user.profile.show');
});
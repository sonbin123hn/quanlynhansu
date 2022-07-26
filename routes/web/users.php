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
    Route::get('/users/{user}/point', 'UserController@showPointUser')->name('user.show-point');
    Route::post('/users/{user}/pointUpdate', 'UserController@updatePointUser')->name('userUpdate-point');
    Route::delete('/users/deletePoint/{id}', 'UserController@deletePointUser')->name('userDelete-point');


    Route::get('/point', 'UserController@indexPoint')->name('users.point.index');
    Route::get('/point/create', 'UserController@createPoint')->name('users.point.create');
    Route::post('/point/create', 'UserController@addPoint')->name('user.create-point');

    Route::put('/point/update/{point}', 'UserController@updatePoint')->name('user.update-point');

    Route::get('/point/edit/{point}', 'UserController@editPoint')->name('user.edit-point');
    Route::delete('/point/update/{point}', 'UserController@deletePoint')->name('user.delete-point');

    
    
});
Route::middleware(['can:view,user'])->group(function(){
    Route::get('/users/{user}/profile', 'UserController@show')->name('user.profile.show');
});
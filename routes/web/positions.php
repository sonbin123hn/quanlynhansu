<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['role:admin','auth'])->group(function(){
    Route::get('/positions', 'PositionController@index')->name('positions.index');
    Route::post('/positions', 'PositionController@store')->name('positions.store');
    Route::delete('/positions/{position}/destroy', 'PositionController@destroy')->name('positions.destroy');
    Route::get('/positions/{position}/edit', 'PositionController@edit')->name('positions.edit');
    Route::put('/positions/{position}/update', 'PositionController@update')->name('positions.update');
});
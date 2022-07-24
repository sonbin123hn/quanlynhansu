<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['role:admin','auth'])->group(function(){
    Route::get('/departments', 'DepartmentController@index')->name('departments.index');
    Route::post('/departments', 'DepartmentController@store')->name('departments.store');
    Route::delete('/departments/{department}/destroy', 'DepartmentController@destroy')->name('departments.destroy');
    Route::get('/departments/{department}/edit', 'DepartmentController@edit')->name('departments.edit');
    Route::put('/departments/{department}/update', 'DepartmentController@update')->name('departments.update');
});
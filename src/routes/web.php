<?php

Route::group(['namespace' => 'Ge\Lararole\Http\Controllers'], function(){

    Route::group(['prefix' => 'roles'], function () {

        Route::get('/', 'RolesController@index')->name('roles');

        Route::post('/', 'RolesController@store')->name('roles.store');

        Route::get('create', 'RolesController@create')->name('roles.create');

        Route::get('{role}/edit', 'RolesController@edit')->name('roles.edit');

        Route::put('{role}/edit', 'RolesController@update')->name('roles.update');

        Route::get('{role}/delete', 'RolesController@destroy')->name('roles.destroy');

    });

    Route::group(['prefix' => 'permissions'], function () {

        Route::get('/', 'PermissionsController@index')->name('permissions');

        Route::post('/', 'PermissionsController@store')->name('permissions.store');

        Route::get('create', 'PermissionsController@create')->name('permissions.create');

        Route::get('{permission}/edit', 'PermissionsController@edit')->name('permissions.edit');

        Route::put('{permission}/edit', 'PermissionsController@update')->name('permissions.update');

        Route::get('{permission}/delete', 'PermissionsController@destroy')->name('permissions.destroy');

    });

});



<?php

Route::get('/', array('as' => 'home', 'uses' => 'IndexController@index'));

Route::get('password/reset', array('as' => 'password.remind', 'uses' => 'PasswordController@remind'));
Route::post('password/reset', array('as' => 'password.request', 'uses' => 'PasswordController@request'));
Route::get('password/reset/{token}', array('as' => 'password.reset', 'uses' => 'PasswordController@reset'));
Route::post('password/reset/{token}', array('as' => 'password.update', 'uses' => 'PasswordController@update'));

Route::get('login', array('as' =>'login', 'uses' => 'SessionsController@create'));
Route::get('logout', array('as' =>'logout', 'uses' => 'SessionsController@destroy'));
Route::resource('sessions', 'SessionsController', array('only' => array('create', 'store', 'destroy')));

Route::get('register', array('as' =>'register', 'uses' => 'UserController@create'));
Route::resource('user', 'UserController', array('only' => array('create', 'store')));

Route::group(array('before' => 'auth'), function()
{
    Route::resource('user', 'UserController', array('except' => array('index', 'create', 'store')));
});

Route::group(array('prefix' => 'admin', 'before' => 'auth.admin'), function()
{
    Route::get('/', array('as' => 'admin.index', 'uses' => 'AdminController@index'));
    Route::resource('roles', 'RolesController', array('except' => array('show')));
    Route::resource('users', 'UsersController', array('except' => array('show')));
});

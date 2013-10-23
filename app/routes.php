<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@index'));

//Authentication
Route::get('login', array('as' => 'auth.login', 'uses' => 'AuthController@showLogin'));
Route::post('login', array('as' => 'auth.authorise', 'uses' => 'AuthController@postLogin'));
Route::get('logout', array('as' => 'auth.logout', 'uses' => 'AuthController@logout'));

//admin
Route::group(array('prefix' => 'admin', 'before' => 'admin'), function(){
    //home
    Route::get('/', 'Admin\AdminHomeController@index');
    //users
    Route::resource('users', 'Admin\AdminUsersController');
    Route::group(array('prefix' => 'users'), function(){
        //Route::get('/', 'Admin\AdminInventoryController@index');
    });
});

//user account
Route::group(array('prefix' => 'account'), function(){
    Route::get('/', array('as' => 'account.index', 'uses' => 'AccountController@index', 'before' => 'auth'));
    Route::get('create', array('as' => 'account.create', 'uses' => 'AccountController@create'));
    Route::post('store', array('as' => 'account.store', 'uses' => 'AccountController@store'));
    Route::get('edit', array('as' => 'account.edit', 'uses' => 'AccountController@edit', 'before' => 'auth'));
    Route::put('update', array('as' => 'account.update', 'uses' => 'AccountController@update'));

    //catch all route to stop entering routes with wrong HTTP verb. This needs to be the last route in the group
    Route::any('{all}', function(){
        return View::make("site.errors.404");
    });
});

<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', function () {
    return Redirect::to('task');
});

Route::get('home', function () {
    return Redirect::to('task');
});

Route::get('task', ['middleware' => 'authValidation', 'uses' => 'HomeController@showTasks']);
Route::post('task', ['middleware' => 'authValidation', 'uses' => 'HomeController@showTasks']);
Route::post('task/new', ['middleware' => 'authValidation', 'uses' => 'HomeController@newTask']);
Route::get('task/{task_id?}', ['middleware' => 'authValidation', 'uses' => 'HomeController@taskDetail']);
Route::post('task/validate/{task_id?}', ['middleware' => 'authValidation', 'uses' => 'HomeController@taskValidation']);

// Authentication Routes...
Route::get('auth/login', 'Auth\AuthController@showLoginForm');
Route::post('auth/login', 'Auth\AuthController@login');
Route::get('auth/logout', 'Auth\AuthController@logout');

// Registration Routes...
Route::get('auth/register', 'Auth\AuthController@showRegistrationForm');
Route::post('auth/register', 'Auth\AuthController@register');
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

Route::get('/', 'Pages@index');

Route::get('admin', function () {
  return redirect('admin/dashboard');
});

$router->group([
  'namespace' => 'Admin',
  'middleware' => 'auth',
], function () {
  include 'routesAdmin.php';
});

// Admin area


// Logging in and out
Route::get('/auth/login', 'Auth\Auth@getLogin');
Route::post('/auth/login', 'Auth\Auth@postLogin');
Route::get('/auth/logout', [
  'uses' => 'Auth\Auth@getLogout',
  'as' => 'admin.logout'
]);
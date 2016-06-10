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
$router->group([
  'middleware' => ['web']
], function() {
  Route::get('/', 'Pages@index');

  Route::get('admin', function () {
    return redirect('admin/dashboard');
  });
  // Logging in and out
  Route::get('/auth/login', 'Auth\Auth@getLogin');
  Route::post('/auth/login', 'Auth\Auth@postLogin');
  Route::get('/auth/logout', [
    'uses' => 'Auth\Auth@getLogout',
    'as' => 'admin.logout'
  ]);
});

// Admin area
$router->group([
  'namespace' => 'Admin',
  'middleware' => ['web', 'auth'],
], function () {
  include 'routesAdmin.php';
});
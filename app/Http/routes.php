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
    return view('welcome');
});

get('admin', function () {
  return redirect('admin/dashboard');
});

$router->group([
  'namespace' => 'Admin',
  'middleware' => 'auth',
], function () {
  resource('admin/dashboard', 'Dashboard');
  resource('admin/users', 'Users');

});

// Admin area


// Logging in and out
get('/auth/login', 'Auth\Auth@getLogin');
post('/auth/login', 'Auth\Auth@postLogin');
get('/auth/logout', [
  'uses' => 'Auth\Auth@getLogout',
  'as' => 'admin.logout'
]);
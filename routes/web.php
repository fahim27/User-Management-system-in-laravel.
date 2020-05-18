<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/role', 'RoleAndPermissionController@index')->name('home');


Route::group([
    'middleware'=>['auth']
],function (){

    Route::resource('post', 'PostController');
    Route::resource('role', 'RoleController');
    Route::resource('user', 'UserController');

});


Route::get('/clear-all', function () {
    $exitCode = Artisan::call('optimize:clear');
 ;
    return '<h1>Cleared Succeed</h1>'; //Return anything
});
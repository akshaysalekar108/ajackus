<?php
use GuzzleHttp\Client;
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

// Route::get('/cities/{country}','PostsController@cities');
Route::post('cities/country','PostsController@cities')->name('cities');

Route::get('/user/{id}/{name}',function($id, $name){
    return 'This is user '.$name.'with id'.$id; 
});
Route::get('/','PostsController@index'); //contoller_name@method


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('task','PostsController');



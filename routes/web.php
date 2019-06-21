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

Route::get('/hello', function () {
    return 'Hello World';
});

Route::get('/user/{id}/{name}',function($id, $name){
    return 'This is user '.$name.'with id'.$id; 
});
Route::get('/','PostsController@index'); //contoller_name@method


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('task','PostsController');

Route::get('/map', function () {
    $config['center'] = 'Air Canada Center,Toronto';
    $config['zoom'] ='14';
    $config['map_height']='300px';
    $config['scroll-wheel'] = false;

    Gmaps::initialize($config);
    $map = Gmaps::create_map();

    return view('tasks.create_task')->with('map',$map);
});

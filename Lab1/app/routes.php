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

/*Route::get('/',function()
{
    $users = DB::table('users')->get();
    return $users;
});
*/
Route::get('/', 'PagesController@home');
Route::get('/index','PagesController@index');
Route::get('/edit','PagesController@edit');
Route::get('/about', 'PagesController@about');
Route::get('/wiiu','PagesController@wiiu');
Route::get('/ps4','PagesController@ps4');
Route::get('/xbox1','PagesController@xbox1');
Route::post('login', array('uses' => 'PagesController@login'));
Route::post('register', array('uses' => 'PagesController@register'));
?>

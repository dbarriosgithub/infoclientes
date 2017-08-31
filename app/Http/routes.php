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
use App\Client;

Route::get('/', function () {
    return view('welcome');
});

Route::get('client/create','ClientController@create');
Route::post('select-ajax',['as'=>'select-ajax','uses'=>'ClientController@selectAjax']);
Route::post('client/store','ClientController@store');


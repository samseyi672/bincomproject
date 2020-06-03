<?php

use Illuminate\Support\Facades\Route;

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
    return view('login');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/newpollingunit', function () {
    return view('createpollingunit');
});

Route::get('/logout','LoginController@logout');

Route::get('/enterpartyresult', function () {
    return view('enterpartyresultperpu');
});

Route::post('/login','LoginController@processLogin');

Route::post('/statesdata','LoginController@addStatesToPage');

Route::post('/lga','LoginController@getLocalGov') ;

Route::post('/pollingunit','LoginController@getLocalUnit') ;

Route::post('/displaypollingunit','LoginController@displaypollingunit');

Route::post('/displaypollingunitresult','LoginController@displaypollingunitresult');

Route::post('/searchpolling','LoginController@pollingunit') ;

Route::get('/pollingunit2','LoginController@pollingunit2') ;




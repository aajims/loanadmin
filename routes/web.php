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


Route::group(['middleware'=>'auth'],function(){
    Route::get('/', function () {
        return redirect('beranda');
    });

    Route::get('/beranda', 'BerandaController@index');

    Route::get('/adviser', 'AdviserController@index');
    Route::get('/adviser/yajra', 'AdviserController@yajra');
    Route::get('/adviser/add', 'AdviserController@add');
    Route::post('adviser/store', 'AdviserController@store');
    Route::get('/adviser/{id}', 'AdviserController@edit');
    Route::put('/adviser/{id}', 'AdviserController@update');
    Route::delete('/adviser/delete/{id}', 'AdviserController@delete');

    Route::get('/cabang', 'CabangController@index');
    Route::get('cabang/yajra', 'CabangController@yajra');
    Route::get('/cabang/add', 'CabangController@add');
    Route::post('cabang/store', 'CabangController@store');
    Route::get('/cabang/{id}', 'CabangController@edit');
    Route::put('/cabang/{id}', 'CabangController@update');
    Route::delete('/cabang/delete/{id}', 'CabangController@delete');
    Route::get('/cabang-getdata', 'CabangController@getdata');

});
Auth::routes();

Route::get('/logout', function(){
    Auth::logout();
    return Redirect::to('login');
 });


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
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
    Route::prefix('upanel')->group(function () {
        /**
         * Админка пользователя
         */
        Route::get('users','UserpaneController@index')->name('upaenl.users');
        Route::get('users/create','UserpaneController@create')->name('upaenl.users.create');
        Route::get('users/destroy/{id}','UserpaneController@destroy')->name('upaenl.users.destroy');
        Route::get('users/edit/{id}','UserpaneController@edit')->name('upaenl.users.edit');
        Route::post('users/update','UserpaneController@update')->name('upaenl.users.update');
        Route::post('users/store','UserpaneController@store')->name('upaenl.users.store');

        /**
         * Профиль пользователя
         */
        Route::get('profil','UserpaneController@profil')->name('upaenl.profil');
        Route::post('profil/update','UserpaneController@profilUpdate')->name('upaenl.profil.update');
        Route::post('profil/company','CompanyController@CreateProfil')->name('upaenl.profil.compaycreate');
        Route::post('profil/updatecompany','CompanyController@UpdateProfil')->name('upaenl.profil.compayupdate');

        /**
         * Торговые точки
         */
        Route::get('point','PointController@index')->name('upaenl.point');
        Route::get('point/create','PointController@create')->name('upaenl.point.create');
        Route::post('point/create','PointController@store')->name('upaenl.point.store');
        Route::get('point/edit/{id}','PointController@edit')->name('upaenl.point.edit');
        Route::post('point/update','PointController@update')->name('upaenl.point.update');
        Route::get('point/delete/{id}','PointController@destroy')->name('upaenl.point.delete');


        /**
         * Клиенты и поставщики
         */
        Route::get('pos','PosController@index')->name('upaenl.pos');
        Route::get('pos/create','PosController@create')->name('upaenl.pos.create');
        Route::post('pos/create','PosController@store')->name('upaenl.pos.store');
        Route::get('pos/edit/{id}','PosController@edit')->name('upaenl.pos.edit');
        Route::post('pos/update','PosController@update')->name('upaenl.pos.update');
        Route::get('pos/delete/{id}','PosController@destroy')->name('upaenl.pos.delete');

        Route::get('ass','AssController@index')->name('upaenl.ass');
        Route::get('ass/creategr','GrassController@create')->name('upaenl.gr.create');
        Route::post('ass/creategr','GrassController@story')->name('upaenl.gr.story');
        Route::get('ass/gr/{id}','GrassController@showassgr')->name('upaenl.ass.gr');
        Route::get('ass/gr/edit/{id}','GrassController@editgr')->name('upaenl.ass.gredit');
        Route::post('ass/gr/update','GrassController@updategr')->name('upaenl.ass.grupdate');
        Route::get('ass/gr/delete/{id}','GrassController@delete')->name('upaenl.ass.grdelete');
        Route::get('ass/create','AssController@create')->name('upaenl.ass.create');
        Route::post('ass/create','AssController@story')->name('upaenl.ass.story');
        Route::get('ass/ass/edit/{id}','AssController@edit')->name('upaenl.ass.edit');
        Route::post('ass/ass/update','AssController@update')->name('upaenl.ass.update');
        Route::get('ass/ass/delete/{id}','AssController@delete')->name('upaenl.ass.adddelete');

        Route::get('prixod','PrihController@index')->name('upaenl.prixod');
        Route::get('prixod/create','PrihController@create')->name('upaenl.prixod.create');

        Route::get('rasxod','RashController@index')->name('upaenl.rasxod');
        Route::get('rasxod/create','RashController@create')->name('upaenl.rasxod.create');


    });
    // получаем данные
    Route::post('/get/prixodcreate','PrihController@getDataCreate');
    Route::post('/get/assortiment','PrihController@getDataAss');
    Route::post('/set/prixod','PrihController@setPrixod');
    Route::post('/get/assid','AssController@getAssId');
    Route::post(' /get/prix1','PrihController@getPrixod');
    Route::post(' /delete/prix','PrihController@deletPrixod');
    Route::post(' /get/rasass','RashController@getRasass');
    Route::post(' /get/rasassmain','RashController@getRasassMain');
});

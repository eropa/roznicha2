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

//Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');



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
        Route::get('prixod/delete/{id}','PrihController@delete');
        Route::get('prixod/edit/{id}','PrihController@edit');

        Route::get('rasxod','RashController@index')->name('upaenl.rasxod');
        Route::post('rasxod/changestatus','RashController@changestatus')->name('upaenl.rasxod.changestatus');
        Route::get('rasxod/create','RashController@create')->name('upaenl.rasxod.create');

        Route::get('report/ostatok','ReportController@get_ostatok')->name('upaenl.report.getostatok');
        Route::post('report/ostatok/','ReportController@post_ostatok')->name('upaenl.report.postostatok');

        //Печать документов
        Route::get('print/ras/{id}','PrintController@print_ras');
        Route::get('print/pri/{id}','PrintController@print_pri');

        //Заявка
        Route::get('zaivka','ZaivkaController@index')->name('upaenl.zaivka.index');
        Route::get('zaivka/show/{id}','ZaivkaController@showzaivka')->name('upaenl.zaivka.show');
        Route::get('zaivka/save/{id}','ZaivkaController@savezaivka')->name('upaenl.zaivka.save');
        Route::get('zaivka/delete/{id}','ZaivkaController@delete')->name('upaenl.zaivka.delete');

        //Клиенты

        Route::get('clients','ClientController@index')->name('upaenl.clients');
        Route::get('client/add','ClientController@create')->name('upaenl.clients.add');
        Route::get('client/delete/{id}','ClientController@delete')->name('upaenl.clients.delete');
        Route::get('client/edit/{id}','ClientController@edit')->name('upaenl.clients.edit');
        Route::post('client/store','ClientController@store')->name('upaenl.clients.store');
        Route::post('client/update','ClientController@update')->name('upaenl.clients.update');

        Route::get('report/client','ReportController@reportClient')->name('upaenl.report.client');
        Route::post('report/client','ReportController@reportClientPost')->name('upaenl.report.clientpost');
        Route::get('report/statusorder','ReportController@statusOrder')->name('upaenl.report.statusOrder');



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
    Route::post('/get/saveass','AssController@saveDate');
    Route::post(' /found/prix','PrihController@foundParam');
    Route::post('  /set/addrasxod','RashController@addrasxod');
    Route::post('  /get/rasxodtoday','RashController@getToday');
    Route::post('  /get/rasxodfound','RashController@getFound');
    Route::post('  /get/skidka','RashController@skidka');
    Route::post('    /get/skladlist','PointController@skladlist');

});

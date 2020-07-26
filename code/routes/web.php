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
    });
});

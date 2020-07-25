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
        Route::get('users','UserpaneController@index')->name('upaenl.users');
        Route::get('users/create','UserpaneController@create')->name('upaenl.users.create');
        Route::get('users/destroy/{id}','UserpaneController@destroy')->name('upaenl.users.destroy');
        Route::get('users/edit/{id}','UserpaneController@edit')->name('upaenl.users.edit');
        Route::post('users/update','UserpaneController@update')->name('upaenl.users.update');
        Route::post('users/store','UserpaneController@store')->name('upaenl.users.store');
    });
});

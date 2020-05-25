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


Route::namespace('Backend')->prefix('admin')->as('admin.')->group( function(){
//==================introduction===================================
    Route::get('/about','SinglePageController@getAbout')->name('getAbout');
	Route::post('/about','SinglePageController@postAbout')->name('postAbout');
	//
	//=====================underneath==============================
   Route::get('/underneath','SinglePageController@getUnderneath')->name('getUnderneath');
   Route::post('/underneath','SinglePageController@postUnderneath')->name('postUnderneath');
	//
});


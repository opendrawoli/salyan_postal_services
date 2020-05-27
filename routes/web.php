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
	/* about Page */
   	Route::get('/about','SinglePageController@getAbout')->name('getAbout');
	Route::post('/about','SinglePageController@postAbout')->name('postAbout');
	/* underneath Page */
   	Route::get('/underneath','SinglePageController@getUnderneath')->name('getUnderneath');
	Route::post('/underneath','SinglePageController@postUnderneath')->name('postUnderneath');

	/* Policy Program Page */
	Route::get('/policy_program','SinglePageController@getPolicyProgram')->name('getPolicyProgram');
	Route::post('/policy_program','SinglePageController@postPolicyProgram')->name('postPolicyProgram');

	/* Underneath Page */
	Route::get('/underneath','SinglePageController@getUnderneath')->name('getUnderneath');
	Route::post('/underneath','SinglePageController@postUnderneath')->name('postUnderneath');

	/*    Service Route*/
	Route::resource('/service','ServiceController');
	/*    Service Route*/
	Route::resource('/staff','StaffDetailController');
	Route::post('/designationAdd','StaffDetailController@designationAdd')->name('designationAdd');
	/* Citizen Charter Page */
	Route::get('/citizen-charter','SinglePageController@getCitizenCharter')->name('getCitizenCharter');
	Route::post('/citizen-charter','SinglePageController@postCitizenCharter')->name('postCitizenCharter');

	/* postal rates Page */
	Route::resource('postal_rates','PostalRatesController');

	/* contact Page */
   	Route::get('/contact','ContactController@getContact')->name('getContact');
   	Route::post('/contact','ContactController@postContact')->name('postContact');
	/* Act And Regulation Page */
	Route::resource('act_and_regulation','ActAndRegulationController');
	
	/* all Sliders Page */
	Route::resource('sliders','SliderController');
	Route::get('/slider/{id}','SliderController@activeInactiveSlider')->name('activeInactiveSlider');

	/* news  */
	Route::resource('/news','NewsController');
	/* news  */
	Route::resource('/right','RightToInformationController');



});



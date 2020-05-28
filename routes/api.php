<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('about','Frontend\FrontendController@getAbout');
Route::get('policy_program','Frontend\FrontendController@getPolicyProgram');
Route::get('underneath','Frontend\FrontendController@getUnderneath');
Route::get('citizen_charter','Frontend\FrontendController@getCitizenCharter');
Route::get('postal_rates','Frontend\FrontendController@getPostalRates');
Route::get('services','Frontend\FrontendController@getServices');
Route::get('act_and_regulation','Frontend\FrontendController@getActAndRegulation');
Route::get('staffs','Frontend\FrontendController@getStaff');
Route::get('contact_us','Frontend\FrontendController@getContact');
Route::get('homepage','Frontend\FrontendController@getHomePage');

Route::get('news','Frontend\FrontendController@getNews');
Route::get('tenders','Frontend\FrontendController@getTenders');
Route::get('circulars','Frontend\FrontendController@getCirculars');
Route::get('notices','Frontend\FrontendController@getNotices');
Route::get('press','Frontend\FrontendController@getPress');


Route::post('message','Frontend\FrontendController@postMessage');
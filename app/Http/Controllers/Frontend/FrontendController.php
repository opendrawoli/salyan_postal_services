<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\SinglePage;
use App\Model\PostalRate;
class FrontendController extends Controller
{
    function getAbout(){
    	return SinglePage::where('meta_key','about_us')->first();
    }
    function getPolicyProgram(){
    	return SinglePage::where('meta_key','policy_program')->first();
    }

     function getUnderneath(){
    	return SinglePage::where('meta_key','underneath')->first();
    } 
    function getCitizenCharter(){
    	return SinglePage::where('meta_key','citizen_charter')->first();
    }
    function getPostalRates(){
    	return PostalRate::all();
    }
}

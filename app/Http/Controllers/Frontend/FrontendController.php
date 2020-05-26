<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\SinglePage;
use App\Model\PostalRate;
use App\Model\Service;
use App\Model\Slider;
use App\Model\ActAndRegulation;
class FrontendController extends Controller
{
    function getAbout(){
        $about =SinglePage::where('meta_key','about_us')->first();
        return response()->json($about);
    }
    function getPolicyProgram(){
    	$policy_program=SinglePage::where('meta_key','policy_program')->first();
        return response()->json($policy_program);
    }

     function getUnderneath(){
    	$underneath=SinglePage::where('meta_key','underneath')->first();
         return response()->json($underneath);

    } 
    function getCitizenCharter(){
    	$citizen_charter= SinglePage::where('meta_key','citizen_charter')->first();
        return response()->json($citizen_charter);
    }
    function getPostalRates(){
    	$PostalRate= PostalRate::all();
        return response()->json($PostalRate);
    }

    function getServices(){
    	$service= Service::all();
        return response()->json($service);
    }

    function getActAndRegulation(){
    	$actandregulation= ActAndRegulation::all();
        return response()->json($actandregulation);
    }


    function getSliders(){
        $slider= Slider::where('status',1)->get();
        return response()->json($slider);
    }
}



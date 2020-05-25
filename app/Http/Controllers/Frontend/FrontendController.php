<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\SinglePage;
class FrontendController extends Controller
{
    function getAbout(){
    	return SinglePage::where('meta_key','about_us')->first();
    }
}

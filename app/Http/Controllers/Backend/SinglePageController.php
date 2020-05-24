<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\SinglePage;
class SinglePageController extends Controller
{

	function getAbout(){
		$about=SinglePage::where('meta_key','about_us')->first();
		return view('backend.pages.single-pages.about',compact('about')); 
	}
    public function postAbout(Request $request){
    	dd($request);
    	$request->validate([
    		'title_nepali' 	=> 'required',
    		'meta_key' 		=> 'required|unique:single_pages'
    	]);
		$about=SinglePage::where('meta_key','about_us')->first();
		if($about){
	    	$about->title_nepali 		= $request->title_nepali;
	    	$about->title_english 		= $request->title_english;
	    	$about->title_english 		= $request->title_english;
	    	$about->description_nepali 	= $request->description_nepali;
	    	$about->description_english = $request->description_english;
	    	$about->save();
		}else{
			$about = new SinglePage();
			$about->meta_key 			= "about_us";
	    	$about->title_nepali 		= $request->title_nepali;
	    	$about->title_english 		= $request->title_english;
	    	$about->title_english 		= $request->title_english;
	    	$about->description_nepali 	= $request->description_nepali;
	    	$about->description_english = $request->description_english;
	    	$about->save();
		}
    	
    	return view('backend.pages.single-pages.about');

    }
}

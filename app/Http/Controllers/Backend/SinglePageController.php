<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\SinglePage;
use Illuminate\Support\Facades\File;
class SinglePageController extends Controller
{
	/*=====================================
				About Page
	============================================*/
	function getAbout(){
		$about=SinglePage::where('meta_key','about_us')->first();
		return view('backend.pages.single-pages.about',compact('about')); 
	}
    public function postAbout(Request $request){
    	$request->validate([
    		'title_nepali' 	=> 'required'
    	]);
		$about=SinglePage::where('meta_key','about_us')->first();
		if($about){
	    	$about->title_nepali 		= $request->title_nepali;
	    	$about->title_english 		= $request->title_english;
	    	$about->description_nepali 	= $request->description_nepali;
	    	$about->description_english = $request->description_english;
	    	$about->save();
	    	return back()->with('message','Update');
		}else{

			$about = new SinglePage();
			$about->meta_key 			= "about_us";
	    	$about->title_nepali 		= $request->title_nepali;
	    	$about->title_english 		= $request->title_english;
	    	$about->description_nepali 	= $request->description_nepali;
	    	$about->description_english = $request->description_english;
	    	$about->save();
	    	return back()->with('message','Added');
		}
    	
    }

	/*=====================================
				Privacy And Policy Page
	============================================*/
    function getPolicyProgram(){
		$policy_program=SinglePage::where('meta_key','policy_program')->first();
		return view('backend.pages.single-pages.policy_program',compact('policy_program')); 
	}
    public function postPolicyProgram(Request $request){
    	$request->validate([
    		'title_nepali' 	=> 'required'
    	]);
    	$path='';
    	$policy_program=SinglePage::where('meta_key','policy_program')->first();

    	if($request->hasFile('file')){
			if($policy_program){
				if($policy_program->file){    			
					File::delete($policy_program->file);
				}
			}
           $extension = ".".$request->file->getClientOriginalExtension();
           $name = basename($request->file->getClientOriginalName(), $extension).time();
           $name = $name.$extension;
           $path = $request->file->move('assets/single-page', $name);
         }
    	
		
		if($policy_program){
	    	$policy_program->title_nepali 		= $request->title_nepali;
	    	$policy_program->title_english 		= $request->title_english;
	    	$policy_program->description_nepali 	= $request->description_nepali;
	    	$policy_program->description_english = $request->description_english;
	    	$policy_program->file = $request->file?$path:$policy_program->file;
	    	$policy_program->save();
	    	return back()->with('message','Update');
		}else{

			$policy_program = new SinglePage();
			$policy_program->meta_key 			= "policy_program";
	    	$policy_program->title_nepali 		= $request->title_nepali;
	    	$policy_program->title_english 		= $request->title_english;
	    	$policy_program->description_nepali 	= $request->description_nepali;
	    	$policy_program->description_english = $request->description_english;
	    	$policy_program->file = $request->file? $path:'';
	    	$policy_program->save();
	    	return back()->with('message','Added');
		}
    	
    }


	/*=====================================
				Underneath Page
	============================================*/
    function getUnderneath(){
		$underneath=SinglePage::where('meta_key','underneath')->first();
		return view('backend.pages.single-pages.underneath',compact('underneath')); 
	}
    public function postUnderneath(Request $request){
    	$request->validate([
    		'title_nepali' 	=> 'required'
    	]);
    	$path='';
    	$underneath=SinglePage::where('meta_key','underneath')->first();

    	if($request->hasFile('file')){
			if($underneath){
				if($underneath->file){    			
					File::delete($underneath->file);
				}
			}			
           $extension = ".".$request->file->getClientOriginalExtension();
           $name = basename($request->file->getClientOriginalName(), $extension).time();
           $name = $name.$extension;
           $path = $request->file->move('assets/single-page', $name);
         }
    	
		
		if($underneath){
	    	$underneath->title_nepali 		= $request->title_nepali;
	    	$underneath->title_english 		= $request->title_english;
	    	$underneath->file = $request->file?$path:$underneath->file;
	    	$underneath->save();
	    	return back()->with('message','Update');
		}else{

			$underneath = new SinglePage();
			$underneath->meta_key 			= "underneath";
	    	$underneath->title_nepali 		= $request->title_nepali;
	    	$underneath->title_english 		= $request->title_english;
	    	$underneath->file = $request->file? $path:'';
	    	$underneath->save();
	    	return back()->with('message','Added');
		}
    	
    }
}

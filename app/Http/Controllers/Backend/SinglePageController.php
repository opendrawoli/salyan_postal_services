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
	    	return back()->with('message','Updated successfully');
		}else{

			$about = new SinglePage();
			$about->meta_key 			= "about_us";
	    	$about->title_nepali 		= $request->title_nepali;
	    	$about->title_english 		= $request->title_english;
	    	$about->description_nepali 	= $request->description_nepali;
	    	$about->description_english = $request->description_english;
	    	$about->save();
	    	return back()->with('message','Added successfully');
			}
    	
    }



    function getUnderneath(){
		$about=SinglePage::where('meta_key','underneath_org')->first();
		return view('backend.pages.single-pages.underneath',compact('about')); 
	}
    public function postUnderneath(Request $request){
    	$request->validate([
    		'title_nepali' 	=> 'required',
    		'file'			=> 'required'
    	]);
    	 
		$about=SinglePage::where('meta_key','underneath_org')->first();
		if($about){
			if ($request->hasfile('file'))
        	{
	            $file = $request->file('file');
	            dd($file);
	            $filename = $file->getClientOriginalName();
	           $request->file->public_path('images/about',$filename);
	           $about->file=$filename;
        	}
        	 
	    	$oldFile = $request->file;
	    	$about->title_nepali 		= $request->title_nepali;
	    	$about->title_english 		= $request->title_english;
	    	$about->save();
	    	 if($oldFile != $about->image){
            $this->removeFile($oldFile);
        	}
	    	return back()->with('message','Updated successfully');
		}else{

			$about = new SinglePage();
			if ($request->hasfile('file'))
        	{
	             $file = $request->file('file');
	            $filename = $file->getClientOriginalName();
	           $request->file->public_path('images/about',$filename);
	           $about->file=$filename;
        	}
        	
			$about->meta_key 			= "underneath_org";
	    	$about->title_nepali 		= $request->title_nepali;
	    	$about->title_english 		= $request->title_english;
	    	$about->save();
	    	return back()->with('message','Added successfully');
			}
        }

        public function removeFile($file){
        if(! empty($file)){
            $filePath      = public_path('images/about') . '/'. $file;
            if(file_exists($filePath))
                unlink($filePath);

        }
    }
}

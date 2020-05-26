<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Contact;
class ContactController extends Controller
{
    function getContact(){
		$contact=Contact::where('meta_key','contact_us')->first();
		return view('backend.pages.contact-us.index',compact('contact')); 
	}
    public function postContact(Request $request){
    	$request->validate([
    		'phone' 	=> 'required|numeric',
    		'fax' 	=> 'required',
    		'email' 	=> 'required|email',
    		'website' 	=> 'required'
    	]);
		$contact=Contact::where('meta_key','contact_us')->first();
		if($contact){
	    	$contact->phone 		= $request->phone;
	    	$contact->fax 		= $request->fax;
	    	$contact->email 	= $request->email;
	    	$contact->website = $request->website;
	    	$contact->notice_board = $request->notice_board;
	    	$contact->facebook = $request->facebook;
	    	$contact->twitter = $request->twitter;
	    	$contact->toll_free = $request->toll_free;
	    	$contact->save();
	    	return back()->with('message','Updated successfully');
		}else{

			$contact = new Contact();
			$contact->meta_key 			= "contact_us";
			$contact->phone 		= $request->phone;
	    	$contact->fax 		= $request->fax;
	    	$contact->email 	= $request->email;
	    	$contact->website = $request->website;
	    	$contact->notice_board = $request->notice_board;
	    	$contact->facebook = $request->facebook;
	    	$contact->twitter = $request->twitter;
	    	$contact->toll_free = $request->toll_free;
	    	$contact->save();
	    	return back()->with('message','Added successfully');
		}
    	
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\SinglePage;
use App\Model\PostalRate;
use App\Model\Service;
use App\Model\Slider;
use App\Model\ActAndRegulation;
use App\Model\StaffDetail;
use App\Model\Contact;
use App\Model\Message;
use App\Model\MediaCenter\News;
use DB;

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

    function getStaff(){
        $staff= StaffDetail::all();
        return response()->json($staff);
    }  

    function getContact(){
        $contact= Contact::where('meta_key','contact_us')->first();
        return response()->json($contact);
    }
    function getHomePage(){
        $news=News::where('notice_type',1)->orderBy('nepali_date', 'desc')->limit(3)->get();
        $tenders=News::where('notice_type',2)->orderBy('nepali_date', 'desc')->limit(3)->get();
        $circular=News::where('notice_type',3)->orderBy('nepali_date', 'desc')->limit(3)->get();
        $notice=News::where('notice_type',4)->orderBy('nepali_date', 'desc')->limit(3)->get();
        $presss=News::where('notice_type',5)->orderBy('nepali_date', 'desc')->limit(3)->get();
        $staffs=StaffDetail::where('designation',0)->orWhere('designation',1)->get();
        $services=Service::limit(3)->get();
        $sliders=Slider::where('status',1)->get();
        $highlights=new News();
        $highlights=$news;
        $highlights=[];
        $i=0;
        foreach ($news as $row) {
           $highlights[$i]['title']=$row->title;
           $highlights[$i]['date']=$row->nepali_date;
           $i++;
        }
        foreach ($tenders as $row) {
           $highlights[$i]['title']=$row->title;
           $highlights[$i]['date']=$row->nepali_date;
           $i++;
        }
        foreach ($circular as $row) {
           $highlights[$i]['title']=$row->title;
           $highlights[$i]['date']=$row->nepali_date;
           $i++;
        }

         foreach ($notice as $row) {
           $highlights[$i]['title']=$row->title;
           $highlights[$i]['date']=$row->nepali_date;
           $i++;
        }

         foreach ($presss as $row) {
           $highlights[$i]['title']=$row->title;
           $highlights[$i]['date']=$row->nepali_date;
           $i++;
        }
        return response()->json(['news'=>$news,'staffs'=>$staffs,'tenders'=>$tenders,'circular'=>$circular,'services'=>$services,'sliders'=>$sliders,'highlights'=>$highlights]);
    }

    function getNews(){
        $news=News::where('notice_type',1)->orderBy('nepali_date', 'desc')->paginate(3);
        return response()->json($news);
    }

    function getTenders(){
        $tenders=News::where('notice_type',2)->orderBy('nepali_date', 'desc')->paginate(3);
        return response()->json($tenders);
    }

    function getCirculars(){
        $circulars=News::where('notice_type',3)->orderBy('nepali_date', 'desc')->paginate(3);
        return response()->json($circulars);
    }

    function getNotices(){
        $notices=News::where('notice_type',4)->orderBy('nepali_date', 'desc')->paginate(3);
        return response()->json($notices);
    }

    function getPress(){
        $press=News::where('notice_type',5)->orderBy('nepali_date', 'desc')->paginate(3);
        return response()->json($press);
    }

    function postMessage(Request $request){
        $request->validate([
    		'Fullname' 	=> 'required',
    		'Phone' 	=> 'required',
    		'Fax' 	=> 'required',
            'Email' 	=> 'required|email',
            'Subject'   =>'required',
            'Message'   =>'required'
        ]);
        $message=new Message();
        $message->fullname=$request->Fullname;
        $message->email=$request->Email;
        $message->phone=$request->Phone;
        $message->fax=$request->Fax;
        $message->subject=$request->Subject;
        $message->message=$request->Message;
        if($message->save()){
            return response()->json('success');
        }else{
            return response()->json('error');
        }

    }

    

}



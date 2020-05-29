<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Message;
class MessageController extends Controller
{
    public function message()
    {
    	$messages = Message::all();
    	return view('backend.pages.message.index',compact('messages'));
    }
    public function deleteMessage($id){
    	$message = Message::destroy($id);
    	return back()->with('message','successfully deleted');
    }
    public function seenMessage($id){
    	$messages = Message::latest()->get();
    	$message = Message::find($id);
    	$message->status = 1;
    	$message->save();
    	return view('backend.pages.message.singlePage',compact('message','messages'));
    }
   
}

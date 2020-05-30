<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\MediaCenter\News;
use File;
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
     if (($status = $request->get('status')) && $status == 'प्रेस विज्ञप्ति'){
        $news = News::where('notice_type',5)->orderBy('nepali_date','desc')->get();
     }
     elseif($status=='समाचार'){
        $news = News::where('notice_type',1)->orderBy('nepali_date','desc')->get();
         } 
          elseif($status=='बोलपत्र'){
        $news = News::where('notice_type',2)->orderBy('nepali_date','desc')->get();
         } 
         elseif($status=='परिपत्र'){
         $news = News::where('notice_type',3)->orderBy('nepali_date','desc')->get();
         }
         elseif($status=='सूचना'){
        $news = News::where('notice_type',4)->orderBy('nepali_date','desc')->get();
         }
         else{
            $news = News::orderBy('nepali_date','desc')->get();
         }
         $statusList = $this->statusList($request);

         

    return view('backend.pages.news.index',compact('news','statusList'));
}

public function statusList($request){
    return [
        'सबै'               =>News::count(),
        'समाचार'            =>News::where('notice_type',1)->count(),
        'बोलपत्र'            =>News::where('notice_type',2)->count(),
        'परिपत्र'            =>News::where('notice_type',3)->count(),
        'सूचना'             =>News::where('notice_type',4)->count(),
        'प्रेस विज्ञप्ति'      =>News::where('notice_type',5)->count(),

    ];
}



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
       return view('Backend.pages.news.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'title'             => 'required',
            'slug'              => 'required|unique:news',
            'nepali_date'       => 'required',
            'notice_type'       => 'required',
            'thumbnail'         => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $path='';
         $news = new News(); 
        if($request->hasFile('file'))
        {
           $extension = ".".$request->file->getClientOriginalExtension();
           $name = basename($request->file->getClientOriginalName(), $extension).time();
           $name = $name.$extension;
           $path = $request->file->move('assets/news', $name);
         }
        
        $news->file = $path;
        $news->title = $request->title;
        $news->slug = $request->slug;
        $news->nepali_date = $request->nepali_date;
        $news->notice_type = $request->notice_type;
        $news->save();
        return back()->with('message','succssfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);
        return view('backend.pages.news.form',compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'             => 'required',
            'slug'              => 'required|unique:news,slug,' . $id,
            'nepali_date'       => 'required',
            'notice_type'       => 'required'
        ]);
        $path='';
        $path1='';
         $news = News::find($id); 
        if($request->hasFile('file'))
        {
             File::delete($news->file);
           $extension = ".".$request->file->getClientOriginalExtension();
           $name = basename($request->file->getClientOriginalName(), $extension).time();
           $name = $name.$extension;
           $path = $request->file->move('assets/news', $name);
         }
        
       $news->file = $request->hasFile('file')?$path:$news->file;
        $news->title = $request->title;
        $news->slug = $request->slug;
        $news->nepali_date = $request->nepali_date;
        $news->notice_type = $request->notice_type;
        $news->save();
        return back()->with('message','succssfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);
        File::delete($news->file);
        $news->destroy($id);
        return back()->with('message','successfully deleted');
    }
}

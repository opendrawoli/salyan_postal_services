<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Service;
use File;
class ServiceController extends Controller
{
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $services = Service::all();
       return view('backend.pages.services.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.services.create');
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
            'title_nepali'          => 'required',
            'description_nepali'    => 'required',
            'file'                 => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $path='';
         $service = new Service(); 
        if($request->hasFile('file')){
           $extension = ".".$request->file->getClientOriginalExtension();
           $name = basename($request->file->getClientOriginalName(), $extension).time();
           $name = $name.$extension;
           $path = $request->file->move('assets/service', $name);
         }
        $service->file = $path;
        $service->title_nepali = $request->title_nepali;
        $service->title_english = $request->title_english;
        $service->description_nepali = $request->description_nepali;
        $service->description_english = $request->description_english;
        $service->save();
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
        $service = Service::find($id);
       return view('backend.pages.services.create',compact('service'));
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
            'title_nepali'          => 'required',
            'description_nepali'    => 'required',
            'file'                  => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
         $path='';
        $service = Service::find($id);

         if($request->hasFile('file')){
            File::delete($service->file);
           $extension = ".".$request->file->getClientOriginalExtension();
           $name = basename($request->file->getClientOriginalName(), $extension).time();
           $name = $name.$extension;
           $path = $request->file->move('assets/service', $name);
         }
          $service->file = $request->hasFile('file')?$path:$service->file;
         $service->title_nepali = $request->title_nepali;
        $service->title_english = $request->title_english;
        $service->description_nepali = $request->description_nepali;
        $service->description_english = $request->description_english;
        $service->save();
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
        $service = Service::find($id);
        File::delete($service->file);
        $service->destroy($id);
        return back()->with('message','successfully deleted');
    }
    
       
}

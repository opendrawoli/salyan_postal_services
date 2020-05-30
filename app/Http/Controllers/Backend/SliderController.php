<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Slider;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders=Slider::all();
        return view('backend.pages.sliders.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.sliders.create');
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
            'title'  => 'required',
            'description'  => 'required',
            'file'	=>'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        if($request->hasFile('file')){
          
           $extension = ".".$request->file->getClientOriginalExtension();
           $name = basename($request->file->getClientOriginalName(), $extension).time();
           $name = $name.$extension;
           $path = $request->file->move('assets/sliders', $name);
         }

        $slider = new Slider();
        $slider->title       = $request->title;;
        $slider->description       = $request->description;;
        $slider->image     = $path;
        $slider->status     = 0;
        $slider->save();
        return back()->with('message','Added');
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
        $sliders=Slider::find($id);
        return view('backend.pages.sliders.create',compact('sliders'));
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
            'title'  => 'required',
            'description'  => 'required',
            'image'	=>'image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $slider = Slider::find($id);

        if($request->hasFile('file')){
          File::delete($slider->image);
           $extension = ".".$request->file->getClientOriginalExtension();
           $name = basename($request->file->getClientOriginalName(), $extension).time();
           $name = $name.$extension;
           $path = $request->file->move('assets/sliders', $name);
         }

        
        $slider->title       = $request->title;
        $slider->description       = $request->description;
        $slider->image         = $request->hasFile('file')?$path : $slider->image;
        $slider->save();
        return back()->with('message','Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $slider = Slider::find($id);
         File::delete($slider->image);         
        Slider::destroy($id);
        return back()->with('message','successfully deleted');
    }

    function activeInactiveSlider($id){
    	$sliders=Slider::where('status',1)->get();
    	$slider=Slider::find($id);

    	if(count($sliders)>4){
    		if($sider->status==0){
    			return back()->with('message','You can not active more than 5 slider');
    		}
    	}
    	
    	$slider->status=($slider->status==1)? 0: 1;
    	$slider->save();
    	return back();
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Activity;
use File;
class ActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::all();
        return view('backend.pages.activities.index',compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.activities.form');
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
            'title'         => 'required',
            'file'          =>'required',
        ]);
        if($request->hasFile('file')){
          
           $extension = ".".$request->file->getClientOriginalExtension();
           $name = basename($request->file->getClientOriginalName(), $extension).time();
           $name = $name.$extension;
           $path = $request->file->move('assets/activities', $name);
         }

        $activity = new Activity();
        $activity->title           = $request->title;
        $activity->file            = $path;
        $activity->save();
        return back()->with('message','Added Successfully');
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
        $activity=Activity::find($id);
        return view('backend.pages.activities.form',compact('activity'));
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
            'title'       => 'required',
        ]);

        $activity = activity::find($id);

        if($request->hasFile('file')){
          File::delete($activity->file);
           $extension = ".".$request->file->getClientOriginalExtension();
           $name = basename($request->file->getClientOriginalName(), $extension).time();
           $name = $name.$extension;
           $path = $request->file->move('assets/activities', $name);
         }

        
        $activity->title              = $request->title;
        $activity->file               = $request->hasFile('file')?$path : $activity->file;
        $activity->save();
        return back()->with('message','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $activity = Activity::find($id);
         File::delete($activity->file);         
            Activity::destroy($id);
        return back()->with('message','successfully deleted');
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ActAndRegulation;
use Illuminate\Support\Facades\File;

class ActAndRegulationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $act_and_regulation=PostalRate::all();
        return view('backend.pages.act_and_regulation.index',compact('act_and_regulation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.act_and_regulation.create');
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
            'file'   =>'required'
        ]);
        if($request->hasFile('file')){
          
           $extension = ".".$request->file->getClientOriginalExtension();
           $name = basename($request->file->getClientOriginalName(), $extension).time();
           $name = $name.$extension;
           $path = $request->file->move('assets/act_and_regulation', $name);
         }

        $act_and_regulation = new PostalRate();
        $act_and_regulation->title       = $request->title;
        $act_and_regulation->description      = $request->description;
        $act_and_regulation->file     = $path;
        $act_and_regulation->date = $request->date;
        $act_and_regulation->save();
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
        $act_and_regulation=PostalRate::find($id);
        return view('backend.pages.act_and_regulation.create',compact('act_and_regulation'));
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
        ]);

        $act_and_regulation = PostalRate::find($id);

        if($request->hasFile('file')){
          File::delete($policy_program->file);
           $extension = ".".$request->file->getClientOriginalExtension();
           $name = basename($request->file->getClientOriginalName(), $extension).time();
           $name = $name.$extension;
           $path = $request->file->move('assets/act_and_regulation', $name);
         }

        
        $act_and_regulation->title       = $request->title;
        $act_and_regulation->description = $request->description;
        $act_and_regulation->file         = $request->hasFile('file')?$path : $act_and_regulation->file;
        $act_and_regulation->date         = $request->date;
        $act_and_regulation->save();
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
         $act_and_regulation = PostalRate::find($id);
         File::delete($act_and_regulation->file);         
        PostalRate::destroy($id);
        return back()->with('message','successfully deleted');
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\MediaCenter\Right;
class RightToInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rights = Right::all();
        return view('backend.pages.right_to_information.index',compact('rights'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.right_to_information.form');
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
            'first_date'    => 'required',
            'last_date'    => 'required'
        ]);
        if($request->hasFile('file')){
          
           $extension = ".".$request->file->getClientOriginalExtension();
           $name = basename($request->file->getClientOriginalName(), $extension).time();
           $name = $name.$extension;
           $path = $request->file->move('assets/right_to_information', $name);
         }

        $right = new Right();
        $right->title           = $request->title;
        $right->file            = $path;
        $right->first_date      = $request->first_date;
        $right->last_date      = $request->last_date;
        $right->save();
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
        $right=Right::find($id);
        return view('backend.pages.right_to_information.form',compact('right'));
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
            'first_date'  => 'required',
            'last_date'  => 'required',
        ]);

        $right = Right::find($id);

        if($request->hasFile('file')){
          File::delete($right->file);
           $extension = ".".$request->file->getClientOriginalExtension();
           $name = basename($request->file->getClientOriginalName(), $extension).time();
           $name = $name.$extension;
           $path = $request->file->move('assets/right_to_information', $name);
         }

        
        $right->title              = $request->title;
        $right->file               = $request->hasFile('file')?$path : $right->file;
        $right->first_date         = $request->first_date;
        $right->last_date         = $request->last_date;
        $right->save();
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
          $right = Right::find($id);
         File::delete($right->file);         
        Right::destroy($id);
        return back()->with('message','successfully deleted');
    }
}

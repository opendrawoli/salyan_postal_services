<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\PostalRate;

class PostalRatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postal_rates=PostalRate::all();
        return view('backend.pages.postal_rates.index',compact('postal_rates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.postal_rates.create');
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
           $path = $request->file->move('assets/postal_rates', $name);
         }

        $postal_rates = new PostalRate();
        $postal_rates->title       = $request->title;
        $postal_rates->description      = $request->description;
        $postal_rates->file     = $path;
        $postal_rates->date = $request->date;
        $postal_rates->save();
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
        $postal_rates=PostalRate::find($id);
        return view('backend.pages.postal_rates.create',compact('postal_rates'));
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

        $postal_rates = PostalRate::find($id);

        if($request->hasFile('file')){
          File::delete($policy_program->file);
           $extension = ".".$request->file->getClientOriginalExtension();
           $name = basename($request->file->getClientOriginalName(), $extension).time();
           $name = $name.$extension;
           $path = $request->file->move('assets/postal_rates', $name);
         }

        
        $postal_rates->title       = $request->title;
        $postal_rates->description = $request->description;
        $postal_rates->file         = $request->hasFile('file')?$path : $postal_rates->file;
        $postal_rates->date         = $request->date;
        $postal_rates->save();
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
        PostalRate::destroy($id);
        return back()->with('message','successfully deleted');
    }
}

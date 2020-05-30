<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\StaffDetail;
use App\Model\Designation;
use File;
class StaffDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $designations = Designation::all();
        $staffs = StaffDetail::paginate(12);
        return view('backend.pages.staff_detail.index',compact('staffs','designations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $designations = Designation::all();
        return view('backend.pages.staff_detail.form',compact('designations'));
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
            'name'         => 'required',
            'designation'  => 'required',
            'phone'        => 'required',
             'file'        => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $path='';
         $staff = new StaffDetail(); 
        if($request->hasFile('file')){
           $extension = ".".$request->file->getClientOriginalExtension();
           $name      = basename($request->file->getClientOriginalName(), $extension).time();
           $name      = $name.$extension;
           $path      = $request->file->move('assets/staff', $name);
         }
        $staff->file        = $path;
        $staff->name        = $request->name;
        $staff->designation = $request->designation;
        $staff->phone       = $request->phone;
        $staff->email       = $request->email;
        $staff->save();
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
        $staff = StaffDetail::find($id);
          $designations = Designation::all();
       return view('backend.pages.staff_detail.form',compact('staff','designations'));
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
            'name'         => 'required',
            'designation'  => 'required',
            'phone'        => 'required',
             'file'        => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $path='';
         $staff = StaffDetail::find($id); 
        if($request->hasFile('file')){
            File::delete($staff->file);
           $extension = ".".$request->file->getClientOriginalExtension();
           $name      = basename($request->file->getClientOriginalName(), $extension).time();
           $name      = $name.$extension;
           $path      = $request->file->move('assets/staff', $name);
         }
        $staff->file = $request->hasFile('file')?$path:$staff->file;
        $staff->name        = $request->name;
        $staff->designation = $request->designation;
        $staff->phone       = $request->phone;
        $staff->email       = $request->email;
        $staff->save();
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
         $staff = StaffDetail::find($id);
        File::delete($staff->file);
        $staff->destroy($id);
        return back()->with('message','successfully deleted');
    }
    public function designationAdd(Request $request){
        $request->validate([
            'designation'  => 'required|unique:designations',
        ]);
         $staff = new Designation(); 
         $staff->designation = $request->designation;
         $staff->save();
         return back()->with('message','successfully added');

    }
}

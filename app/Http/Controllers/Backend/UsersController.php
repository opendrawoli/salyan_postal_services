<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use File;
use Str;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class UsersController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users= User::paginate(12);
        return view('backend.pages.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        return view('backend.pages.user.create',compact('user'));
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
             'name' => 'required',
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed',
             'file'    => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $path='';
         $user = new User(); 
        if($request->hasFile('file')){
           $extension = ".".$request->file->getClientOriginalExtension();
           $name = basename($request->file->getClientOriginalName(), $extension).time();
           $name = $name.$extension;
           $path = $request->file->move('assets/user', $name);
         }
        $user->file = $path;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->description_english =Str::limit($request->description_english,200);
        $user->password= Hash::make($request->password);
        $user->save();
        return back()->with('message','Successfully stored');
        
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
        $user = User::findOrFail($id);
       return view('backend.pages.user.edit',compact('user'));
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
            'name' => 'required',
            'email' => 'email|required|unique:users,email,'.$id,
            'password' =>'required_with:password_confirmation|confirmed',
             'file'    => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
         $path='';
        $user = User::findOrFail($id);
        if($request->hasFile('file'))
        {
             File::delete($user->file);
           $extension = ".".$request->file->getClientOriginalExtension();
           $name = basename($request->file->getClientOriginalName(), $extension).time();
           $name = $name.$extension;
           $path = $request->file->move('assets/user', $name);
         }
        $user->file = $request->hasFile('file')?$path:$user->file;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password=Hash::make($request->password);
        $user->save();
        return back()->with('message','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $user = User::findOrFail($id);
        $user->destroy($id);
        return back()->with('message','successfully deleted');
    } 

}

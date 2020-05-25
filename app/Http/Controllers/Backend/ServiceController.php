<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Service;
use Intervention\Image\Facades\Image;
class ServiceController extends Controller
{
     protected $uploadPath;

    public function __construct()
    {
         $this->middleware('auth');
        $this->uploadPath = public_path(config('cms.file.directory'));
    }
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
    public function store(Request $request, Service $service)
    {
        $request->validate([
            'title_nepali'  => 'required',
            'description_nepali'  => 'required',
        ]);
         if ($request->hasfile('file'))
        {
             $width = Config('cms.file.thumbnail.width');
             $height = Config('cms.file.thumbnail.height');
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $destination = public_path(Config('cms.file.directory'));
            $successUploaded = ($file->move($destination,$filename));

            if ($successUploaded) {
                $extension = $file->getClientOriginalExtension();
                $thumbnail = str_replace(".{$extension}","_thumb.{$extension}", $filename);
                Image::make($destination.'/'. $filename)
                ->resize($width,$height)
                ->save($destination.'/'. $thumbnail);
            }
            $file->file=$thumbnail;
        }
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
       return view('backend.pages.services.edit',compact('service'));
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
            'title_nepali'  => 'required',
            'description_nepali'  => 'required',
        ]);
        $service = Service::find($id);
         if ($request->hasfile('file'))
        {
             $width = Config('cms.file.thumbnail.width');
             $height = Config('cms.file.thumbnail.height');
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $destination = public_path(Config('cms.file.directory'));
            $successUploaded = ($file->move($destination,$filename));

            if ($successUploaded) {
                $extension = $file->getClientOriginalExtension();
                $thumbnail = str_replace(".{$extension}","_thumb.{$extension}", $filename);
                Image::make($destination.'/'. $filename)
                ->resize($width,$height)
                ->save($destination.'/'. $thumbnail);
            }
            $file->file=$thumbnail;
        }
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
        $services->destroy($id);
        return back()->with('message','successfully deleted');
    }
}

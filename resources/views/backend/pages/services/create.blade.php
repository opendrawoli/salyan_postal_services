@extends('backend.layout.app')
@section('content')
<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>सबै सेवाहरु <small>(नेपाली र English  मा फारम भर्नुहोस्।  English मा जरुरीचाई  छैन ) </small></h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
           
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />

        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left
        " action="@if(isset($service)) {{route('admin.service.update',$service->id)}} @else {{route('admin.service.store')}} @endif" method="POST" enctype="multipart/form-data">
     @csrf
      @if(isset($service))
      @method('PUT')
      @endif
    <div class="row">
      @include('backend.common.message')
      <div class="col-md-6">
              <label class="col-form-label " for="first-name">Title(नेपालीमा)<span class="required">*</span>
              </label>
              <input type="text" name="title_nepali" class="form-control" id="nepali_title" placeholder="Enter Your Title In Nepali" value="{{@$service->title_nepali}}">
              <label class="col-form-label " for="first-name">Description(नेपालीमा) <span class="required">*</span>
              </label>
              <textarea name="description_nepali">{{@$service->description_nepali}}</textarea>              
      </div>
      <div class="col-md-6">
        <label class="col-form-label " for="first-name" >Title(English) <span class="required"></span>
             </label>
            <input type="text" name="title_english" class="form-control" id="english_title" value="{{@$service->title_english}}" placeholder="Enter Your Title In English">
               
              <label class="col-form-label " for="first-name">Description(English)<span class="required">*</span>
              </label>
              <textarea name="description_english">{{@$service->description_english}}</textarea>
              
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
              <label class="col-form-label " for="first-name">Image Upload<span class="required"></span>
              </label>
              <input type="file" name="file" class="form-control" id="file" value="{{@$service->file}}" placeholder="Enter Your Title In Nepali"><br>
                @if(@$service->file)
          <div class="col-md-9">
            <img src="{{ asset(@$service->file) }}" style="width: 150px;">
          </div>
          @endif
                  
      </div>
      
    </div>
                   
          <div class="ln_solid"></div>
          <div class="item form-group">
            <div class="col-md-6 col-sm-6 offset-md-5">
              <a href="{{route('admin.service.index')}}" class="btn btn-secondary" type="button">Cancel</a>
              <button class="btn btn-danger" type="reset">Reset</button>
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
 $('#successmsg').fadeOut(1200);
       $('#errmsg').fadeOut(1200);
    </script>

@endsection



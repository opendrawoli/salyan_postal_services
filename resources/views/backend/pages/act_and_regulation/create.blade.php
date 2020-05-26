@extends('backend.layout.app')
@section('content')
<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>ऐन तथा नियमावली<small>( फारम भर्दा ध्यान दिन पर्ने कुरा  (Description) धेरै लामो नलेख्नुहोला। File अनिबार्य राख्नुहोला ) </small></h2>
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

        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{ (@$act_and_regulation)? route('admin.act_and_regulation.update',$act_and_regulation->id) : route('admin.act_and_regulation.store')}}" method="POST" enctype="multipart/form-data">
			@csrf
      @if(@$act_and_regulation):
          @method('PUT')
      @else:
          @method('POST')
      @endif

		<div class="row">
			<div class="col-md-6">
	           	<label class="col-form-label " for="first-name">Title<span class="required">*</span>
	            </label>
	            <input type="text" name="title" class="form-control" id="inputSuccess2" placeholder="Enter Your Title" value="{{@$act_and_regulation->title}}">

                <label class="col-form-label " for="first-name">Sort Description
              </label>
               <input type="text" name="description" class="form-control" id="inputSucces" placeholder="Enter Your Sort Description" value="{{@$act_and_regulation->description}}" maxlength="100">           
			</div>
			
			<div class="col-md-6">
	           	<label class="col-form-label " for="first-name">File Upload (Pdf,Image,Doc)<span class="required"></span>
	            </label>
	            <input type="file" name="file" class="form-control" id="inputSuccess4">

              <label class="col-form-label " for="first-name">Date<span class="required"></span>
              </label>
              <input type="text" name="date" class="form-control nepaliDate" id="inputSuccessdf" value="{{@$act_and_regulation->date}}">
	                
			</div>
    </div>
                   
          <div class="ln_solid"></div>
          <div class="item form-group">
            <div class="col-md-6 col-sm-6 offset-md-5">
              <button class="btn btn-primary" type="button">Cancel</button>
			   <button class="btn btn-primary" type="reset">Reset</button>
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
@endsection

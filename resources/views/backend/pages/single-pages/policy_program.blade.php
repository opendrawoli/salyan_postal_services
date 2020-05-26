@extends('backend.layout.app')
@section('content')
<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>नीति तथा कार्यक्रम <small>(नेपाली र English  मा फारम भर्नुहोस्।  English मा जरुरीचाई  छैन ) </small></h2>
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

        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{route('admin.postPolicyProgram')}}" method="POST" enctype="multipart/form-data">
			@csrf
          @method('POST')
		<div class="row">
			<div class="col-md-6">
	           	<label class="col-form-label " for="first-name">Title(Nepali)<span class="required">*</span>
	            </label>
	            <input type="text" name="title_nepali" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Enter Your Title In Nepali" value="{{@$policy_program->title_nepali}}">
	           	<label class="col-form-label " for="first-name">Description(Nepali) <span class="required">*</span>
	            </label>
	            <textarea name="description_nepali">{{@$policy_program->description_nepali}}</textarea>		           
			</div>
			<div class="col-md-6">
				<label class="col-form-label " for="first-name">Title(English) <span class="required"></span>
		         </label>
		        <input type="text" name="title_english" class="form-control has-feedback-left" id="inputSuccess3" placeholder="Enter Your Title In English" value="{{@$policy_program->title_english}}">
		           
	           	<label class="col-form-label " for="first-name">Description(English) <span class="required">*</span>
	            </label>
	            <textarea name="description_english">{{@$policy_program->description_english}}</textarea>
		          
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
	           	<label class="col-form-label " for="first-name">File Upload (Pdf,Image,Doc)<span class="required"></span>
	            </label>
	            <input type="file" name="file" class="form-control has-feedback-left" id="inputSuccess4" placeholder="Enter Your Title In Nepali" value="{{@$underneath->file}}">
	                
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

@section('scripts')
<script>
 $('#successmsg').fadeOut(1200);
       $('#errmsg').fadeOut(1200);
    </script>

@endsection

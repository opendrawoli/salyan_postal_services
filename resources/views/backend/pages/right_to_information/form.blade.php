@extends('backend.layout.app')
@section('content')
<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>सूचनाको-हक<small></small></h2>
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

        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{ (@$right)? route('admin.right.update',$right->id) : route('admin.right.store')}}" method="POST" enctype="multipart/form-data">
			@csrf
      @if(@$right)
          @method('PUT')
      @else
          @method('POST')
      @endif

		<div class="row">
      @include('backend.common.message')
			<div class="col-md-6">
	           	<label class="col-form-label " for="first-name"><h6><strong>शिर्षक *</strong></h6><span class="required"></span>
	            </label>
	            <input type="text" name="title" class="form-control" id="title" value="{{@$right->title}} {{old('title')}}">
      </div>
      <div class="col-md-6">
              <label class="col-form-label " for="first-name"><h6><strong>File Upload (Pdf,Image,Doc) *</strong></h6><span class="required"></span>
              </label>
              <input type="file" name="file" class="form-control" id="file">
        </div>
      </div>
      <div class="row">
         <div class="col-md-6">
              <label class="col-form-label " for="first-name"><h6><strong>कहिले देखि *</strong></h6><span class="required"></span>
              </label>
              <input type="text" name="first_date" class="form-control nepaliDate" id="first_date" value="{{@$right->first_date}}">
        </div>
        <div class="col-md-6">

              <label class="col-form-label " for="first-name"><h6><strong>कहिले सम्म *</strong></h6><span class="required"></span>
              </label>
              <input type="text" name="last_date" class="form-control nepaliDate" id="last_date" value="{{@$right->last_date}}">
          </div>
    </div>
                   
          <div class="ln_solid"></div>
          <div class="item form-group">
            <div class="col-md-6 col-sm-6 offset-md-5">
              <a href="{{route('admin.right.index')}}" class="btn btn-secondary btn-sm" type="button">Cancel</a>
			  <button class="btn btn-primary btn-sm" type="reset">Reset</button>
              <button type="submit" class="btn btn-success btn-sm">Submit</button>
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

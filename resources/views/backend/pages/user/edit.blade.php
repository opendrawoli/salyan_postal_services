@extends('backend.layout.app')
@section('content')
<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Users<small></small></h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">
            </ul>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />

<<<<<<< HEAD
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{route('admin.user.update',$user->id)}}" method="POST" enctype="multipart/form-data">
=======
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{route('SALYANPOSTAL22200.user.update',$user->id)}}" method="POST">
>>>>>>> 92de31a064d52d4c4eb2b2eebe6b8e3b842164b7
			@csrf
          @method('PUT')

			@include('backend.common.message')
		<div class="row">
			<div class="col-md-6">
	           	<label class="col-form-label " for="first-name"><strong>Name:</strong><span class="required">*</span>
	            </label>
	            <input type="text" name="name" class="form-control " id="name" value="{{$user->name}}">

                <label for="heard"><h6><strong>select user *:</strong></h6></label>
                          <select id="role" class="form-control" name="role">
                            <option value=""> ...select user....</option>
                            <option value="1" @if($user->role==1)? selected @endif
                              {{ old('role') }}>Admin</option>
                            <option value="2"@if($user->role==2)? selected @endif
                              {{ old('role') }}>Editor</option>
                            <option value="3"@if($user->role==3)? selected @endif
                              {{ old('role') }}>Author</option>
                          </select>
	                     
			</div>
      <div class="col-md-6">
                <label class="col-form-label " for="first-name"><strong>Email:</strong><span class="required">*</span>
              </label>
               <input type="email" name="email" class="form-control " id="email" value="{{$user->email}}">

            <label class="col-form-label " for="first-name"><strong>फोटो</strong><span class="required">*</span>
              </label>
              <input type="file" name="file" class="form-control" id="file" value="{{$user->file}}"><br>
            @if($user->file)
          <div class="col-md-9">
            <img src="{{ asset($user->file) }}" style="width: 150px;">
          </div>
          @endif
              
      </div>
	
		</div>
                   
          <div class="ln_solid"></div>
          <div class="item form-group">
            <div class="col-md-6 col-sm-6 offset-md-5">
<<<<<<< HEAD
              <a href="{{route('admin.user.index')}}" class="btn btn-secondary" type="button">Back</a>
=======
              <a href="{{route('SALYANPOSTAL22200.user.index')}}" class="btn btn-secondary" type="button">Cancel</a>
>>>>>>> 92de31a064d52d4c4eb2b2eebe6b8e3b842164b7
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
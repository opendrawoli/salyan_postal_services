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

        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{route('admin.user.store')}}" method="POST" enctype="multipart/form-data">
			@csrf
          @method('POST')

			@include('backend.common.message')
      
		<div class="row">
			<div class="col-md-6">
       <label class="col-form-label {{ $errors->has('slug') ? 'has-error' : '' }} " for="first-name"><strong>Name:</strong><span class="required">*</span>
       </label>
       <input type="text" name="name" class="form-control " id="name">
         @if($errors->has('name'))
                <span class="help-block">{{ $errors->first('name') }}</span>
            @endif

       <label class="col-form-label " for="first-name"><strong>Password:</strong><span class="required">*</span>
       </label>
       <input type="text" name="password" class="form-control " id="password">

       <label for="heard"><h6><strong>select user *:</strong></h6></label>
       <select id="role" class="form-control" name="role">
        <option value=""> ...select user....</option>
        <option value="1">Admin</option>
        <option value="2">Editor</option>
        <option value="3">Author</option>
      </select>
    </div>
      <div class="col-md-6">
                <label class="col-form-label " for="first-name"><strong>Email:</strong><span class="required">*</span>
              </label>
               <input type="email" name="email" class="form-control " id="email">

               <label class="col-form-label " for="first-name"><strong>Confirm Password:</strong><span class="required">*</span>
              </label>
               <input type="text" name="password_confirmation" class="form-control " id="password_confirmation">

                <label class="col-form-label " for="first-name"><strong>Image:</strong><span class="required">*</span>
              </label>
               <input type="file" name="file" class="form-control " id="file">
      </div>
		</div>
                   
          <div class="ln_solid"></div>
          <div class="item form-group">
            <div class="col-md-6 col-sm-6 offset-md-5">
              <a href="{{route('SALYANPOSTAL22200.user.index')}}" class="btn btn-secondary" type="button">Cancel</a>
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
 $('#successmsg').fadeOut(2000);
 $('#errmsg').fadeOut(2000);
    </script>

@endsection
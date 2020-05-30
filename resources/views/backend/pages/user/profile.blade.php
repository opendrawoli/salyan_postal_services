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
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{route('SALYANPOSTAL22200.user.update',$user->id)}}" method="POST" enctype="multipart/form-data">
         @csrf
         @method('PUT')

         @include('backend.common.message')
         <div class="row">
           <div class="col-md-12">
             <label class="col-form-label" for="first-name"><h6><strong>Name*:</strong></h6><span class="required"></span>
             </label>
             <input type="text" name="name" class="form-control " id="name" value="{{$user->name}}">

              <label class="col-form-label " for="first-name"><h6><strong>Email*:</strong></h6><span class="required"></span>
            </label>
            <input type="email" name="email" class="form-control " id="email" value="{{$user->email}}">

             <label class="col-form-label " for="first-name"><h6><strong>Password*:</strong></h6><span class="required"></span>
            </label>
            <input type="password" name="password" class="form-control " id="password">

             <label class="col-form-label " for="first-name"><h6><strong>Confirm Password*:</strong></h6><span class="required"></span>
            </label>
            <input type="password" name="password_confirmation" class="form-control " id="password_confirmation">

               <label class="col-form-label " for="first-name"><h6><strong>फोटो*:</strong></h6><span class="required"></span>
                  </label>
                  <input type="file" name="file" class="form-control" id="file" value="{{$user->file}}"><br>
                  @if($user->file)
                  <div class="col-md-9">
                    <img src="{{ asset($user->file) }}" style="width: 85px;">
                  </div>
                  @endif

                </div>
           </div>
          
              <div class="ln_solid"></div>
              <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-5">
                  <a href="{{route('SALYANPOSTAL22200.user.index')}}" class="btn btn-secondary" type="button">Back</a>
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
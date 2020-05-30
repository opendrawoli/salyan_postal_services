@extends('backend.layout.app')
@section('content')
<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>सम्पर्क विस्तृत बिबरण<small>सम्पूर्ण सम्पर्क बिबरण तल भर्नुहोस्</small></h2>
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

        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{route('SALYANPOSTAL22200.postContact')}}" method="POST">
			@csrf
          @method('POST')

			@include('backend.common.message')
		<div class="row">
			<div class="col-md-6">
            <label class="col-form-label " for="first-name"><strong>ठेगाना:</strong><span class="required">*</span>
	            </label>
	            <input type="text" name="address" class="form-control " id="address" value="{{@$contact->address}}">

	           	<label class="col-form-label " for="first-name"><strong>फोन:</strong><span class="required">*</span>
	            </label>
	            <input type="text" name="phone" class="form-control " id="phone" value="{{@$contact->phone}}">

                <label class="col-form-label " for="first-name"><strong>फ्याक्स:</strong><span class="required">*</span>
              </label>
               <input type="text" name="fax" class="form-control " id="fax" value="{{@$contact->fax}}">

                <label class="col-form-label " for="first-name"><strong>इमेल:</strong><span class="required">*</span>
              </label>
               <input type="text" name="email" class="form-control " id="email" value="{{@$contact->email}}">

               <label class="col-form-label " for="first-name"><strong>वेबसाइट:</strong><span class="required">*</span>
              </label>
               <input type="text" name="website" class="form-control " id="website" value="{{@$contact->website}}">
	                     
			</div>
			<div class="col-md-6">
				<label class="col-form-label " for="first-name"><strong>नोटिस बोर्ड:</strong><span class="required"></span>
		         </label>
		        <input type="text" name="notice_board" class="form-control " id="notice_board" value="{{@$contact->notice_board}}">

          <label class="col-form-label " for="first-name"><strong>फेसबुक:</strong> <span class="required"></span>
             </label>
          <input type="text" name="facebook" class="form-control " id="facebook" value="{{@$contact->facebook}}">

            <label class="col-form-label " for="first-name"><strong>ट्वीटर:</strong> <span class="required"></span>
             </label>
           <input type="text" name="twitter" class="form-control " id="twitter" value="{{@$contact->twitter}}">

            <label class="col-form-label " for="first-name"><strong>टोल फ्रीस:</strong> <span class="required"></span>
             </label>
            <input type="text" name="toll_free" class="form-control " id="toll_free" value="{{@$contact->toll_free}}">
	          
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
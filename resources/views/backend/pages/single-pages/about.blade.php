@extends('backend.layout.app')
@section('content')

<div class="x_panel">
  <div class="x_title">
    <h2>हाम्रो बारेमा <small>K hi sort Description Rakhunuhos hai</small></h2>
    <ul class="nav navbar-right panel_toolbox">
      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">Settings 1</a>
            <a class="dropdown-item" href="#">Settings 2</a>
          </div>
      </li>
      <li><a class="close-link"><i class="fa fa-close"></i></a>
      </li>
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
    <br />
    <form class="form-label-left input_mask" action="{{route('admin.postAbout')}}" method="POST" >
    	@csrf
    	@method('POST')

    	<div class="row">
	    	<div class="col-md-6">
			    <div class="col-md-12 col-sm-12  form-group has-feedback">
			        <input type="text" name="title_nepali" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Nepali Title" value="{{@$about->title_nepali}}">
			        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
			     </div>
			     <div class="col-md-12 col-sm-12  form-group has-feedback">
			       <textarea name="description_nepali">{{@$about->description_nepali}}</textarea>
			     </div>
    		</div>
    		<div class="col-md-6">
    			 <div class="col-md-12 col-sm-12  form-group has-feedback">
			        <input type="text" name="title_english" class="form-control has-feedback-left" id="inputSuccess2" placeholder="English Title" value="{{@$about->title_english}}">
			        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
			     </div>
			     <div class="col-md-12 col-sm-12  form-group has-feedback">
			      <textarea name="description_english">{{@$about->description_english}}</textarea>
			     </div>
    		</div>
    	</div>    
	

      <div class="form-group row">
        <div class="col-md-12 col-sm-12  offset-md-5">
          <button type="button" class="btn btn-primary">Cancel</button>
		          <button class="btn btn-primary" type="reset">Reset</button>
          <button type="submit" class="btn btn-success">Submit</button>
        </div>
      </div>

    </form>
  </div>
</div>
@endsection

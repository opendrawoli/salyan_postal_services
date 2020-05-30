@extends('backend.layout.app')
@section('content')
<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>समाचार, बोलपत्र, परिपत्र<small></small></h2>
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

        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="@if(isset($news)) {{route('SALYANPOSTAL22200.news.update',$news->id)}} @else {{route('SALYANPOSTAL22200.news.store')}} @endif" method="POST" enctype="multipart/form-data">
      @csrf
      @if(isset($news))
      @method('PUT')
      @endif
    <div class="row">
      @include('backend.common.message')
      <div class="col-md-8">
              <label class="col-form-label " for="first-name"><h6><strong>शीर्षक *:</strong></h6><span class="required"></span>
              </label>
              <input type="text" name="title" class="form-control" id="title" value="{{@$news->title}} {{ old('title') }}">

               <label class="col-form-label " for="first-name"><h6><strong>slug *:</strong></h6><span class="required"></span>
              </label>
              <input type="text" name="slug" class="form-control" id="slug" value="{{@$news->slug}} {{ old('slug') }}">

             
      </div>
      <div class="col-md-4">
              <label for="heard"><h6><strong>सूचना प्रकार *:</strong></h6></label>
                          <select id="notice_type" class="form-control" name="notice_type">
                            <option value=""> ...सूचना प्रकार छान्नुहोस्....</option>
                            <option value="1" @if(@$news->notice_type==1)? selected @endif
                              {{ old('notice_type') }}>समाचार</option>
                            <option value="2"  @if(@$news->notice_type==2)? selected @endif {{ old('notice_type') }}>बोलपत्र</option>
                            <option value="3"  @if(@$news->notice_type==3)? selected @endif {{ old('notice_type') }}>परिपत्र</option>
                            <option value="4"  @if(@$news->notice_type==4)? selected @endif {{ old('notice_type') }}>सूचना</option>
                            <option value="5"  @if(@$news->notice_type==5)? selected @endif {{ old('notice_type') }}>प्रेस विज्ञप्ति</option>
                          </select>


              <label class="col-form-label " for="first-name"><h6><strong>मिति *:</strong></h6><span class="required"></span>
              </label>
              <input type="text" name="nepali_date" class="form-control nepaliDate" id="nepali_date" value="{{@$news->nepali_date}} {{ old('nepali_date') }}">

              <label class="col-form-label " for="first-name"><h6><strong>File Upload (Pdf,Doc) *</strong></h6><span class="required"></span>
              </label>
              <input type="file" name="file" class="form-control" id="file" value="{{@$news->file}} {{ old('file') }}"><br>

                  
      </div>
      
    </div>
          
          <div class="ln_solid"></div>
          <div class="item form-group">
            <div class="col-md-6 col-sm-6 offset-md-5">
              <a href="{{route('SALYANPOSTAL22200.news.index')}}" class="btn btn-secondary" type="button">Cancel</a>
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
 $(function(){
  $("#title").keyup(function () {
        var str = $(this).val();
        str.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ').toLowerCase();
        str.replace(/^\s+|\s+$/gm,'');
        var slug=str.replace(/\s+/g, '-');
        var trimmed=$.trim(str)
        var check =slug.toLowerCase();
        $('#url').html(slug.toLowerCase());
        $("#slug").val(slug.toLowerCase());
    });

   })


 $('#successmsg').fadeOut(1200);
       $('#errmsg').fadeOut(1200);
    </script>

@endsection



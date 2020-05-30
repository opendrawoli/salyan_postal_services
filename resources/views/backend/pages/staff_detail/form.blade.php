@extends('backend.layout.app')
@section('content')
<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>कर्मचारीहरु<small>कर्मचारी विवरण </small></h2>
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
        " action="@if(isset($staff)) {{route('SALYANPOSTAL22200.staff.update',$staff->id)}} @else {{route('SALYANPOSTAL22200.staff.store')}} @endif" method="POST" enctype="multipart/form-data">
     @csrf
      @if(isset($staff))
      @method('PUT')
      @endif
    <div class="row">
      @include('backend.common.message')
      <div class="col-md-6">
              <label class="col-form-label " for="first-name"><strong>कर्मचारीको नाम</strong><span class="required">*</span>
              </label>
              <input type="text" name="name" class="form-control " id="name" value="{{@$staff->name}} {{ old('name') }}">

               <label class="col-form-label " for="first-name"><strong>इमेल</strong><span >*</span>
              </label>
              <input type="text" name="email" class="form-control" id="email" value="{{@$staff->email}} {{ old('email') }}">
                           
      </div>
      <div class="col-md-6">
       
            <div class="box-header with-border">
                  <button class="btn btn-sm btn-default" style="border: 1px solid black; float: right;" id="btn_designation"><i class="fa fa-plus"></i>Add</button>
              </div>
             <label for="heard">पद *:</label>
                          <select id="designation" class="form-control" name="designation">
                            <option value=""> ...पद छान्नुहोस्....</option>
                            <option value="0" @if(@$staff->designation==0)? selected @endif>कार्यलय प्रमुख</option>
                            <option value="1"@if(@$staff->designation==1)? selected @endif>नायब सुब्बा</option>

                            @foreach($designations as $designation)
                            <option value="{{ @$designation->designation }}"
                              @if(@$designation->designation==@$staff->designation)
                              selected
                              @endif
                              >{{ @$designation->designation }}</option>
                            @endforeach
                          </select>
            <label class="col-form-label " for="first-name" ><strong>कार्यलय फोन</strong><span class="required">*</span>
             </label>
            <input type="text" name="phone" class="form-control" id="phone" value="{{@$staff->phone}} {{ old('phone') }}" >
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
              <label class="col-form-label " for="first-name"><strong>फोटो</strong><span class="required">*</span>
              </label>
              <input type="file" name="file" class="form-control" id="file" value="{{@$staff->file}}"><br>
            @if(@$staff->file)
          <div class="col-md-9">
            <img src="{{ asset(@$staff->file) }}" style="width: 150px;">
          </div>
          @endif
      </div>
      
    </div>
                   
          <div class="ln_solid"></div>
          <div class="item form-group">
            <div class="col-md-6 col-sm-6 offset-md-5">
              <a href="{{route('SALYANPOSTAL22200.staff.index')}}" class="btn btn-secondary" type="button">Back</a>
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
 //=====================================add category=======================

$('#btn_designation').click(function(e) {
              e.preventDefault();
                var desig = null;
                (async () => {
                const { value: formValues } = await Swal.fire({
                  title: 'पद थप्नुहोस',
                  html:
                    '<input id="swal-input1" class="swal2-input" placeholder="Enter designation">',
                  focusConfirm: false,
                  preConfirm: () => {
                    return [
                      desig=document.getElementById('swal-input1').value
                    ]
                  },
                  showCancelButton: true
                })

                if (desig) {
                   $('#designation').empty()
                        var data = {
                          "_token": "{{csrf_token()}}",
                          "designation": desig,
                        }
                        console.log(data);
                        $.ajax({
                          url: "{{ route('SALYANPOSTAL22200.designationAdd') }}",
                          method: "post",
                          data: data,
                          success: function(data) {
                            // AddSuccessMessage();
                              window.location.href = "{{route('SALYANPOSTAL22200.staff.create')}}";
                                  },
                                  error: function(error) {
                                    Swal.fire({
                                      icon: 'error',
                                      title: 'Oops...',
                                      text: "यो पद पहिले नै छ",
                                    });
                                     window.location.href = "{{route('SALYANPOSTAL22200.staff.create')}}";
                                  }
                        });
                    }

                })()

});
    
      $('#successmsg').fadeOut(1500);
      $('#errmsg').fadeOut(1500);

</script>
@endsection
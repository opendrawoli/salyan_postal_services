 @extends('backend.layout.app')
@section('content')
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>कर्मचारी विवरण</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="x_panel">
                  <div class="x_content">
                      <div class="col-md-12 col-sm-12  text-center">
                        <ul class="pagination pagination-split">
                         {{$staffs->links()}}
                        </ul>
                      </div>

                      <div class="clearfix"></div>
                    @foreach($staffs as $staff)
                     <div class="col-md-4 col-sm-4  profile_details">
                        <div class="well profile_view">
                          <div class="col-sm-12">
                            <h4 class="brief"><i>@if($staff->designation==0) कार्यलय प्रमुख
                              @elseif($staff->designation==1) नायब सुब्बा/सूचना अधिकारी
                              @else
                              {{$staff->designation}} 
                               @endif</i></h4>
                            <div class="left col-sm-8">
                              <h2>{{$staff->name}}</h2>
                             <p><strong>Email: </strong>{{$staff->email}} </p>
                              <ul class="list-unstyled">
                                <li><i class="fa fa-phone"></i>  फोन:{{$staff->phone}} </li>
                              </ul>
                            </div>
                            <div class="right col-sm-4 text-center">
                              <img src="{{asset($staff->file)}}" alt="" class="img-circle img-fluid">
                            </div>
                          </div>
                          <div class=" bottom text-center">
                            <div class=" col-sm-4 emphasis">
                              <a href="{{route('SALYANPOSTAL22200.staff.edit',$staff->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit" title="Edit">Edit</i></a>
                            </div>
                             <div class=" col-sm-2 emphasis">
                                <a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="deleteRow('staff{{$staff->id }}')" title="Delete">Delete</a>

                                <form id="staff{{$staff->id}}" action="{{route('SALYANPOSTAL22200.staff.destroy',$staff->id)}}" method="post">
                                  @csrf
                                  @method('DELETE')
                                </form>
                              </div>
                          </div>
                        </div>
                      </div>

                      @endforeach

                  </div>
                </div>
            </div>
          </div>
        @endsection
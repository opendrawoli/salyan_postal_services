 @extends('backend.layout.app')
@section('content')
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>User विवरण</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="x_panel">
                  <div class="x_content">
                      <div class="col-md-12 col-sm-12  text-center">
                        <ul class="pagination pagination-split">
                         {{$users->links()}}
                        </ul>
                      </div>

                      <div class="clearfix"></div>
                    @foreach($users as $user)
                      <div class="col-md-4 col-sm-4  profile_details">
                        <div class="well profile_view">
                          <div class="col-sm-12">
                            <h4 class="brief"><i>User</i></h4>
                            <div class="left col-md-7 col-sm-7">
                              <h2>{{$user->name}}</h2>
                              <ul class="list-unstyled">
                               <p><strong>Email: </strong> {{$user->email}} </p>
                              </ul>
                            </div>
                            <div class="right col-md-5 col-sm-5 text-center">
                              <img src="{{asset($user->file)}}" alt="" class="img-circle img-fluid">
                            </div>
                          </div>
                          <div class=" profile-bottom text-center">
                             <div class=" col-sm-2 emphasis">
                                <a href="{{route('SALYANPOSTAL22200.user.edit',$user->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit" title="Edit">Edit</i></a>
                            </div>
                            <div class=" col-sm-4 emphasis">
                                <a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="deleteRow('user{{$user->id }}')" title="Delete"><i class="fa fa-trash"></i>Delete</a>

                                <form id="user{{$user->id}}" action="{{route('SALYANPOSTAL22200.user.destroy',$user->id)}}" method="post">
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
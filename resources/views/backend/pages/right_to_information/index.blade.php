@extends('backend.layout.app')
@section('content')
<div class="col-md-12 col-sm-12 ">
      <div class="x_panel">
        <div class="x_title">
          <h2>सूचनाको-हक<small></small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                </div>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                      <div class="card-box table-responsive">
              <p class="text-muted font-13 m-b-30">
               
              </p>
    
                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>सि.न.</th>
                      <th>शिर्षक  </th>
                      <th>समय अवधि</th>
                      <th>डाउनलोड </th>
                      <th>सम्पादन </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $count=0; ?>
                    @foreach($rights as $right)
                    <tr>
                      <td><?= ++$count ?></td>
                      <td>{{$right->title}}</td>
                      <td>{{$right->first_date}}/  {{$right->last_date}}</td>
                      <td>
                        <a href="{{asset($right->file)}}"  class="btn btn-info btn-sm" title="{{$right->title}}" download><i class="fa fa-download"></i> </a>
                      </td>

                      <td><a href="{{route('SALYANPOSTAL22200.right.edit',$right->id) }}" class="btn btn-info btn-sm">Edit</a>
                        <a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="deleteRow('postalRate{{$right->id }}')">Delete</a>

                        <form id="postalRate{{$right->id}}" action="{{route('SALYANPOSTAL22200.right.destroy',$right->id)}}" method="post">
                          @csrf
                          @method('DELETE')
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  
                  </tbody>
                </table>
    
    
            </div>
          </div>
          </div>
          </div>
          </div>
        </div>
@endsection

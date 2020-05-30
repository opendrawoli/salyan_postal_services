@extends('backend.layout.app')
@section('content')
<div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>सबै सेवाहरु</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings</a>
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
          
                      <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th>S.N.</th>
                            <th>Title(नेपालीमा)</th>
                            <th>Title(English)</th>
                            <th>Image</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $count =0;
                          ?>
                          @if($services->count()>0)
                          @foreach($services as $service)
                          <tr>
                            <td>{{ ++$count }}</td>
                            <td>{{$service->title_nepali}}</td>
                            <td>{{$service->title_english}} </td>
                            <td>
                              <img src="{{asset($service->file)}}" height="75" width="75" alt="">
                            </td>
                           <td>
                             <a href="{{route('SALYANPOSTAL22200.service.edit',$service->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit" title="Edit"></i></a>
                                <a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="deleteRow('service{{$service->id }}')" title="Delete"><i class="fa fa-trash"></i></a>

                                <form id="service{{$service->id}}" action="{{route('SALYANPOSTAL22200.service.destroy',$service->id)}}" method="post">
                                  @csrf
                                  @method('DELETE')
                                </form>
                           </td>
                           
                          </tr>
                           @endforeach
                            @endif
                        </tbody>
                      </table>
          
                  </div>
                </div>
                </div>
                </div>
                </div>
              </div>
@endsection

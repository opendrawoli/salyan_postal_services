@extends('backend.layout.app')
@section('content')
<div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>कर्मचारी विवरण</h2>
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
                            <th>कर्मचारीको नाम/th>
                            <th>पद</th>
                            <th>इमेल</th>
                            <th>कार्यलय फोन.</th>
                            <th>फोटो</th>
                            <th>सम्पादन</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $count =0;
                          ?>
                          @if($staffs->count()>0)
                          @foreach($staffs as $staff)
                          <tr>
                            <td>{{ ++$count }}</td>
                            <td>{{$staff->name}}</td>
                            <td>
                              @if($staff->designation==0) कार्यलय प्रमुख
                              @elseif($staff->designation==1) नायब सुब्बा
                              @else
                              {{$staff->designation}} 
                               @endif
                            </td>
                            <td>{{$staff->email}} </td>
                            <td>{{$staff->phone}} </td>
                            <td>
                              <img src="{{asset($staff->file)}}" height="75" width="75" alt="">
                            </td>
                           <td>
                             <a href="{{route('admin.staff.edit',$staff->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit" title="Edit"></i></a>
                                <a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="deleteRow('staff{{$staff->id }}')" title="Delete"><i class="fa fa-trash"></i></a>

                                <form id="staff{{$staff->id}}" action="{{route('admin.staff.destroy',$staff->id)}}" method="post">
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

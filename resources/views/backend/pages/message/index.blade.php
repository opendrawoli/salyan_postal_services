@extends('backend.layout.app')
@section('content')
<div class="col-md-12 col-sm-12 ">
      <div class="x_panel">
        <div class="x_title">
          <h2>सबै मेसेजहरु<small></small></h2>
          <ul class="nav navbar-activity panel_toolbox">
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
                      <th>पुरा नाम </th>
                      <th>इमेल </th>
                      <th>फोन </th>>
                      <th>बिषय </th>
                      <th>सम्पादन </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $count=0; ?>
                    @foreach($messages as $message)
                    <tr>
                      <td><?= ++$count ?></td>
                      <td>{{$message->fullname}}</td>
                      <td>{{$message->email}}</td>
                      <td>{{$message->phone}}</td>
                      <td>{{$message->subject}}</td>
                      <td>
                        <a href="{{route('admin.seenMessage',$message->id)}}" class="btn btn-primary btn-sm">View</a>

                        <a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="deleteRow('postalRate{{$message->id }}')">Delete</a>

                        <form id="postalRate{{$message->id}}" action="{{route('admin.deleteMessage',$message->id)}}" method="post">
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

@extends('backend.layout.app')
@section('content')
<div class="col-md-12 col-sm-12 ">
      <div class="x_panel">
        <div class="x_title">
          <h2>ऐन तथा नियमावली<small></small></h2>
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
                      <th>विवरण  </th>
                      <th>अन्तिम पटक परिवर्तन मिति</th>
                      <th>डाउनलोड </th>
                      <th>सम्पादन </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $count=0; ?>
                    @foreach($act_and_regulations as $act_and_regulation):
                    <tr>
                      <td><?= ++$count ?></td>
                      <td>{{$act_and_regulation->title}}</td>
                      <td>{{$act_and_regulation->description}}</td>
                      <td>{{$act_and_regulation->date}}</td>
                      <td><a href="{{asset($act_and_regulation->file)}}" download><i class="fa fa-download"></i> {{$act_and_regulation->title}}</a></td>
                      <td><a href="{{route('SALYANPOSTAL22200.act_and_regulation.edit',$act_and_regulation->id) }}" class="btn btn-info btn-sm">Edit</a>
                        <a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="deleteRow('postalRate{{$act_and_regulation->id }}')">Delete</a>

                        <form id="postalRate{{$act_and_regulation->id}}" action="{{route('SALYANPOSTAL22200.act_and_regulation.destroy',$act_and_regulation->id)}}" method="post">
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

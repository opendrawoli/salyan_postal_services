@extends('backend.layout.app')
@section('content')
<div class="col-md-12 col-sm-12 ">
      <div class="x_panel">
        <div class="x_title">
          <h2>Sliders<small>(तपाइले ५ ओटा slider मात्र सक्रिय गर्नसक्नुहुन्छ) </small></h2>
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
                      <th>सि.न. </th>
                      <th>शिर्षक </th>
                      <th>विवरण  </th>
                      <th>फोटो   </th>
                      <th>अवस्था </th>
                      <th>सम्पादन </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $count=0; ?>
                    @foreach($sliders as $slider):
                    <tr>
                      <td><?= ++$count ?></td>
                      <td>{{$slider->title}}</td>
                      <td>{!! $slider->description !!}</td>
                      <td><img src="{{asset($slider->image)}}" class="img-thumbnail" height="100"  alt=""></td>
                      <td><a href="{{route('SALYANPOSTAL22200.activeInactiveSlider',$slider->id)}}"><?php if($slider->status==1) echo '<span class="btn btn-primary">Active</span>'; else echo '<span class="btn btn-secondary">Inactive</span>'; ?></a></td>

                      <td><a href="{{route('SALYANPOSTAL22200.sliders.edit',$slider->id) }}" class="btn btn-info btn-sm">Edit</a>
                        <a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="deleteRow('postalRate{{$slider->id }}')">Delete</a>

                        <form id="postalRate{{$slider->id}}" action="{{route('SALYANPOSTAL22200.sliders.destroy',$slider->id)}}" method="post">
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



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
                  <div class=" pull-left" style="margin-left: 30px; padding: 7px 0;">
                    <?php $links= [] ?>
                    @foreach($statusList as $key => $value)
                    @if($value)
                    <?php $selected = Request::get('status') == $key ? 'selected-status' : '' ?>
                    <?php $links[] = "<a class =\"{$selected}\" href=\"?status={$key}\">" .($key). "({$value})</a>"  ?>
                    @endif
                    @endforeach
                    {!! implode(' | ', $links) !!}
                  </div>
                 
                  <div class="x_content">
                      <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
          
                      <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th>सी.एन.</th>
                            <th>शीर्षक</th>
                            <th>सूचना प्रकार </th>
                            <th>मिति</th>
                            <th>फोटो</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $count =0;
                          ?>
                          @if($news->count()>0)
                          @foreach($news as $news)
                          <tr>
                            <td>{{ ++$count }}</td>
                            <td>{{$news->title}}</td>
                            <td>
                               @if($news->notice_type==1) समाचार
                               @elseif($news->notice_type==2) बोलपत्र
                               @elseif($news->notice_type==3) परिपत्र
                               @elseif($news->notice_type==4) सूचना
                               @elseif($news->notice_type==5) प्रेस विज्ञप्ति
                               @endif

                             </td>
                            <td>{{$news->nepali_date}} </td>
                            <td>
                              <img src="{{asset($news->thumbnail)}}" height="75" width="75" alt="">
                            </td>
                           <td>
                            @if($news->file)
                            <a href="{{asset($news->file)}}" class="btn btn-info btn-sm" title="{{$news->title}}" download><i class="fa fa-download" ></i></a>
                            @endif
                             <a href="{{route('admin.news.edit',$news->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit" title="Edit"></i></a>
                                <a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="deleteRow('news{{$news->id }}')" title="Delete"><i class="fa fa-trash"></i></a>

                                <form id="news{{$news->id}}" action="{{route('admin.news.destroy',$news->id)}}" method="post">
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

@extends('backend.layout.app')
@section('content')
<style>
    .tile_stats_count{
        padding:50px;
        height:100px;
        border:1px solid #f3f3f3;
        width:180px;
        
        background:#fff;
    }
    .date{
        background:#ad4700;
    }
</style>
<div class="row" style="display: inline-block; margin-left:2px;" >
    <div class="tile_count row">
        <div class="col-md-2 col-sm-4  tile_stats_count">
            <br/>
            <span class="count_top"><i class="fa fa-user"></i> कर्मचारीहरु </span>
            <div class="count green"><?php $staff=App\Model\StaffDetail::all(); echo $staff->count() ?></div>
        </div>
        <div class="col-md-2 col-sm-4  tile_stats_count">
         <br/>
            <span class="count_top"><i class="fa fa-clock-o"></i> ऐन तथा नियमावली</span>
            <div class="count green"><?php $acti=App\Model\ActAndRegulation::all(); echo $acti->count() ?></div>
        </div>
        <div class="col-md-2 col-sm-4  tile_stats_count">
         <br/>
            <span class="count_top"><i class="fa fa-envelope"></i> मेसेजहरु</span>
            <div class="count green"><?php $message=App\Model\Message::all(); echo $message->count() ?></div>
        </div>
        <div class="col-md-2 col-sm-4  tile_stats_count">
         <br/>
            <span class="count_top"><i class="fa fa-cubes"></i>  सेवाहरु</span>
            <div class="count green"><?php $service=App\Model\Service::all(); echo $service->count() ?></div>
        </div>
        <div class="col-md-2 col-sm-4  tile_stats_count">
         <br/>
            <span class="count_top"><i class="fa fa-pencil"></i> सूचनाको-हक</span>
            <div class="count green"><?php $right=App\Model\MediaCenter\Right::all(); echo $right->count() ?></div>
        </div>
        <div class="col-md-2 col-sm-4  tile_stats_count">
         <br/>
            <span class="count_top"><i class="fa fa-newspaper-o"></i>  समाचार  </span>
            <div class="count green"><?php $newsNotice=App\Model\MediaCenter\News::where('notice_type',1); echo $newsNotice->count() ?></div>
        </div>
        
        
    </div>
</div>

<div class="row" style="display: inline-block;">
    <div class="tile_count">
       
        
        <div class="col-md-2 col-sm-4  tile_stats_count">
         <br/>
            <span class="count_top"><i class="fa fa-send"></i> बोलपत्र</span>
            <div class="count green"><?php $newsNotice=App\Model\MediaCenter\News::where('notice_type',2); echo $newsNotice->count() ?></div>
        </div>
        <div class="col-md-2 col-sm-4  tile_stats_count">
         <br/>
            <span class="count_top"><i class="fa fa-line-chart"></i> परिपत्र</span>
            <div class="count green"><?php $newsNotice=App\Model\MediaCenter\News::where('notice_type',3); echo $newsNotice->count() ?></div>
        </div>
        <div class="col-md-2 col-sm-4  tile_stats_count">
         <br/>
            <span class="count_top"><i class="fa fa-file"></i> सूचना</span>
            <div class="count green"><?php $newsNotice=App\Model\MediaCenter\News::where('notice_type',4); echo $newsNotice->count() ?></div>
        </div>

        <div class="col-md-2 col-sm-4  tile_stats_count">
         <br/>
            <span class="count_top"><i class="fa fa-suitcase"></i> प्रेश विज्ञप्ति</span>
            <div class="count green"><?php $newsNotice=App\Model\MediaCenter\News::where('notice_type',5); echo $newsNotice->count() ?></div>
        </div>
        <div class="col-md-2 col-sm-4  tile_stats_count">
         <br/>
            <span class="count_top"><i class="fa fa-wrench"></i> हुलाक दर</span>
            <div class="count green"><?php $postalRate=App\Model\PostalRate::all(); echo $postalRate->count() ?></div>
        </div>
        
    </div>
</div>

<div class="row">
              <div class="col-md-4">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Unread Messages<small></small></h2>
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
                  <div class="x_content" style="display: block;">
                  <?php $messages = App\Model\Message::where('status',0)->get();?>
                   @foreach($messages as $message)
                    <article class="media event">
                      <a class="pull-left date">
                        <p class="month">{{$message->created_at->diffForHumans()}}</p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="{{route('SALYANPOSTAL22200.seenMessage',$message->id)}}">{{$message->fullname}}</a>
                        <p>{{$message->subject}}</p>
                      </div>
                    </article>
                    @endforeach
                  </div>
                </div>
              </div>

              <!-- <div class="col-md-4">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Top Profiles <small>Sessions</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <article class="media event">
                      <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Item One Title</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      </div>
                    </article>
                    <article class="media event">
                      <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Item Two Title</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      </div>
                    </article>
                    <article class="media event">
                      <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Item Two Title</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      </div>
                    </article>
                    <article class="media event">
                      <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Item Two Title</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      </div>
                    </article>
                    <article class="media event">
                      <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Item Three Title</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      </div>
                    </article>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Top Profiles <small>Sessions</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <article class="media event">
                      <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Item One Title</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      </div>
                    </article>
                    <article class="media event">
                      <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Item Two Title</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      </div>
                    </article>
                    <article class="media event">
                      <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Item Two Title</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      </div>
                    </article>
                    <article class="media event">
                      <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Item Two Title</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      </div>
                    </article>
                    <article class="media event">
                      <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Item Three Title</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      </div>
                    </article>
                  </div>
                </div>
              </div> -->
            </div>

        
@endsection

            @extends('backend.layout.app')
            @section('content')
            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>User Message<small>User Mail</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    @if($messages)
                    <div class="row">
                      <div class="col-sm-3 mail_list_column">
                        @foreach($messages as $msg)
                        <a href="{{route('SALYANPOSTAL22200.seenMessage',$msg->id)}}">
                          <div class="mail_list">
                            <div class="left">
                              <i class="fa fa-circle"></i>
                            </div>
                            <div class="right">
                              <h3>{{$msg->fullname}} <small>{{$msg->created_at->diffForHumans()}}</small></h3>
                              <p>{{$msg->subject}}</p>
                            </div>
                          </div>
                        </a>
                        @endforeach
                      </div>
                      <!-- /MAIL LIST -->

                      <!-- CONTENT MAIL -->
                      <div class="col-sm-9 mail_view">
                        <div class="inbox-body">
                          <div class="mail_heading row">
                            <div class="col-md-8">
                              <div class="btn-group">
                                <a href="mailto:{{$message->email}}" target="_blank" class="btn btn-sm btn-primary" type="button"><i class="fa fa-reply"></i>Reply</a>
                              </div>
                            </div>
                            <div class="col-md-4 text-right">
                              <p class="date"> {{$message->created_at}}</p>
                            </div>
                            <div class="col-md-12">
                              <h4>Subject: {{$message->subject}}</h4>
                            </div>
                          </div>
                          <div class="sender-info">
                            <div class="row">
                              <div class="col-md-12">
                                <strong>{{$message->fullname}}</strong>
                                <span>({{$message->email}})</span> to
                                <strong>me</strong>
                                <a class="sender-dropdown"><i class="fa fa-chevron-down"></i></a>
                              </div>
                            </div>
                          </div>
                          <hr/>
                          <div class="view-mail">

                            <p> {!! $message->message !!}</p>
                          </div>
                        </div>

                      </div>
                      <!-- /CONTENT MAIL -->
                    </div>
                    @else
                    <div class="row">
                      No message found
                    </div>
                    @endif
                  </div>
                </div>
              </div>
            </div>
            @endsection
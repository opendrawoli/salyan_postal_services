
 <div class="top_nav">
    <div class="nav_menu">
        <div class="nav toggle">
          <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <nav class="nav navbar-nav">
        <ul class=" navbar-right">
        	<?php $currentUser = Auth::user() ?>
          <li class="nav-item dropdown open" style="padding-left: 15px;">
            <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
              <img src="{{asset($currentUser->file)}}" alt="">{{$currentUser->name}}
            </a>
            <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item"  href="javascript:;"> Profile</a>
               <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
            </div>
          </li>
            
          <li role="presentation" class="nav-item dropdown open">
            <?php $messages = App\Model\Message::where('status',0)->get();?>
            <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-envelope-o" title="Notifications"></i>
               @if($messages->count() != '0')
              <span class="badge bg-green count" title="Notifications">{{$messages->count()}}</span>
              @endif
            </a>
            <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
              @foreach($messages as $message)
              <li class="nav-item">
                <a href="{{route('SALYANPOSTAL22200.seenMessage',$message->id)}}" class="dropdown-item">
                  <span>
                    <span>{{$message->fullname}}</span>
                    <span class="time">{{$message->created_at->diffForHumans()}}</span>
                  </span>
                  <span class="message">
                   {{$message->subject}}
                  </span>
                </a>
              </li>
              @endforeach
             
              <li class="nav-item">
                <div class="text-center">
                  <a href="{{route('SALYANPOSTAL22200.getMessage')}}" class="dropdown-item">
                    <strong>See All</strong>
                  </a>
                </div>
              </li>
            </ul>
          </li>
          <li class="nav-item float-left">
        		 <a href="">जिल्ला हुलाक कार्यालय सल्यान</a>
        	</li>
        </ul>
      </nav>
    </div>
  </div>

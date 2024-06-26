<nav
  class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow navbar-static-top navbar-light navbar-brand-center">
  <div class="navbar-wrapper">
    <div class="navbar-header">
      <ul class="nav navbar-nav flex-row">
        <li class="nav-item mobile-menu d-md-none mr-auto">
          <a class="nav-link nav-menu-main menu-toggle hidden-xs"
            href="#"><i class="ft-menu font-large-1"></i>
          </a>
        </li>
        <!-- <li class="nav-item">
          <a class="navbar-brand" href="{{url('')}}">
            <img alt="modern admin logo" src="{{asset('img/ezwalogo.jpeg')}}"  class="img-fluid" width="200" style="max-width: 86%;
    height: 65PX;">
            <h3 class="brand-text">فندق العزوة</h3>
          </a>
        </li> -->
        <li class="nav-item d-md-none">
          <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i
              class="la la-ellipsis-v"></i></a>
        </li>
      </ul>
    </div>
    <div class="navbar-container content">
      <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="nav navbar-nav mr-auto float-left">
        <li class="nav-item">
          <a class="navbar-brand" href="{{url('')}}">
            <img alt="modern admin logo" src="{{asset('img/ezwalogo.jpeg')}}"  class="img-fluid" width="200" style="max-width: 86%;
    height: 65PX;">
            <!-- <h3 class="brand-text">فندق العزوة</h3> -->
          </a>
        </li>


        </ul>
        <ul class="nav navbar-nav float-right">
        <li class="dropdown dropdown-notification nav-item">
              <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-bell"></i>
                <span class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow">{{$notify_count}}</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                <li class="dropdown-menu-header">
                  <h6 class="dropdown-header m-0">
                    <span class="grey darken-2">تنبيهات</span>
                  </h6>
                  <span class="notification-tag badge badge-default badge-danger float-right m-0">{{$notify_count}}</span>
                </li>
                <li class="scrollable-container media-list w-100">
                
                  @foreach($notify_clients as $notify)
                  <a href="javascript:void(0)">
                    <div class="media">
                      <div class="media-left align-self-center"><i class="ft-alert-triangle icon-bg-circle bg-yellow bg-darken-3"></i></div>
                      <div class="media-body">
                        <h6 class="media-heading yellow darken-3">شقة رقم {{$notify->properties->number}}</h6>
                        <p class="notification-text font-small-3 text-muted">
                           @if($notify->time_out=="two day")
                               متبقي يومين
                            @else
                              متبقي يوم
                            @endif</p>
                        <small>
                          <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">
                            {{$notify->end_date}}
                        </time>
                        </small>
                      </div>
                    </div>
                  </a>
                  @endforeach
                 
                </li>
                <!-- <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center" href="javascript:void(0)">Read all notifications</a></li> -->
              </ul>
            </li>
          <li class="dropdown dropdown-user nav-item">
            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
              <span class="mr-1">مرحبا,
                <span class="user-name text-bold-700">{{Auth::user()->name}}</span>
              </span>
              <span class="avatar avatar-online">
                <img src="{{asset('img/avatar-s-19.png')}}" alt="avatar"><i></i></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="{{url('admin/profile')}}"><i class="ft-user"></i>
                تعديل بياناتي</a>

              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                  class="ft-power"></i> تسجيل
                الخروج</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </div>
          </li>
          
          <!-- <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag"
              href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                class="flag-icon flag-icon-gb"></i><span class="selected-language"></span></a>
            <div class="dropdown-menu" aria-labelledby="dropdown-flag"><a class="dropdown-item" href="#"><i
                  class="flag-icon flag-icon-gb"></i> English</a>
              <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-fr"></i> French</a>
              <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-cn"></i> Chinese</a>
              <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-de"></i> German</a>
            </div>
          </li> -->

        </ul>
      </div>
    </div>
  </div>
</nav>

<style>
  .header-navbar .navbar-header .navbar-brand {
     padding: 0px 0; 
    margin-left: 0;
}
  </style>
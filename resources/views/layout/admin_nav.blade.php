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
          <li class="dropdown dropdown-user nav-item">
            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
              <span class="mr-1">مرحبا,
                <span class="user-name text-bold-700">{{Auth::user()->name}}</span>
              </span>
              <span class="avatar avatar-online">
                <img src="{{asset('img/avatar-s-19.png')}}" alt="avatar"><i></i></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="#"><i class="ft-user"></i>
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
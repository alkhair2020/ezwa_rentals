<div
  class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-dark navbar-without-dd-arrow navbar-shadow"
  role="navigation" data-menu="menu-wrapper">
  <div class="navbar-container main-menu-content" data-menu="menu-container">
    <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">


      <li class=" nav-item {{ Request::is('/') ? 'active' : '' }}">
        <a class="dropdown-toggle nav-link " href="{{url('/')}}"><i class="la la-home"></i>
          <span>الرئيسية</span>
        </a>
      </li>
      <li class=" nav-item {{ Request::is('admin/properties') ? 'active' : '' }}">
        <a class="dropdown-toggle nav-link " href="{{url('admin/properties')}}"><i class="la la-building"></i>
          <span>الوحدات</span>
        </a>
      </li>
      <li class=" nav-item {{ Request::is('admin/clients') ? 'active' : '' }}">
        <a class="dropdown-toggle nav-link " href="{{url('admin/clients')}}"><i class="la la-folder-open"></i>
          <span>العقود</span>
        </a>
      </li>
      <!-- <li class=" nav-item {{ Request::is('admin/receipts') ? 'active' : '' }}">
        <a class="dropdown-toggle nav-link " href="{{url('admin/receipts')}}"><i class="la la-folder-open"></i>
          <span>سندات القبض</span>
        </a>
      </li>
      <li class=" nav-item {{ Request::is('admin/expenses') ? 'active' : '' }}">
        <a class="dropdown-toggle nav-link " href="{{url('admin/expenses')}}"><i class="la la-folder-open"></i>
          <span>سندات الصرف</span>
        </a>
      </li> -->

    </ul>
  </div>
</div>

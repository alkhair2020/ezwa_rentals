<div
  class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-dark navbar-without-dd-arrow navbar-shadow"
  role="navigation" data-menu="menu-wrapper">
  <div class="navbar-container main-menu-content" data-menu="menu-container">
    <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">

      @can('home')
      <li class=" nav-item {{ Request::is('/') ? 'active' : '' }}">
        <a class="dropdown-toggle nav-link " href="{{url('/')}}"><i class="la la-home"></i>
          <span>الرئيسية</span>
        </a>
      </li>
      @endcan
      @can('property-list')
      <li class=" nav-item {{ Request::is('admin/properties') ? 'active' : '' }}">
        <a class="dropdown-toggle nav-link " href="{{url('admin/properties')}}">
          <i class="la la-building"></i>
          <span>الوحدات</span>
        </a>
      </li>
      @endcan
      @can('client-list')
      <li class=" nav-item {{ Request::is('admin/clients') ? 'active' : '' }}">
        <a class="dropdown-toggle nav-link " href="{{url('admin/clients')}}"><i class="la la-folder-open"></i>
          <span>العقود</span>
        </a>
      </li>
      @endcan
      @can('client-closed')
      <li class=" nav-item {{ Request::is('admin/client/closed') ? 'active' : '' }}">
        <a class="dropdown-toggle nav-link " href="{{url('admin/client/closed')}}"><i class="la la-folder-open"></i>
          <span>عقود منتهية</span>
        </a>
      </li>
      @endcan
      @can('role-list')
      <li class=" nav-item {{ Request::is('admin/roles') ? 'active' : '' }}">
        <a class="dropdown-toggle nav-link " href="{{url('admin/roles')}}"><i class="la la-folder-open"></i>
          <span>الصلاحيات</span>
        </a>
      </li>
      @endcan
      @can('user-list')
      <li class=" nav-item {{ Request::is('admin/users') ? 'active' : '' }}">
        <a class="dropdown-toggle nav-link " href="{{url('admin/users')}}"><i class="la la-folder-open"></i>
          <span>المستخدمين</span>
        </a>
      </li>
      @endcan
      @can('reports')
      <li class=" nav-item {{ Request::is('admin/reports') ? 'active' : '' }}">
        <a class="dropdown-toggle nav-link " href="{{url('admin/reports')}}"><i class="la la-folder-open"></i>
          <span>التقارير</span>
        </a>
      </li>
      @endcan
      @can('cleans-list')
      <li class=" nav-item {{ Request::is('admin/cleans') ? 'active' : '' }}">
        <a class="dropdown-toggle nav-link " href="{{url('admin/cleans')}}">
          <!-- <i class="la la-folder-open"></i> -->
          <span>أستمارات النظافة</span>
        </a>
      </li>
      @endcan
      @can('maintenance-list')
      <li class=" nav-item {{ Request::is('admin/maintenances') ? 'active' : '' }}">
        <a class="dropdown-toggle nav-link " href="{{url('admin/maintenances')}}">
          <!-- <i class="la la-folder-open"></i> -->
          <span>أستمارات الصيانة</span>
        </a>
      </li>
      @endcan
      @can('receipt-list')
      <li class=" nav-item {{ Request::is('admin/receipts') ? 'active' : '' }}">
        <a class="dropdown-toggle nav-link " href="{{url('admin/receipts')}}"><i class="la la-folder-open"></i>
          <span>سندات القبض</span>
        </a>
      </li>
      @endcan
      @can('expense-list')
      <li class=" nav-item {{ Request::is('admin/expenses') ? 'active' : '' }}">
        <a class="dropdown-toggle nav-link " href="{{url('admin/expenses')}}"><i class="la la-folder-open"></i>
          <span>سندات الصرف</span>
        </a>
      </li>
      @endcan
    </ul>
  </div>
</div>

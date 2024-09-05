<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{ asset('backend') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
      class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AutosOnly</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('backend') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
          alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Admin</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
          aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
        data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{route('admin')}}" class="nav-link @if (request()->routeIs('admin')) active @endif">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin-cars.index')}}" class="nav-link @if (request()->routeIs('admin-cars.*')) active @endif">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Car
              </p>
            </a>
          </li>
          <li class="nav-item">
                <a href="{{route('admin-faq.index')}}" class="nav-link @if (request()->routeIs('admin-faq.*')) active @endif">
                <i class="nav-icon fas fa-copy"></i>
                  <p>FAQ</p>
                </a>
              </li>
          <li class="nav-item @if (request()->routeIs('setting')) menu-is-opening menu-open @endif">
            <a href="" class="nav-link @if (request()->routeIs('setting')) active  @endif">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Setting
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('settings') }}" class="nav-link @if (request()->routeIs('settings')) active @endif">
                <i class="fas fa-wrench"></i>
                <p>App Settings</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('cms.index') }}" class="nav-link">
                <i class="fab fa-buromobelexperte"></i>
                <p>Control CMS</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('page.index') }}" class="nav-link">
                <i class="fab fa-themeisle"></i>
                <p>Dynamic Page</p>
              </a>
            </li>
          </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
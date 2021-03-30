<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('images/admin_images/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          {{-- <img src="{{url('images/admin_images/admin_photos/' . Auth::guard('admin')->user()->images)}}" class="img-circle elevation-2" alt="User Image"> --}}
        </div>
        <div class="info">
          {{-- <a href="#" class="d-block">{{Auth::guard('admin')->user()->name}}</a> --}}
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @if (Session::get('page') == "dashboard")
               <?php $active = "active"; ?>
          @else
               <?php $active = ""; ?>
          @endif
          <li class="nav-item">
            <a href="{{url('admin/dashboard')}}" class="nav-link {{$active}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          @if (Session::get('page') == "dashboard")
              <?php $active = "active"; ?>
          @else
                <?php $active = ""; ?>
          @endif
          <li class="nav-item">
            <a href="{{url('admin/dashboard')}}" class="nav-link {{$active}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                User
              </p>
            </a>
          </li>
          @if (Session::get('page') == "dashboard")
              <?php $active = "active"; ?>
          @else
                <?php $active = ""; ?>
          @endif
          <li class="nav-item">
            <a href="{{url('admin/dashboard')}}" class="nav-link {{$active}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Product
              </p>
            </a>
          </li>
          @if (Session::get('page') == "dashboard")
              <?php $active = "active"; ?>
          @else
                <?php $active = ""; ?>
          @endif
          <li class="nav-item">
            <a href="{{url('admin/dashboard')}}" class="nav-link {{$active}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Order
              </p>
            </a>
          </li>
          @if (Session::get('page') == "dashboard")
              <?php $active = "active"; ?>
          @else
                <?php $active = ""; ?>
          @endif
          <li class="nav-item">
            <a href="{{url('admin/dashboard')}}" class="nav-link {{$active}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Laporan
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
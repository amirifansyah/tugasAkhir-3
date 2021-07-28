<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('AdminLTE/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><b>LAPERIN</b> </span>
    </a>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('ringans.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Makanan Ringan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('berat.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Makanan Berat</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('promo.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  {{-- <i class="fas fa-sign-out-alt"></i> --}}
                  <p>Promo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('user.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  {{-- <i class="fas fa-sign-out-alt"></i> --}}
                  <p>user</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('order.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Order</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
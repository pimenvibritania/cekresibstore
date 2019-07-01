<aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{route('home')}}" class="brand-link">
          <img src="{{ URL::asset('adminlte/img/bs.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
               style="opacity: .8">
          <span class="brand-text font-weight-light">Billionaire Store</span>
        </a>
    
        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class=" image">
              <img src="{{ URL::asset('adminlte/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block">{{Auth::user()->name}}</a>
            </div>
       
          </div>

          
    
          <!-- Sidebar Menu -->
          <nav class="mt-2">
            @hasrole('admin')
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">              
              <li class="nav-header">ADMINISTRATOR</li>
              <li class="nav-item">
                <a href="{{route('admin.users.index')}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-success"></i>
                  <p class="text">Manage Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('resi.index')}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-warning"></i>
                  <p>Cek Resi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('track')}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-info"></i>
                  <p>Tracking</p>
                </a>
              </li>
            </ul>
            @endhasrole

            @hasrole('reseller')
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-header">RESELLER</li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon far fa-circle text-warning"></i>
                  <p>Cek Resi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon far fa-circle text-info"></i>
                  <p>Tracking</p>
                </a>
              </li>
            </ul>
            @endhasrole
            @hasrole('user')
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-header">USER</li>
              
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon far fa-circle text-info"></i>
                  <p>Tracking</p>
                </a>
              </li>
            </ul>
            @endhasrole
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                  <i class="nav-icon far fa-circle text-danger"></i>
                  <p>{{ __('Logout') }}</p>

                  {{-- <p class="text">Logout</p> --}}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </li>
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>
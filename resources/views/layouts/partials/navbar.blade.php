<nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            @hasrole('admin')
            <a href="#" class="nav-link">Administrator Page</a>
            @endhasrole
            @hasrole('reseller')
            <a href="#" class="nav-link">Reseller Page</a>
            @endhasrole
            @hasrole('user')
            <a href="#" class="nav-link">User Page</a>
            @endhasrole
          </li>
        
        </ul>
    
        
    
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          
          <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
              <i class="fas fa-th-large"></i>
            </a>
          </li>
        </ul>
      </nav>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="overflow: hidden">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('storage/user_image/logo.png')}}" alt="Logo" class="brand-image"
           style="opacity: .8">
      <span class="brand-text font-weight-light">MiniAcct</span>
    </a>
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('storage/user_image/man.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->fname.' '.Auth::user()->lname }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-credit-card"></i>
              <p>
                Accounts
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
  </aside>

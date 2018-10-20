  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('dashboard')}}" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="nav-item dropdown user user-menu">
            <a href="#" class="nav-link" data-toggle="dropdown">
              @if (Auth::user()->gender == 'Male')
                <img src="{{asset('storage/user_image/man.png')}}" class="user-image" alt="User Image">
              @else              
                <img src="{{asset('storage/user_image/girl.png')}}" class="user-image" alt="User Image">
              @endif
              <span class="hidden-xs d-none d-sm-inline-block">{{ Auth::user()->fname.' '.Auth::user()->lname }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-right">
              <!-- User image -->
              <li class="user-header">
              @if (Auth::user()->gender == 'Male')
                <img src="{{asset('storage/user_image/man.png')}}" class="img-circle" alt="User Image">
              @else              
                <img src="{{asset('storage/user_image/girl.png')}}" class="img-circle" alt="User Image">
              @endif

                <p>
                  {{Auth::user()->fname.' '.Auth::user()->lname}}
                  <small>Member since {{Auth::user()->created_at->format('M d, Y')}}</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-4 text-center">
                    <a href="#">Profile</a>
                  </div>
                  <div class="col-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="float-left">
                  <a href="#" class="btn btn-secondary btn-flat">Profile</a>
                </div>
                <div class="float-right">
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>
                  </div>                
                  <a href="{{ route('logout') }}" class="btn btn-secondary btn-flat" onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">Sign out</a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                </div>
              </li>
            </ul>
          </li>
    </ul>
  </nav>
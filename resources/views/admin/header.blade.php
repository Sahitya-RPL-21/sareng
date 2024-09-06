  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link" class="dropdown-toggle" data-toggle="dropdown" class="nav-link" role="button" aria-expanded="true">
          <i class="fas fa-user"></i>  
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <center>
          <div class="dropdown-item">
            <br>
            <h3 class="dropdown-item-title">
              @if (Auth::user())
              {{ Auth::user()->name }}
              @endif
               - Admin
              <p class="text-sm text-muted">PonPes AL-HUSEN</p>
            </h3>
          </div>
        </center>
          <div class="dropdown-item dropdown-footer">
            <!-- <a href="#" class="btn btn-default btn-flat pull-left">Profile</a> -->
            <a href="#" onclick="logout()" class="btn btn-default btn-flat pull-right">Sign out</a>
          </div>
        </ul>
      </li>
    </ul>
  </nav>
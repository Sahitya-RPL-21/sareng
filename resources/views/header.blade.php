<header id="site-header" class="fixed-top">
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark stroke">
      <h1>
        <a class="navbar-brand" href="index.html">
            <img src="{{ asset ('img/TEBUU.png') }}" style="height:65px;" />
        </a>
        <a class="navbar-brand" href="{{ route('home') }}">
            TEBUIRENG<span class="logo"></span>
        </a>
      </h1>

      <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse"
        data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
        <span class="navbar-toggler-icon fa icon-close fa-times"></span>
        </span>
      </button>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mx-lg-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item @@about__active">
            <a class="nav-link" href="#team">About</a>
          </li>
          <!-- <li class="nav-item @@courses__active"> 
            <a class="nav-link" href="courses.html">Courses</a>
          </li>-->
          <li class="nav-item @@contact__active">
            <a class="nav-link" href="#contact">Contact</a>
          </li>
          <li class="nav-item @@pengumuman__active">
        <a class="nav-link" href="{{ route('pengumuman') }}">Pengumuman</a>
        </li>
        </ul>
  
        <!--/search-right-->
        <div class="search-right"> 
          <a href="#search" title="search"><span class="fa fa-search" aria-hidden="true"></span></a>
          <!-- search popup -->
          <div id="search" class="pop-overlay">
            <div class="popup">

              <form action="error.html" method="GET" class="search-box">
                <input type="search" placeholder="Search" name="search" required="required" autofocus="">
                <button type="submit" class="btn"><span class="fa fa-search" aria-hidden="true"></span></button>
              </form>

            </div>
            <a class="close" href="#close">×</a>
          </div>
          <!-- /search popup -->
        
        </div>
        <div class="top-quote mr-lg-2 text-center">
          <a href="{{ route('admin-login') }}" class="btn login mr-2"><span class="fa fa-user"></span> login</a>
        </div>
      </div>
  </div>
</header>
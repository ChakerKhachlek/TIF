<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" href="{{asset('/IF_LOGO.png')}}">
  <title>
   Tif Dashboard
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="{{asset('/black/css/nucleo-icons.css')}}" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="{{asset('/black/css/black-dashboard.css?v=1.0.0')}}" rel="stylesheet" />
    <!-- spin -->
    <link rel="stylesheet" href="{{ asset('/black/plugins/loading.css') }}">

    <style>

    </style>
  @livewireStyles
</head>

<body class="">
  <div class="wrapper">
    <div class="sidebar">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
    -->
      <div class="sidebar-wrapper">
        <div class="logo">
          <a href="javascript:void(0)" class="simple-text logo-mini">
            <img src="{{asset('/IF_LOGO.png')}}" alt="Profile Photo">
          </a>
          <a href="javascript:void(0)" class="simple-text logo-normal">
            Imagination Factory
          </a>
        </div>
        <ul class="nav">

          <li class="{{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
            <a href="{{route('dashboard')}}">
              <i class="tim-icons icon-chart-pie-36"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class="{{ Route::currentRouteName() == 'categories-management' ? 'active' : '' }}">
            <a href="{{route('categories-management')}}">
              <i class="tim-icons icon-bag-16"></i>
              <p>Manage Categories</p>
            </a>
          </li>

          <li class="{{ Route::currentRouteName() == 'styles-management' ? 'active' : '' }}">
            <a href="{{route('styles-management')}}">
              <i class="tim-icons icon-palette"></i>
              <p>Manage Styles</p>
            </a>
          </li>

          <li class="{{ Route::currentRouteName() == 'owners-management' ? 'active' : '' }}">
            <a href="{{route('owners-management')}}">
              <i class="tim-icons icon-badge"></i>
              <p>Manage Owners </p>
            </a>
          </li>

          <li class="{{ Route::currentRouteName() == 'tifs-management' ? 'active' : '' }}">
            <a href="{{route('tifs-management')}}">
              <i class="tim-icons icon-app"></i>
              <p>Manage Tifs </p>
            </a>
          </li>

          <li class="{{ Route::currentRouteName() == 'bids-management' ? 'active' : '' }}">
            <a href="{{route('bids-management')}}">
              <i class="tim-icons icon-money-coins"></i>
              <p>Manage Bids </p>
            </a>
          </li>

          <li class="{{ Route::currentRouteName() == 'newsletter' ? 'active' : '' }}">
            <a href="{{route('newsletter')}}">
              <i class="tim-icons icon-single-copy-04"></i>
              <p>Newsletter</p>
            </a>
          </li>



        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle d-inline">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="{{route('home')}}">Visit Website</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">


              <li class="dropdown nav-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <div class="photo">
                    <img src="{{asset('/IF_LOGO.png')}}" alt="Profile Photo">
                  </div>
                  <b class="caret d-none d-lg-block d-xl-block"></b>
                  <p class="d-lg-none">
                    Log out
                  </p>
                </a>
                <ul class="dropdown-menu dropdown-navbar">
                  <li class="nav-link"><a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('frm-logout').submit();" class="nav-item dropdown-item">Log out</a>
                    <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                  </li>
                </ul>
              </li>
              <li class="separator d-lg-none"></li>
            </ul>
          </div>
        </div>
      </nav>

      <!-- End Navbar -->
      <div class="content">

        @yield('content')
      </div>
      <footer class="footer">
        <div class="container-fluid">

          <div class="copyright">
            ©
            <script>
              document.write(new Date().getFullYear())
            </script> made with <i class="tim-icons icon-heart-2"></i> by
            <a href="#" >TIF Team</a> .
          </div>
        </div>
      </footer>
    </div>
  </div>

  <!--   Core JS Files   -->
  <script src="{{asset('/black/js/core/jquery.min.js')}}"></script>
  <script src="{{asset('/black/js/core/popper.min.js')}}"></script>
  <script src="{{asset('/black/js/core/bootstrap.min.js')}}"></script>
  <script src="{{asset('/black/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
  <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('/black/js/black-dashboard.min.js?v=1.0.0')}}"></script><!-- Black Dashboard DEMO methods, don't include it in your project! -->


   <!--Toastr -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
  @livewireScripts
  @stack('scripts')

</body>

</html>

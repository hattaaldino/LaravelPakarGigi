<!DOCTYPE html>
<html><head>

    <!--Link utama folder aplikasi di htdocs-->
    <!-- <base href="http://localhost:6661/CF2/"> -->
    <!--<base href="http://localhost/pakargigi/CF2/">-->

    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    @yield('title')

	<link rel="icon" href="{{ asset('gambar/admin/dentisticon.jpg') }}">
    <link href="{{ asset('css/font-awesome-4.2.0/font-awesome-4.2.0/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl-carousel/owl.carousel.css') }}" rel="stylesheet"  media="all">
    <link href="{{ asset('css/owl-carousel/owl.theme.css') }}" rel="stylesheet"  media="all">
    <link href="{{ asset('css/magnific-popup.css') }}" type="text/css" rel="stylesheet" media="all">
    <link href="{{ asset('css/font.css') }}" rel="stylesheet" type="text/css"  media="all">
    <link href="{{ asset('css/fontello.css') }}" rel="stylesheet" type="text/css"  media="all">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('css/paging.css') }}" type="text/css" media="screen">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{ asset('aset/bootstrap.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('aset/AdminLTE.css') }}">
	<link rel="stylesheet" href="{{ asset('aset/cinta.css') }}">
    <link rel="stylesheet" href="{{ asset('aset/Ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('aset/skins/_all-skins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('aset/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('aset/icheck/green.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @yield('css')

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <!-- jQuery 2.1.4 -->
    <script src="{{ asset('aset/jQuery-2.js') }}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ asset('aset/bootstrap.js') }}"></script>
    <script src="{{ asset('aset/icheck/icheck.js') }}"></script>
    <script src="{{ asset('aset/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('aset/Flot/jquery.flot.js') }}"></script>
    <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
    <script src="{{ asset('aset/Flot/jquery.flot.resize.js') }}"></script>
    <!-- FLOT PIE PLUGIN - also used to draw donut charts -->
    <script src="{{ asset('aset/Flot/jquery.flot.pie.js') }}"></script>
    <!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
    <script src="{{ asset('aset/Flot/jquery.flot.categories.js') }}"></script> 
    <!-- AdminLTE App -->
    <script src="{{ asset('aset/app.js') }}"></script>
  </head>

  <body id="pakargigi" class="hold-transition skin-purple-light sidebar-mini">
    <div class="wrapper">
      <!-- Main Header -->
      <header class="main-header">
        <!-- Logo -->
        <a href="./" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b><i class="fa fa-contao" aria-hidden="true"></i> CF V2</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b><i class="fa fa-contao" aria-hidden="true"></i>  Certainty Factor V2</b></span>
        </a>
        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>

          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                @if(session()->has('username') && session()->has('password'))
                  <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <img src="{{ asset('gambar/admin/adminicon.jpg') }}" class="user-image" alt="User Image">
                      <span class="hidden-xs">{{ ucfirst(session('username')) }}</span>
                    </a>
                    <ul class="dropdown-menu">
                      <!-- User image -->
                      <li class="user-header">
                        <img src="{{ asset('gambar/admin/adminicon.jpg') }}" class="img-circle" alt="User Image">
                        <p>
                         Login sebagai {{ ucfirst(session('username')) }}
                        </p>
                      </li>
                      
                      <!-- Menu Footer-->
                      <li class="user-footer"> 
                        <div class="pull-right">
                          <a class="btn btn-default btn-flat" href="JavaScript: confirmIt('Anda yakin akan logout dari aplikasi ?','{{ route('logout') }}','','','','u','n','Self','Self')" onMouseOver="self.status = ''; return true" onMouseOut="self.status = ''; return true"><i class="fa fa-sign-out"></i> <span>LogOut</span></a>
                        </div>
                      </li>
                    </ul>
                  </li>
                @else
				  <li class="dropdown messages-menu">
                    <a {{ url()->current() == route('login-form') ? 'class="active"' : ''  }} href="{{ route('login-form') }}"><i class="fa fa-sign-in"></i> <span>Login</span></a>
                  </li>
                @endif
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">Menu</li>
            <!-- Optionally, you can add icons to the links -->
            @include('menu')
        </section>
        <!-- /.sidebar -->
      </aside>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="min-height: 310px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="box">
            <div class="box-body">
                @yield('content')		
            </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!-- Main Footer -->
      <footer class="main-footer">
        <strong><div class="cinta"> ©2022 - Dzakiyyah Khairun Nisa </div></strong>
      </footer>
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg" style="position: fixed; height: auto;"></div>
    </div><!-- ./wrapper -->

  </body>
  <script language="JavaScript">

    function confirmIt 
    (dbMsg,okURL,cancelURL,aOkMsg,aCancelMsg,okTyp,cancelTyp,okWin,cancelWin) {
        if (confirm (dbMsg)) {
            if (okTyp=="u") {
                if(okWin=="Self") location.href=okURL;
                if(okWin=="Parent") parent.location.href=okURL;
            }
            else if (okTyp=="a") {
                alert(aOkMsg);
            }
            }
        else {
            if (cancelTyp=="u") {
                if(cancelWin=="Self") location.href=cancelURL;
                if(cancelWin=="Parent") parent.location.href=cancelURL;
            }
            else if (cancelTyp=="a") {
                alert(aCancelMsg);
            }
        }
    }

  </script>
  @yield('javascript')

</html>
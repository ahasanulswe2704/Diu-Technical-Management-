<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <title>@yield('title')</title>
   <!-- Favicon-->
    <link rel="icon" type="image/png" href="{{ asset('admin_css/images/icons/logo1.png"/>
   <!--   For Data table -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css') }}" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js') }}"></script>   
    <!-- End Datatable -->

        <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('admin_css/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('admin_css/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('admin_css/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin_css/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('admin_css/dist/css/skins/_all-skins.min.css') }}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset('admin_css/bower_components/morris.js') }}/morris.css') }}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('admin_css/bower_components/jvectormap/jquery-jvectormap.css') }}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('admin_css/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('admin_css/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">

<!-- for data table -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js') }}"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css') }}" />
<!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('admin_css/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">Dashboard</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Dashboard</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
                 
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="images/user.png" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="images/user.png" class="img-circle" alt="User Image">

                <p>
                  {{ Auth::user()->name}}
                  <small>{{ Auth::user()->email_id }}</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="material-icons"></i>{{ __('Sign out') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="images/user.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      @php
        $curl=url()->current();
        @endphp
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        @if( Auth::user()->role == "admin")
        <li @if(strstr($curl,"admin") )
                        class="active"
                        @endif class="">
          <a href="{{url('admin')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
    <li @if(strstr($curl,"complainrequest") )
                        class="active"
                        @endif class="">
          <a href="{{url('complainrequest')}}">
            <i class="fa fa-edit"></i> <span>Complain Request</span>
          </a>
        </li>
        @elseif( Auth::user()->role == "department")
        <li @if(strstr($curl,"department") )
                        class="active"
                        @endif class="">
          <a href="{{url('department')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
    <li @if(strstr($curl,"complainlist") )
                        class="active"
                        @endif class="">
          <a href="{{url('complainlist')}}">
            <i class="fa fa-edit"></i> <span>Complain List</span>
          </a>
        </li>
        @elseif( Auth::user()->role == "student")
        <li @if(strstr($curl,"student") )
                        class="active"
                        @endif class="">
          <a href="{{url('student')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
    <li @if(strstr($curl,"createcomplain") )
                        class="active"
                        @endif class="">
          <a href="{{url('createcomplain')}}">
            <i class="fa fa-edit"></i> <span>Complain Box</span>
          </a>
        </li>
       @endif
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  
  </footer>
<main class="py-4">
            @yield('content')
        </main>


  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{ asset('admin_css/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('admin_css/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('admin_css/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Morris.js') }} charts -->
<script src="{{ asset('admin_css/bower_components/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('admin_css/bower_components/morris.js') }}/morris.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('admin_css/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>

<!-- jQuery Knob Chart -->
<script src="{{ asset('admin_css/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('admin_css/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('admin_css/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('admin_css/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('admin_css/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('admin_css/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin_css/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('admin_css/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('admin_css/dist/js/demo.js') }}"></script>


<!-- DataTables -->
<script src="{{ asset('admin_css/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin_css/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- page script -->
<script>
  $(function () {
    $('#user_table').DataTable()
  })
</script>
</body>
</html>

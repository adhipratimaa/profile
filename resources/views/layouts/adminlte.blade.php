<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Bright Field') }}  @yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('frontend/') }}/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('frontend/') }}/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('frontend/') }}/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('frontend/') }}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!--select2-->
  <link rel="stylesheet" href="{{ asset('frontend/') }}/bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('frontend/') }}/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="{{ asset('frontend/') }}/custom/css/style.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('frontend/') }}/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> <!-- jQuery 3 -->
  <!-- jQuery 3 -->
  <script src="{{ asset('frontend/') }}/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="{{ asset('frontend/') }}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- DataTables -->
  <script src="{{ asset('frontend/') }}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="{{ asset('frontend/') }}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="{{ asset('frontend/') }}/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="{{ asset('frontend/') }}/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- ckeditor -->
  <script src="{{ asset('frontend/') }}/bower_components/ckeditor/ckeditor.js"></script>
  <!--select2-->
  <script src="{{ asset('frontend/') }}/bower_components/select2/dist/js/select2.min.js"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('frontend/') }}/dist/js/adminlte.min.js"></script>


  <script src="{{ asset('frontend/') }}/custom/js/script.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{url('/')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>A</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>School</b>App</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          @guest
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
              <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
            @endif
          @else

          <!-- Notifications Menu -->
            <li class="dropdown notifications-menu">
              <!-- Menu toggle button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell"></i>
                <span class="label label-warning">10</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 10 notifications</li>
                <li>
                  <!-- Inner Menu: contains the notifications -->
                  <ul class="menu">
                    <li><!-- start notification -->
                      <a href="#">
                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                      </a>
                    </li>
                    <!-- end notification -->
                  </ul>
                </li>
                <li class="footer"><a href="#">View all</a></li>
              </ul>
            </li>

            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="{{ asset('frontend/') }}/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs">{{ Auth::user()->name }}</span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="{{ asset('frontend/') }}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                  <p>
                    {{ Auth::user()->name }}
                    <small>Member since {{Auth::user()->created_at}}</small>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="{{ url('profile') }}" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                    </form>
                  </div>
                </li>
              </ul>
            </li>

          @endguest
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        @if(is_allowed_in('school',true))

          <li class="school_menu treeview">
            <a href="#">
              <i class="fa fa-list"></i> <span>School</span>
              <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
            </a>
            <ul class="treeview-menu">
              @if(is_allowed_in('school_create',true))
                <li class="school_create" ><a href="{{url('school/create')}}"> <i class="fa fa-circle-o"></i> Create School </a></li>
              @endif
              @if(is_allowed_in('school',true))
                <li class="school_list" ><a href="{{url('school')}}"> <i class="fa fa-circle-o"></i> School List </a></li>
              @endif
            </ul>
          </li>
        @endif
        @if(is_allowed_in('level',true))
          <li class="levels_menu treeview" >
            <a href="#">
              <i class="fa fa-list"></i> <span>Levels</span>
              <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
            </a>
            <ul class="treeview-menu">
              @if(is_allowed_in('level_create',true))
                <li class="levels_create" ><a href="{{url('levels/create')}}"> <i class="fa fa-circle-o"></i> Create Levels </a></li>
              @endif
              @if(is_allowed_in('level',true))
                <li class="levels_list" ><a href="{{url('levels')}}"> <i class="fa fa-circle-o"></i> Levels List </a></li>
              @endif
            </ul>
          </li>
        @endif
        @if(is_allowed_in('module',true))
          <li class="modules_menu treeview" >
            <a href="#">
              <i class="fa fa-list"></i> <span>Modules</span>
              <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
            </a>
            <ul class="treeview-menu">
              @if(is_allowed_in('module_create',true))
                <li class="modules_create" ><a href="{{url('modules/create')}}"> <i class="fa fa-circle-o"></i> Create Modules </a></li>
              @endif
              @if(is_allowed_in('module',true))
                <li class="modules_list" ><a href="{{url('modules')}}"> <i class="fa fa-circle-o"></i> Modules List </a></li>
              @endif
            </ul>
          </li>
        @endif
        @if(is_allowed_in('subject',true))
          <li class="subjects_menu treeview" >
            <a href="#">
              <i class="fa fa-list"></i> <span>Subjects</span>
              <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
            </a>
            <ul class="treeview-menu">
              @if(is_allowed_in('subject_create',true))
                <li class="subjects_create" ><a href="{{url('subjects/create')}}"> <i class="fa fa-circle-o"></i> Create Subjects </a></li>
              @endif
              @if(is_allowed_in('subject',true))
                <li class="subjects_list" ><a href="{{url('subjects')}}"> <i class="fa fa-circle-o"></i> Subjects List </a></li>
              @endif
            </ul>
          </li>
        @endif
        @if(is_allowed_in('grade',true))
          <li class="grades_menu treeview" >
            <a href="#">
              <i class="fa fa-list"></i> <span>Grades</span>
              <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
            </a>
            <ul class="treeview-menu">
              @if(is_allowed_in('grade_create',true))
                <li class="grades_create" ><a href="{{url('grades/create')}}"> <i class="fa fa-circle-o"></i> Create Grades </a></li>
              @endif
              @if(is_allowed_in('grade',true))
                <li class="grades_list" ><a href="{{url('grades')}}"> <i class="fa fa-circle-o"></i> Grades List </a></li>
              @endif
            </ul>
          </li>
        @endif
        @if(is_allowed_in('student',true))
          <li class="students_menu treeview" >
            <a href="#">
              <i class="fa fa-list"></i> <span>Students</span>
              <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
            </a>
            <ul class="treeview-menu">
              @if(is_allowed_in('student_create',true))
                <li class="students_create" ><a href="{{url('students/create')}}"> <i class="fa fa-circle-o"></i> Create Students </a></li>
              @endif
              @if(is_allowed_in('student',true))
                <li class="students_list" ><a href="{{url('students')}}"> <i class="fa fa-circle-o"></i> Students List </a></li>
              @endif
              @if(is_allowed_in('student',true))
                <li class="select_grade" ><a href="{{url('select_grade')}}"> <i class="fa fa-circle-o"></i> Grade Student </a></li>
              @endif
            </ul>
          </li>
        @endif
        @if(is_allowed_in('exam',true))
          <li class="exams_menu treeview" >
            <a href="#">
              <i class="fa fa-list"></i> <span>Exams</span>
              <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
            </a>
            <ul class="treeview-menu">
              @if(is_allowed_in('exam_create',true))
                <li class="exams_create" ><a href="{{url('exams/create')}}"> <i class="fa fa-circle-o"></i> Create Exams </a></li>
              @endif
              @if(is_allowed_in('exam',true))
                <li class="exams_list" ><a href="{{url('exams')}}"> <i class="fa fa-circle-o"></i> Exams List </a></li>
              @endif
              @if(is_allowed_in('admit_card',true))
                <li class="exams_admit" ><a href="{{url('admit_card')}}"> <i class="fa fa-circle-o"></i> Admit Card </a></li>
              @endif

            </ul>
          </li>
        @endif
        @if(is_allowed_in('result',true))
          <li class="results_menu treeview" >
            <a href="#">
              <i class="fa fa-list"></i> <span>Results</span>
              <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
            </a>
            <ul class="treeview-menu">
              @if(is_allowed_in('result_create',true))
                <li class="results_create " ><a href="{{url('results/create')}}"> <i class="fa fa-circle-o"></i> Create Results </a></li>
              @endif
              @if(is_allowed_in('result',true))
                <li class="results_list" ><a href="{{url('results')}}"> <i class="fa fa-circle-o"></i> Results List </a></li>
              @endif
              @if(is_allowed_in('mark_sheet',true))
                <li class="result_mark_sheet" ><a href="{{url('mark_sheet')}}"> <i class="fa fa-circle-o"></i> Mark Sheet </a></li>
              @endif
            </ul>
          </li>
        @endif
        @if(is_allowed_in('mark',true))
          <li class="marks_menu treeview" >
            <a href="#">
              <i class="fa fa-list"></i> <span>Marks</span>
              <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
            </a>
            <ul class="treeview-menu">
              @if(is_allowed_in('mark_create',true))

                <li class="marks_create" ><a href="{{url('marks/create')}}"> <i class="fa fa-circle-o"></i> Insert Marks </a></li>
              @endif
              @if(is_allowed_in('mark',true))
                <li class="marks_list" ><a href="{{url('marks')}}"> <i class="fa fa-circle-o"></i> Marks List </a></li>
              @endif
            </ul>
          </li>
        @endif


      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

        @yield('content')

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

    <section>
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.4.0
            </div>
            <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
            reserved.
        </footer>
    </section>
</div>

<!-- ./wrapper -->
<script>
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
</script>
</body>
</html>
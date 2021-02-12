<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? config('app.name') }} - {{ config('app.name', 'Laravel') }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Bootstrap 4 -->
    
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Sweet Alert 2 -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}">
    <!-- Datatable -->
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" /> 
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <!-- DatePickers -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datepicker.min.css') }}" type="text/css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a href="#" data-toggle="dropdown"
                    class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                    <i class="fas fa-user"></i>
                    {{-- <img alt="image" src="{{ asset('assets/img/user1-128x128.jpg') }}"
                    class="rounded-circle mr-1"> --}}
                        <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->name }}</div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="{{ route('logout') }}" style="cursor: pointer" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
                        class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="{{ asset('assets/img/logo.png') }}"
                    alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">Bustanul Asyrafiah</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                    <img src="{{ auth()->user()->photo ?? defaultUserImage() }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                    <a href="#" class="d-block">{{auth()->user()->username ?? ''}}</a>
                    </div>
                </div> --}}
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                            with font-awesome or any other icon font library -->
                            <li class="nav-header">MAIN MENU</li>
                            <li class="nav-item">
                                <a href="{{ route('admin.dashboard.index') }}" class="{{ setActive('admin/dashboard') }} nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                           

                            {{-- @if(auth()->user()->can('roles.index') || auth()->user()->can('permission.index') || auth()->user()->can('users.index')) --}}
                            {{-- <li class="nav-header">MANAGEMENT</li> --}}
                            {{-- @endif --}}

                            <li class="nav-item has-treeview">
                                @if(auth()->user()->can('roles.index') || auth()->user()->can('permission.index') || auth()->user()->can('users.index'))
                                <a href="#" class="nav-link {{ setActive('admin/post'). setActive('admin/tags'). setActive('admin/category'). setActive('admin/event'). setActive('admin/slider'). setActive('admin/photo'). setActive('admin/video') }}">
                                    <i class="nav-icon fas fa-laptop"></i>
                                    <p>
                                        System Management
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                @endif
                                
                                <ul class="nav nav-treeview">
                                    
                                    @can('posts.index')
                                    <li class="{{ setActive('admin/post') }} nav-item">
                                        <a class="nav-link {{ setActive('admin/post') }}" href="{{ route('admin.post.index') }}">
                                            {{-- <i class="nav-icon fas fa-book-open"></i> --}}
                                            
                                            <p class="ml-4">News</p>
                                        </a>
                                    </li>
                                    @endcan
                                    @can('tags.index')
                                    <li class="nav-item">
                                        <a class="nav-link {{ setActive('admin/tag') }}" href="{{ route('admin.tag.index') }}">
                                            {{-- <i class="nav-icon fas fa-tags"></i> --}}
                                            <p class="ml-4">Tags</p>
                                        </a>
                                    </li>
                                    @endcan
                                    @can('categories.index')
                                    <li class="nav-item">
                                        <a class="{{ setActive('admin/category') }} nav-link" href="{{ route('admin.category.index') }}">
                                            {{-- <i class="nav-icon fas fa-folder"></i> --}}
                                            <p class="ml-4">Category</p>
                                        </a>
                                    </li>
                                    @endcan
                                    @can('events.index')
                                    <li class="nav-item">
                                        <a class="nav-link {{ setActive('admin/event') }}" href="{{ route('admin.event.index') }}">
                                            {{-- <i class="nav-icon fas fa-bell"></i> --}}
                                            <p class="ml-4">Event</p>
                                        </a>
                                    </li>
                                    @endcan
                                    @can('sliders.index')
                                    <li class="nav-item">
                                        <a class="nav-link {{ setActive('admin/slider') }}" href="{{ route('admin.slider.index') }}">
                                            {{-- <i class="nav-icon fas fa-laptop"></i> --}}
                                            <p class="ml-4">Sliders</p>
                                        </a>
                                    </li>
                                    @endcan
        
                                    @can('photos.index')
                                    <li class="nav-item">
                                        <a class="nav-link {{ setActive('admin/photo') }}" href="{{ route('admin.photo.index') }}">
                                            {{-- <i class="nav-icon fas fa-image"></i> --}}
                                            <p class="ml-4">Photo</p>
                                        </a>
                                    </li>
                                    @endcan
                                    @can('videos.index')
                                    <li class="nav-item">
                                        <a class="nav-link {{ setActive('admin/video') }}" href="{{ route('admin.video.index') }}">
                                            {{-- <i class="nav-icon fas fa-video"></i> --}}
                                            <p class="ml-4">Video</p>
                                        </a>
                                    </li>
                                    @endcan
                                    
                                
                                </ul>
                            </li>

                            <li class="nav-item has-treeview">
                                @if(auth()->user()->can('roles.index') || auth()->user()->can('permission.index') || auth()->user()->can('users.index'))
                                <a href="#" class="nav-link {{ setActive('admin/role'). setActive('admin/permission'). setActive('admin/user') }}">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        User Management
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                @endif
                                
                                <ul class="nav nav-treeview">
                                    @can('roles.index')
                                        <li class="nav-item">
                                            <a href="{{ route('admin.role.index') }}" class="nav-link {{ setActive('admin/role') }}">
                                                {{-- <i class="fas fa-unlock nav-icon"></i> --}}
                                                <p class="ml-4">Roles</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('permissions.index')
                                        <li class="nav-item">
                                            <a href="{{ route('admin.permission.index') }}" class="nav-link {{ setActive('admin/permission') }}">
                                                {{-- <i class="fas fa-key nav-icon"></i> --}}
                                                <p class="ml-4">Permissions</p>
                                            </a>
                                        </li>
                                    @endcan

                                    @can('users.index')
                                        <li class="nav-item">
                                            <a href="{{ route('admin.user.index') }}" class="nav-link {{ setActive('admin/user') }}">
                                                {{-- <i class="fas fa-users nav-icon"></i> --}}
                                                <p class="ml-4">Users</p>
                                            </a>
                                        </li>
                                    @endcan

                                   
                                
                                </ul>
                            </li>

                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link {{ setActive('admin/students') }}">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Students
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                               
                                
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.students.create') }}" class="nav-link ">
                                            {{-- <i class="fas fa-unlock nav-icon"></i> --}}
                                            <p class="ml-4">Admit Student</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" class="nav-link">
                                            {{-- <i class="fas fa-key nav-icon"></i> --}}
                                            <p class="ml-4">Student Information</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" class="nav-link">
                                            {{-- <i class="fas fa-users nav-icon"></i> --}}
                                            <p class="ml-4">Student Promotion</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" class="nav-link">
                                            {{-- <i class="fas fa-users nav-icon"></i> --}}
                                            <p class="ml-4">Student Graduated</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>


                            <li class="nav-item">
                                <a href="{{ route('admin.classes.index') }}" class="nav-link {{ setActive('admin/classes') }}">
                                    <i class="fas fa-user nav-icon"></i>
                                    <p>Classes</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('admin.my_account.index') }}" class="nav-link {{ setActive('admin/my_account') }}">
                                    <i class="fas fa-user nav-icon"></i>
                                    <p>My Account</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('admin.setting.index') }}" class="nav-link {{ setActive('admin/setting') }}">
                                    <i class="fas fa-cog nav-icon"></i>
                                    <p>Setting</p>
                                </a>
                            </li>
                    </ul>
                </nav>
                
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
            
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                @yield('header')
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        {{-- <div class="card-header">
                            <h3 class="card-title"></h3>
                        </div>  --}}
                        <div class="card-body">
                            @yield('content')
                        </div>
                        <!-- /.card-body -->
                        {{-- <div class="card-footer">
                            Footer
                        </div> --}}
                        <!-- /.card-footer-->
                    </div>
                    <!-- /.card --> 
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 1.0
            </div>
            <strong>Copyright &copy; 2020-2021 <a href="#">Admin Sekolah</a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Popper -->
    {{-- <script src="{{ asset('assets/plugins/popper/popper.min.js') }}"></script> --}}
    <!-- Smart Wizard -->
    <script src="{{ asset('assets/plugins/smart-wizard/jquery.smartWizard.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('assets/js/demo.js') }}"></script>
    <!-- Sweet Alert 2 -->
    <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- Datatable -->
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.colVis.min.js"></script>
    <!-- Date Pickers -->
    <script src="{{ asset('assets/plugins/ui/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pickers/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pickers/pickadate/legacy.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('.date-pick').datepicker();
        });

        
        $(function () {
            $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            });
        });


        $(document).ready(function() {
            $('#dataTable').DataTable({
                ordering: false,
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'copyHtml5',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    'colvis'
                ]
            });
        });
       
    </script>
    @include('sweetalert::alert')
</body>
</html>

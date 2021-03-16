<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Blank Page</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../backend/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Bootstrap 5 -->
    <link href="{{ asset('backend/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../backend/assets/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ url('/') }}" class="nav-link">Перейти в магазин</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Зв'язок</a>
            </li>
        </ul><!-- / Left navbar links -->

        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Пошук" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form><!-- / SEARCH FORM -->
        <ul>
        <li class="dropdown-footer">
            <a href="{{ route('user.logout') }}"> <i class="mdi mdi-logout"></i> Вийти </a>
        </li>
        </ul>
  
      {{--  <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <button class="user-panel mt-3 pb-3 mb-3 d-flex btn dropdown-toggle " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="">
                            <img src={{ Auth::user()->profile_photo_url }} class="img-circle" alt="User Image">
                        </div>
                    <div class="">
                        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                    </div>
                </button>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Налаштування</a></li>
                    <li><a class="dropdown-item" href="#">Вийти</a></li>
                </ul>
            </li>
        </ul>--}}

    </nav>
    <!-- /.navbar -->

<!--
====================================
——— LEFT SIDEBAR WITH FOOTER
=====================================
-->
@include('admin.body.sidebar')
{{--============================================================--}}

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
      {{--  <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Бланк сторінки</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Головна</a></li>
                            <li class="breadcrumb-item active">Бланк сторінки</li>
                        </ol>
                    </div>
                    <div class="card-body">
                        Start creating your amazing application!
                    </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Заголовок</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fas fa-times"></i></button>
                    </div>
                </div>

                <!--
                ====================================
                ——— CONTENT PART
                =====================================
                -->
                <div class="content-wrapper">

                        @yield('admin')

                </div><!-- /content-wrapper-->

                <div class="card-footer">
                    Footer
                </div><!-- /.card-footer-->

            </div><!-- /.card -->

        </section><!-- /.content -->--}}


        {{--===========================--}}
        <div class="container mt-3">
            <div class="row">
                <div class="col-12">
                    {{--валедаційні помилки--}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="list-unstyled">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {{--валедаційні успіхи--}}
                    @if (session()->has('success'))
                        <div class="alert alert-casses">
                            {{ session('success') }}
                        </div>
                    @endif
                    {{-------https://laravel.com/docs/8.x/validation#quick-displaying-the-validation-errors------------------}}
                </div>
            </div>
        </div>

        {{------------------------------}}
        @yield('admin')
        {{------------------------------}}
        {{--===========================--}}
    </div> <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 1.0.2
        </div>
        <strong>Copyright &copy; 2017-2021 <a href="http://leogarden.com.ua/admin">Old Kids Group</a>.</strong> All rights
        reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- \assets\backend -->
<!-- jQuery -->
<script src="{{ asset('backend/assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 5 -->
<script src="{{ asset('backend/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('backend/assets/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('backend/assets/js/demo.js') }}"></script>



</body>
</html>

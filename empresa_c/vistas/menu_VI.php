<?php
class menu_VI
{
    function __construct(){}

    function verMenu()
    {
        require_once "modelos/personas_MO.php";
        $conexion=new conexion('sel');
        $personas_MO=new personas_MO($conexion);
        $arreglo=$personas_MO->seleccionar($_SESSION['pers_id']);

        $objeto_personas=$arreglo[0];
        $pers_nombres=$objeto_personas->pers_nombres;
        ?>

        <!DOCTYPE html>
        <!--
        This is a starter template page. Use this page to start your new project from
        scratch. This page gets rid of all links and provides the needed markup only.
        -->
        <html lang="es">
        <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Empresa C</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
        <!-- Toastr -->
        <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
       
       
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/adminlte.min.css">
        </head>
        <body class="hold-transition sidebar-mini">
        <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#"  onclick="verMenu('menu_VI/verMenu')" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" onclick="salir();" class="nav-link">Salir</a>
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

            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                    <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                    <div class="media-body">
                        <h3 class="dropdown-item-title">
                        Brad Diesel
                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                        </h3>
                        <p class="text-sm">Call me whenever you can...</p>
                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                    </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                    <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                    <div class="media-body">
                        <h3 class="dropdown-item-title">
                        John Pierce
                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                        </h3>
                        <p class="text-sm">I got your message bro</p>
                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                    </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                    <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                    <div class="media-body">
                        <h3 class="dropdown-item-title">
                        Nora Silvester
                        <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                        </h3>
                        <p class="text-sm">The subject goes here</p>
                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                    </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>
            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
                </a>
            </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
            <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Empresa C</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                <img src="dist/img/pers.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                <a href="#" class="d-block"><?php echo $pers_nombres;?></a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <!--li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Starter Pages
                        
                        <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link active">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Active Page</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Inactive Page</p>
                        </a>
                    </li>
                    </ul>
                </li--->

                <li class="nav-item">
                    <a href="#" onclick="verMenu('personas_VI/agregar')" class="nav-link">
                    <i class="fas fa-user-friends"></i>
                    <p>Personas</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" onclick="verMenu('sexos_VI/agregar')" class="nav-link">
                    <i class="fas fa-venus-mars" style="font-size:20px;"></i>
                    <p>Sexos</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" onclick="verMenu('religiones_VI/agregar')" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>Religiones</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" onclick="verMenu('paises_VI/agregar')" class="nav-link">
                    <i class="fas fa-globe-americas"></i>
                    <p>Paises</p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="#" onclick="verMenu('deportes_VI/agregar')" class="nav-link">
                    <i class="fas fa-football-ball"></i>
                    <p>Deportes</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" onclick="verMenu('personas_deportes_VI/agregar')" class="nav-link">
                    <i class="fas fa-biking"></i>
                    <p>Personas deportes</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" onclick="verMenu('dar_accesos_VI/agregar')" class="nav-link">
                    <i class="fas fa-keyboard"></i>
                    <p>Accesos</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" onclick="verMenu('accesos_fechas_VI/agregar')" class="nav-link">
                    <i class="fas fa-calendar-alt"></i>
                    <p>Accesos fechas</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" onclick="verMenu('accesos_fechas_horas_VI/agregar')" class="nav-link">
                    <i class="fas fa-clock"></i>
                    <p>Accesos fechas horas</p>
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
            <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Empresa C</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Empresa C</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
            <div class="container-fluid">

                <div id="contenido">
                 <div >
                            <div class="jumbotron">
                        <h1 class="display-4">Bienvenido a la empresa C!</h1>
                        </div>


                        <div class="row">
                    <div class="col-md-3">
                    <div class="card mb-3 shadow-sm">
                        <!--svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg-->
                        <img src="dist/img/equipo.svg" width="100%" height="188">
                        <div class="card-body">
                        <p class="card-text">Conectado equipos</p>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-3">
                    <div class="card mb-3 shadow-sm">
                        <!--svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg-->
                        <img src="dist/img/compartido.svg" width="100%" height="188">
                        <div class="card-body">
                        <p class="card-text">Objetivos compartidos</p>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-3">
                    <div class="card mb-3 shadow-sm">
                        <!--svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg-->
                        <img src="dist/img/equipo.svg" width="100%" height="188">
                        <div class="card-body">
                        <p class="card-text">Trabajo colaborativo</p>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-3">
                    <div class="card mb-3 shadow-sm">
                        <!--svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg-->
                        <img src="dist/img/desarrollo.svg" width="100%" height="188">
                        <div class="card-body">
                        <p class="card-text">Desarrollo en la web</p>
                        </div>
                    </div>
                    </div>
               </div>
               
                </div>
               </div>
                </div>

            </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
            Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>
        <!-- Button trigger modal -->

        <!-- Modal -->
        <div class="modal fade " id="ventana_modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
               
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="ventana_modal_contenido">
                
            </div>
           
            </div>
        </div>
        </div>





        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->

        <!-- jQuery -->
        <script src="plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- toastr -->
        <script src="dist/js/adminlte.min.js"></script>
        <script src="plugins/toastr/toastr.min.js"></script>
        <script>
        function verMenu(ruta)
        {
            $.post(ruta,function(respuesta)
            {
                $('#contenido').html(respuesta);
            });
        }

        function salir()
        {
            $.post('accesos_CO/salir',function()
            {
                location.href="index.php";
            });
        }
        </script>
        </body>
        </html>
        <?php
    }
}
?>
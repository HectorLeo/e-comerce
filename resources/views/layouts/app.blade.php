<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> Crystal Media | Admin</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="\assets\lte\plugins\fontawesome-free\css\all.min.css">
        <link rel="stylesheet" href="\assets\lte\plugins\icheck-bootstrap\icheck-bootstrap.min.css">
  
        <link rel="stylesheet" href="\assets\lte\dist\css\adminlte.min.css">
        <link rel="stylesheet" href="\assets\lte\plugins\sweetalert2-theme-bootstrap-4\bootstrap-4.min.css">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Boton-->
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet" />
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        
        <!-- Tempusdominus Bbootstrap 4 -->
        <link rel="stylesheet" href="\assets\lte\plugins\tempusdominus-bootstrap-4\css\tempusdominus-bootstrap-4.min.css">
        <!-- JQVMap -->
        <link rel="stylesheet" href="\assets\lte\plugins\jqvmap\jqvmap.min.css">
        
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="\assets\lte\plugins\overlayScrollbars\css\OverlayScrollbars.min.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="\assets\lte\plugins\daterangepicker\daterangepicker.css">
        <!-- summernote -->
        <link rel="stylesheet" href="\assets\lte\plugins\summernote\summernote-bs4.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        
        @yield('linkhead')
    </head>
    {{  Auth::guest() }}
        <body class="hold-transition sidebar-mini layout-fixed">
            <div class="wrapper">

                    <!-- Navbar -->
                    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                      <!-- Left navbar links -->
                      <ul class="navbar-nav">
                        <li class="nav-item">
                          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                          <a href="{{ route('index') }}" class="nav-link">Inicio</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                          <a href="#" class="nav-link">Contacto</a>
                        </li>
                      </ul>
                  
                      <!-- SEARCH FORM -->
                      <form class="form-inline ml-3">
                        <div class="input-group input-group-sm">
                          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                          <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                              <i class="fas fa-search"></i>
                            </button>
                          </div>
                        </div>
                      </form>
                  
                      <!-- Right navbar links -->
                      <ul class="navbar-nav ml-auto">
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
                                <!--img  alt="User Avatar" class="img-size-50 mr-3 img-circle"-->
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
                                <!--img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3"-->
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
                                <!--img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3"-->
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
                            <span class="dropdown-item dropdown-header">15 Notifications</span>
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
                          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
                            <i class="fas fa-th-large"></i>
                          </a>
                        </li>
                      </ul>
                    </nav>
                    <!-- /.navbar -->
                  
                    <!-- Main Sidebar Container -->
                    <aside class="main-sidebar sidebar-dark-primary elevation-4">
                      <!-- Brand Logo -->
                      <a href="#" class="brand-link">
                        <img width="140" height="60"  style="opacity: .8" src="\assets\usu-tienda\css\Logo_Crystal_Media.png" alt="Logo de CrystalMedia">
                        
                      </a>
                  
                      <!-- Sidebar -->
                      <div class="sidebar">
                        <!-- Sidebar user panel (optional) -->
                        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                          <div class="info">
                          <a href="#" class="d-block">Usuario: {{session()->get('email') ?? 'Invitado'}}</a>
                          </div>
                        </div>
                        <div class=pull-left>
                          <a href="{{route('logoutA')}}" class="btn btn-xs btn-danger btn-block">Salir</a>
                        </div>
                        <!-- Sidebar Menu -->
                        <nav class="mt-2">
                          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                                 with font-awesome or any other icon font library -->
                            <li class="@yield('ActiveCatalogo', 'nav-item' )">
                              <a href="#" class="@yield('ActiveCata', 'nav-link')">
                                  <i class="fas fa-edit"></i>
                                <p>
                                  Catalogo
                                  <i class="right fas fa-angle-left"></i>
                                  
                                </p>
                              </a>
                              <ul class="nav nav-treeview">
                                <li class="nav-item">
                                  <a href="{{ route('producto') }}" class="@yield('ActiveProducto', 'nav-link')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Productos</p>
                                  </a>
                                </li>
                                <li class="nav-item">
                                  <a href="{{ route('categoria') }}" class="@yield('ActiveCategoria', 'nav-link')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Categorías</p>
                                  </a>
                                </li>
                                <li class="nav-item">
                                  <a href="{{ route('marcaC') }}" class="@yield('ActiveMarcas', 'nav-link')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Marcas</p>
                                  </a>
                                </li>
                                <li class="nav-item">
                                  <a href="{{ route('ofertaDescuento') }}" class="@yield('ActiveOferDes', 'nav-link')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ofertas y Descuentos</p>
                                  </a>
                                </li>
                              </ul>
                            </li>
                            <!------------------------------------------------------------------------------------------>
                            <!-- Add icons to the links using the .nav-icon class
                                 with font-awesome or any other icon font library -->
                                 <li class="@yield('ActiveCatalogoclient', 'nav-item' )">
                                    <a href="#" class="@yield('ActiveCataclient', 'nav-link')">
                                      <i class="fas fa-portrait"></i>
                                      <p>
                                          &nbsp;  Clientes
                                        <i class="right fas fa-angle-left"></i>
                                        
                                      </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                      <li class="nav-item">
                                        <a href="{{ route('ComentarioCliente') }}" class="@yield('ActiveComentario', 'nav-link')">
                                          <i class="far fa-circle nav-icon"></i>
                                          <p>Comentarios</p>
                                        </a>
                                      </li>
                                      
                                    </ul>
                                  </li>
<!------------------------------------------------------------------------------------------>
                                 
<!------------------------------------------------------------------------------------------>

                            <li class="nav-header">PERSONALIZAR</li>
                    
                            <li class="@yield('Activetransporte', 'nav-item')"> 
                              <a href="#" class="@yield('ActiveTrans', 'nav-link')">
                                <i class="fas fa-shuttle-van"></i>
                                <p>
                                  Transporte
                                  <i class="fas fa-angle-left right"></i>
                                </p>
                              </a>
                              <ul class="nav nav-treeview">
                                <li class="nav-item">
                                  <a href="{{ route('transporteC') }}" class="@yield('Activetransportistas', 'nav-link')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Transportistas</p>
                                  </a>
                                </li>
                                <li class="nav-item">
                                  <a href="{{ route('producto') }}" class="@yield('Activepreferencias', 'nav-link')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Preferencias</p>
                                  </a>
                                </li>
                              </ul>
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
                              @yield('titulohome')
                              
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                              <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('index') }}">Inicio</a></li>
                                @yield('titulonavegacion')
                              </ol>
                            </div><!-- /.col -->
                          </div><!-- /.row -->
                        </div><!-- /.container-fluid -->
                      </div>
                      <!-- /.content-header -->
                  
                      <!-- Main content -->
                      <section class="content">
                        <div class="container-fluid">
                          <!-- Small boxes (Stat box) -->
                          <hr>
                          @yield('content')
                          <hr>
                          <!-- /.row (main row) -->
                        </div><!-- /.container-fluid -->
                      </section>
                      <!-- /.content -->
                    </div>
                    <!-- /.content-wrapper -->
                    <footer class="main-footer">
                      <strong>Copyright &copy; 2019 All rights reserved | Designed by <a href="https://crystalmedia.mx">Crystal Media</a>.</strong>
                      
                      <div class="float-right d-none d-sm-inline-block">
                        <b>Version</b> 1.0.3
                      </div>
                    </footer>
                  
                    <!-- Control Sidebar -->
                    <aside class="control-sidebar control-sidebar-dark">
                      <!-- Control sidebar content goes here -->
                    </aside>
                    <!-- /.control-sidebar -->
                  </div>

        
       
    </body>
     <!-- jQuery -->
     <script src="\assets\lte\plugins\jquery\jquery.min.js"></script>
     <!-- jQuery UI 1.11.4 -->
     <script src="\assets\lte\plugins\jquery-ui\jquery-ui.min.js"></script>
     <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
     <script>
     $.widget.bridge('uibutton', $.ui.button)
     </script>
     <!-- Bootstrap 4 -->
     <script src="\assets\lte\plugins\bootstrap\js\bootstrap.bundle.min.js"></script>
     <!-- ChartJS -->
     <script src="\assets\lte\plugins\chart.js\Chart.min.js"></script>
     <!-- Sparkline -->
     <script src="\assets\lte\plugins\sparklines\sparkline.js"></script>
     <!-- JQVMap -->
     <script src="\assets\lte\plugins\jqvmap\jquery.vmap.min.js"></script>
     <script src="\assets\lte\plugins\jqvmap\maps\jquery.vmap.world.js"></script>
     <!-- jQuery Knob Chart -->
     <script src="\assets\lte\plugins\jquery-knob\jquery.knob.min.js"></script>
     <!-- daterangepicker -->
     <script src="\assets\lte\plugins\moment\moment.min.js"></script>
     <script src="\assets\lte\plugins\daterangepicker\daterangepicker.js"></script>
     <!-- Tempusdominus Bootstrap 4 -->
     <script src="\assets\lte\plugins\tempusdominus-bootstrap-4\js\tempusdominus-bootstrap-4.min.js"></script>
     <!-- Summernote -->
     <script src="\assets\lte\plugins\summernote\summernote-bs4.min.js"></script>
     <!-- overlayScrollbars -->
     <script src="\assets\lte\plugins\overlayScrollbars\js\jquery.overlayScrollbars.min.js"></script>
     <!-- AdminLTE App -->
     <script src="\assets\lte\dist\js\adminlte.js"></script>
     <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
     <script src="\assets\lte\dist\js\pages\dashboard.js"></script>
     <!-- AdminLTE for demo purposes -->
     <script src="\assets\lte\dist\js\demo.js"></script>
     <script src="\assets\lte\plugins\sweetalert2\sweetalert2.min.js"></script>
     <script src="\assets\lte\plugins\toastr\toastr.min.js"></script>
     @yield('scripts')
</html>
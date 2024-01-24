<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Panel de Administración</title>
        <link href="<?php echo base_url;?>Assets/css/styles.css" rel="stylesheet" />
        <link href="<?php echo base_url;?>Assets/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="<?php echo base_url;?>Assets/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">Sistema de Ventas</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Perfil</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo base_url . "usuarios/salir"; ?>">Cerrar Sesión</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseConfiguracion" aria-expanded="false" aria-controls="collapseConfiguracion">
                                <div class="sb-nav-link-icon"><i class="fas fa-tools text-primary"></i></div>
                                Configuración
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseConfiguracion" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo base_url; ?>usuarios"><i class="fas fa-user mr-2"></i>Usuarios</a>
                                    <a class="nav-link" href="<?php echo base_url; ?>home"><i class="fas fa-users mr-2"></i>Home</a>
                                    <a class="nav-link" href="<?php echo base_url; ?>cajas"><i class="fas fa-users mr-2"></i>Cajas</a>
                                    

                                </nav>
                            </div>


                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseIglesias" aria-expanded="false" aria-controls="collapseIglesias">
                                <div class="sb-nav-link-icon"><i class="fas fa-tools text-primary"></i></div>
                                App Iglesias
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseIglesias" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo base_url; ?>usuarios"><i class="fas fa-user mr-2"></i>Otra Cosa</a>
                                    <a class="nav-link" href="<?php echo base_url; ?>personas"><i class="fas fa-users mr-2"></i>Personas</a>
                                    <a class="nav-link" href="<?php echo base_url; ?>servicios"><i class="fas fa-users mr-2"></i>Servicios</a>
                                    <a class="nav-link" href="<?php echo base_url; ?>iglesias"><i class="fas fa-users mr-2"></i>Iglesias</a>
                                    <a class="nav-link" href="<?php echo base_url; ?>sociedades"><i class="fas fa-users mr-2"></i>Sociedades</a>
                                    <a class="nav-link" href="<?php echo base_url; ?>asistencias"><i class="fas fa-users mr-2"></i>Asistencia</a>
                                    <a class="nav-link" href="<?php echo base_url; ?>circuitos"><i class="fas fa-users mr-2"></i>Circuitos</a>
                                    <a class="nav-link" href="<?php echo base_url; ?>finanzas"><i class="fas fa-users mr-2"></i>Finanzas</a>
                                    
                                </nav>
                            </div>

                            <a class="nav-link" href="<?php echo base_url; ?>clientes" >
                                <div class="sb-nav-link-icon"><i class="fas fa-users text-primary"></i></div>
                                Clientes
                            </a>
                            <a class="nav-link" href="<?php echo base_url; ?>medidas" >
                                <div class="sb-nav-link-icon"><i class="fas fa-balance-scale-left mr-2 text-primary"></i></div>
                                Medidas
                            </a>
                            <a class="nav-link" href="<?php echo base_url; ?>categorias" >
                                <div class="sb-nav-link-icon"><i class="fas fa-users text-primary"></i></div>
                                Categorías
                            </a>
                            <a class="nav-link" href="<?php echo base_url; ?>productos" >
                                <div class="sb-nav-link-icon"><i class="fas fa-product-hunt text-primary"></i></div>
                                Productos
                            </a>
                                    
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $_SESSION['nombre'];?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid mt-2">
                        
<!doctype html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,400;1,500&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo base_url('/img/ingecosmo.png') ?>" />
    <title>Ingecosmo Ltda.</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="<?php echo base_url('bootstrap5/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/style.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url("css/principal/home.css") ?>">
    <link rel="stylesheet" href="<?= base_url('dataTable/dataTables.bootstrap5.min.css') ?>" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <!-- SCRIPTS -->
    <script src="<?= base_url('js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('dataTable/jquery.dataTables.js') ?>"></script>
    <script src="<?= base_url('dataTable/dataTables.bootstrap5.min.js') ?>"></script>
    <script src="<?= base_url('js/main.js') ?>"></script>



</head>

<body class=" d-flex align-items-stretch">


    <nav id="sidebar2" class="navbar navbar-expand-lg " style="background-color:#000059; z-index: 999;">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <img class="menu" style=" width:30px; height:30px;" src="<?php echo base_url('/img/menu.png') ?>" />
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul id="list" class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li><a class="nav-item dropdown" href="#" style="color: white; margin-left: 10px;"><img style=" width:40px; height:40px; display:inline-block " src="<?php echo base_url('/img/usuario.png') ?>" /> <?= session('rol') ?></a></li>
                    <hr class="nav-item dropdown" style="border-color: white">
                    <?php if (session('idRol') == 1 || session('idRol') == 2) { ?>
                        <li><a class="nav-item dropdown" href="<?php echo base_url('trabajadores') ?>" style="color: white; margin-left: 10px;"><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/trabajadores.png') ?>" /> Trabajadores</a></li>
                        <hr class="nav-item dropdown" style="border-color: white">
                        <li><a class="nav-item dropdown" href="#" style="color: white;  margin-left: 10px;"><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/clientes.png') ?>" /> Clientes</a></li>
                        <hr class="nav-item dropdown" style="border-color: white">
                        <li><a class="nav-item dropdown" href="#" style="color: white;  margin-left: 10px;"><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/repuestos.png') ?>" /> Respuestos</a></li>
                        <hr class="nav-item dropdown" style="border-color: white">
                        <li><a class="nav-item dropdown" href="#" style="color: white;  margin-left: 10px;"><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/materiales.png') ?>" /> Insumos</a></li>
                        <hr class="nav-item dropdown" style="border-color: white">
                        <li><a class="nav-item dropdown" href="#" style="color: white;  margin-left: 10px;"><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/vehiculo.png') ?>" /> Vehiculos</a></li>
                        <hr class="nav-item dropdown" style="border-color: white">
                        <li><a class="nav-item dropdown" href="<?= base_url('proveedores') ?>" style="color: white; margin-left: 10px;  "><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/proveedores.png') ?>" /> Proveedores</a></li>
                        <hr class="nav-item dropdown" style="border-color: white">
                        <li><a class="nav-item dropdown" href="<?php echo base_url('usuarios') ?>" style="color: white; margin-left: 10px; "><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/usuarioS.png') ?>" /> Usuarios</a></li>
                        <hr class="nav-item dropdown" style="border-color: white">
                    <?php } else if (session('idRol') == 3) { ?>
                        <li><a class="nav-item dropdown" href="#" style="color: white;  margin-left: 10px;"><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/repuestos.png') ?>" /> Respuestos</a></li>
                        <hr class="nav-item dropdown" style="border-color: white">
                        <li><a class="nav-item dropdown" href="#" style="color: white;  margin-left: 10px;"><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/materiales.png') ?>" /> Insumos</a></li>
                        <hr class="nav-item dropdown" style="border-color: white">
                        <li><a class="nav-item dropdown" href="#" style="color: white;  margin-left: 10px;"><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/estanteria.png') ?>" /> Estanteria</a></li>
                        <hr class="nav-item dropdown" style="border-color: white">
                    <?php } ?>
                    <li><a class="nav-item dropdown" href="#" style="color: white;  margin-left: 10px;"><img style=" width:35px; height:40px; " src="<?php echo base_url('/img/historial.png') ?>" /> Hisotrial</a></li>

                    <li>
                        <hr class="nav-item dropdown" style="border: solid 1px white">
                    </li>
                    <li><a href="<?php echo base_url('salir') ?>" class="nav-item dropdown;" href="#" style="color: white;  margin-left:10px;"><img style=" width:35px; height:35px; " src="<?php echo base_url('/img/salir.png') ?>" /> Cerrar Sesion</a></li>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div>
        <nav id="sidebar" class="active" style="position: sticky;top:0px;">
            <!-- <h1><a class="logo"></a></h1> -->
            <div class="d-flex justify-content-between flex-column" style="height: 100vh;">
                <ul id="allElement" class="list-unstyled components mb-5">
                    
                    <li class="active">
                        <a href="#" id="aa"><span><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/usuario.png') ?>" /></span>
                            <p id="pa"><?= session('rol') ?></p>
                        </a>
                    </li>
                    
                    <?php if (session('idRol') == 1 || session('idRol') == 2) { ?>
                        <li>
                            <a href="<?php echo base_url('trabajadores') ?>" id="aa"><span><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/trabajadores.png') ?>" /></span>
                                <p id="pa">Trabajadores</p>
                            </a>
                        </li>
                        <li>
                            <a href="#" id="aa"><span><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/clientes.png') ?>" /></span>
                                <p id="pa">Clientes</p>
                            </a>
                        </li>
                        <li>
                            <a href="#" id="aa"><span><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/repuestos.png') ?>" /></span>
                                <p id="pa">Repuestos</p>
                            </a>
                        </li>
                        <li>
                            <a href="#" id="aa"><span><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/materiales.png') ?>" /></span>
                                <p id="pa">Insumos</p>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('vehiculos') ?>" id="aa"><span><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/vehiculo.png') ?>" /></span>
                                <p id="pa">Vehiculos</p>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('proveedores') ?>" id="aa"><span><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/proveedores.png') ?>" /></span>
                                <p id="pa">Proveedores</p>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('usuarios') ?>" id="aa"><span><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/usuarioS.png') ?>" /></span>
                                <p id="pa">Usuarios</p>
                            </a>
                        </li>
                    <?php } else if (session('idRol') == 3) { ?>
                        <li>
                            <a href="#" id="aa"><span><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/repuestos.png') ?>" /></span>
                                <p id="pa">Repuestos</p>
                            </a>
                        </li>
                        <li>
                            <a href="#" id="aa"><span><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/materiales.png') ?>" /></span>
                                <p id="pa">Insumos</p>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('estanteria/mostrarEstante') ?>" id="aa"><span><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/estanteria.png') ?>" /></span>
                                <p id="pa">Estanteria</p>
                            </a>
                        </li>
                    <?php } ?>
                    <li>
                        <a href="#" id="aa"><span><img style=" width:35px; height:40px; " src="<?php echo base_url('/img/historial.png') ?>" /></span>
                            <p id="pa">Historial</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>Estanteria" id="aa"><span><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/estanteria.png') ?>" /></span>
                            <p id="pa">Estanteria</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('salir') ?>" id="aa"><span><img style=" width:35px; height:35px; " src="<?php echo base_url('/img/salir.png') ?>" /></span>
                            <p id="pa">Cerrar Sesion</p>
                        </a>
                    </li>
                </ul>
                <nav>
                    <div class="container-fluid d-flex justify-content-end" style="position:relative; border-top: 1px solid white; margin-top:5px">
                        <button type="button" id="sidebarCollapse" class="btn btn-primary" style="padding:0px;margin:10px 0 10px 0;">
                            <i><img class="menu" style=" width:30px; height:30px;" src="<?php echo base_url('/img/menu.png') ?>" /></i>
                            <span class="sr-only">Toggle Menu</span>
                        </button>
                    </div>
                </nav>
            </div>
        </nav>
    </div>

    <div>
        <a href="<?= base_url('/home') ?>"><img class="log" id="log" style="" src="<?php echo base_url('/img/ingecosmo.png') ?>" /></a>
    </div>

    <script>
        document.querySelectorAll(".menu").forEach(el => {
            el.addEventListener("click", () => {
                el.classList.toggle("rotate");
            });
        });
        //Mostrar mensajes de SwalFire
        function mostrarMensaje(tipo, msg) {
            Swal.fire({
                position: 'center',
                icon: `${tipo}`,
                text: `${msg}`,
                showConfirmButton: false,
                timer: 1500
            })
        }
    </script>
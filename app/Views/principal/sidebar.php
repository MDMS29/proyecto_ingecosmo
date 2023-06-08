<!doctype html>
<html lang="es">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,400;1,500&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo base_url('/img/ingecosmo.png') ?>" />
    <title>Ingecosmos Ltda.</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url('bootstrap5/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('dataTable/dataTables.bootstrap5.min.css') ?>" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!-- SCRIPTS -->

    <script src="<?= base_url('js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('dataTable/jquery.dataTables.js') ?>"></script>
    <script src="<?= base_url('dataTable/dataTables.bootstrap5.min.js') ?>"></script>
    <script src="<?= base_url('js/main.js') ?>"></script>

    <!-- -->
</head>

<body class=" d-flex align-items-stretch">
    <nav id="sidebar2" class="navbar navbar-expand-lg " style="background-color:#000059; z-index: 999; position: absolute">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <img class="menu" style=" width:30px; height:30px;" src="<?php echo base_url('/img/menu.png') ?>" />
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul id="list" class="navbar-nav me-auto mb-2 mb-lg-0">
                    <hr class="nav-item dropdown" style="border-color: white">
                    <li><a class="nav-item dropdown" href="<?php echo base_url('usuarios/perfil/') . session('id') ?> " style="color: white; margin-left: 10px;"><img title="Perfil" style=" width:40px; height:40px; display:inline-block " src="<?php echo base_url('/img/usuario.png') ?>" /> <?= session('rol') ?></a></li>
                    <hr class="nav-item dropdown" style="border-color: white">
                    <?php if (session('idRol') == 1 || session('idRol') == 2) { ?>
                        <li><a class="nav-item dropdown" href="<?php echo base_url('trabajadores') ?>" style="color: white; margin-left: 10px;"><img title="Trabajadores" style=" width:40px; height:40px; " src="<?php echo base_url('/img/trabajadores.png') ?>" /> Trabajadores</a></li>
                        <hr class="nav-item dropdown" style="border-color: white">
                        <li><a class="nav-item dropdown" href="<?php echo base_url('clientes') ?>" style="color: white;  margin-left: 10px;"><img title="Clientes" style=" width:40px; height:40px; " src="<?php echo base_url('/img/clientes.png') ?>" /> Clientes</a></li>
                        <hr class="nav-item dropdown" style="border-color: white">
                        <li><a class="nav-item dropdown" href="<?php echo base_url('repuestosAdmin') ?>" style="color: white;  margin-left: 10px;"><img title="Repuestos" style=" width:40px; height:40px; " src="<?php echo base_url('/img/repuestos.png') ?>" /> Respuestos</a></li>
                        <hr class="nav-item dropdown" style="border-color: white">
                        <li><a class="nav-item dropdown" href="<?php echo base_url('insumosAdmin') ?>" style="color: white;  margin-left: 10px;"><img title="Insumos" style=" width:40px; height:40px; " src="<?php echo base_url('/img/materiales.png') ?>" /> Insumos</a></li>
                        <hr class="nav-item dropdown" style="border-color: white">
                        <li><a class="nav-item dropdown" href="<?php echo base_url('vehiculos') ?>" style="color: white;  margin-left: 10px;"><img title="Vehiculos" style=" width:40px; height:40px; " src="<?php echo base_url('/img/vehiculo.png') ?>" /> Vehiculos</a></li>
                        <hr class="nav-item dropdown" style="border-color: white">
                        <li><a class="nav-item dropdown" href="" style="color: white;  margin-left: 10px;"><img title="Ordenes Servicio" style=" width:40px; height:40px; " src="<?php echo base_url('/img/orden-servicio.png') ?>" /> Ordenes de Servicio</a></li>
                        <hr class="nav-item dropdown" style="border-color: white">
                        <li><a class="nav-item dropdown" href="<?= base_url('proveedores') ?>" style="color: white; margin-left: 10px;  "><img title="Proveedores" style=" width:40px; height:40px; " src="<?php echo base_url('/img/proveedores.png') ?>" /> Proveedores</a></li>
                        <hr class="nav-item dropdown" style="border-color: white">
                        <li><a class="nav-item dropdown" href="<?php echo base_url('aliados') ?>" style="color: white; margin-left: 10px; "><img title="Aliados" style=" width:40px; height:40px; " src="<?php echo base_url('/img/AliadosB.png') ?>" /> Aliados</a></li>
                        <hr class="nav-item dropdown" style="border-color: white">
                        <li><a class="nav-item dropdown" href="<?php echo base_url('usuarios') ?>" style="color: white; margin-left: 10px; "><img title="Usuarios" style=" width:40px; height:40px; " src="<?php echo base_url('/img/usuarioS.png') ?>" /> Usuarios</a></li>
                        <hr class="nav-item dropdown" style="border-color: white">
                        <li><a class="nav-item dropdown" href="<?php echo base_url('historial/vehiculos') ?>" style="color: white; margin-left: 5px; "><img title="Historial Ordenes Servicio" style=" width:40px; height:45px; " src="<?php echo base_url('/img/historial-orden.png') ?>" /> Historial Ordenes</a></li>
                        <hr class="nav-item dropdown" style="border-color: white">
                    <?php } else if (session('idRol') == 3) { ?>
                        <li><a class="nav-item dropdown" href="<?php echo base_url('repuestos') ?>" style="color: white;  margin-left: 10px;"><img title="Repuestos" style=" width:40px; height:40px; " src="<?php echo base_url('/img/repuestos.png') ?>" /> Respuestos</a></li>
                        <hr class="nav-item dropdown" style="border-color: white">
                        <li><a class="nav-item dropdown" href="<?php echo base_url('insumos') ?>" style="color: white;  margin-left: 10px;"><img title="Insumos" style=" width:40px; height:40px; " src="<?php echo base_url('/img/materiales.png') ?>" /> Insumos</a></li>
                        <hr class="nav-item dropdown" style="border-color: white">
                        <li><a class="nav-item dropdown" href="<?= base_url('estanteria') ?>" style="color: white;  margin-left: 10px;"><img title="Estanteria" style=" width:40px; height:40px; " src="<?php echo base_url('/img/estanteria.png') ?>" /> Estanteria</a></li>
                        <hr class="nav-item dropdown" style="border-color: white">
                        <li><a class="nav-item dropdown" href="<?php echo base_url('repuestos') ?> style="color: white; margin-left: 10px;"><img title="Carrito" style=" width:40px; height:40px; " src="<?php echo base_url('/img/carrito.png') ?>" /> Carrito de Materiales</a></li>
                        <hr class="nav-item dropdown" style="border-color: white">
                    <?php } ?>
                    <li><a class="nav-item dropdown" href="#" style="color: white;  margin-left: 10px;"><img title="Peticiones" style=" width:40px; height:40px; " src="<?php echo base_url('/img/buzon.png') ?>" /> Peticiones</a></li>
                    <li>
                        <hr class="nav-item dropdown" style="border: solid 1px white">
                    </li>
                    <li><a class="nav-item dropdown" href="#" style="color: white;  margin-left: 10px;"><img title="Historial" style=" width:35px; height:40px; " src="<?php echo base_url('/img/historial.png') ?>" /> Historial</a></li>
                    <li>
                        <hr class="nav-item dropdown" style="border: solid 1px white">
                    </li>
                    <li><a href="<?php echo base_url('salir') ?>" class="nav-item dropdown; salir  " href="#" style="color: white;  margin-left:10px;"><img title="Salir" style=" width:35px; height:35px; " src="<?php echo base_url('/img/salir.png') ?>" /> Cerrar Sesion</a></li>
                    </li>
                </ul>
            </div>
        </div>
    </nav>




    <nav id="sidebar" class="active" style="position: sticky; ">
        <!-- <h1><a class="logo"></a></h1> -->
        <div class="d-flex justify-content-between flex-column" style="height: 100%;">
            <ul id="allElement" class="list-unstyled components mb-5">

                <li class="active">
                    <a href="<?php echo base_url('usuarios/perfil/') . session('id') ?> " id="aa"><span><img title="Perfil" style=" width:40px; height:40px; " src="<?php echo base_url('/img/usuario.png') ?>" /></span>
                        <p id="pa"><?= session('rol') ?></p>
                    </a>
                </li>

                <?php if (session('idRol') == 1 || session('idRol') == 2) { ?>
                    <li>
                        <a href="<?php echo base_url('trabajadores') ?>" id="aa"><span><img class="Tra" title="Trabajadores" style=" width:40px; height:40px; " src="<?php echo base_url('/img/trabajadores.png') ?>" /></span>
                            <p id="pa">Trabajadores</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('clientes') ?>" id="aa"><span><img title="Clientes" style=" width:40px; height:40px; " src="<?php echo base_url('/img/clientes.png') ?>" /></span>
                            <p id="pa">Clientes</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('repuestosAdmin') ?>" id="aa"><span><img title="Repuestos" style=" width:40px; height:40px; " src="<?php echo base_url('/img/repuestos.png') ?>" /></span>
                            <p id="pa">Repuestos</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('insumosAdmin') ?>" id="aa"><span><img title="Insumos" style=" width:40px; height:40px; " src="<?php echo base_url('/img/materiales.png') ?>" /></span>
                            <p id="pa">Insumos</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('vehiculos') ?>" id="aa"><span><img title="Vehiculos" style=" width:40px; height:40px; " src="<?php echo base_url('/img/vehiculo.png') ?>" /></span>
                            <p id="pa">Vehiculos</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('ordenServicio') ?>" id="aa"><span><img title="Ordenes Servicio" style=" width:40px; height:40px; " src="<?php echo base_url('/img/orden-servicio.png') ?>" /></span>
                            <p id="pa">Ordenes de Servicio</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('proveedores') ?>" id="aa"><span><img title="Proveedores" style=" width:40px; height:40px; " src="<?php echo base_url('/img/proveedores.png') ?>" /></span>
                            <p id="pa">Proveedores</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('aliados') ?>" id="aa"><span><img title="Aliados" style=" width:40px; height:40px; " src="<?php echo base_url('/img/AliadosB.png') ?>" /></span>
                            <p id="pa">Aliados</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('usuarios') ?>" id="aa"><span><img title="Usuarios" style=" width:40px; height:40px; " src="<?php echo base_url('/img/usuarioS.png') ?>" /></span>
                            <p id="pa">Usuarios</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('historial/vehiculos') ?>" id="aa"><span><img title="Historial Ordenes Servicio" style=" width:40px; height:45px; " src="<?php echo base_url('/img/historial-orden.png') ?>" /></span>
                            <p id="pa">Historial Ordenes</p>
                        </a>
                    </li>
                <?php } else if (session('idRol') == 3) { ?>
                    <li>
                        <a href="<?php echo base_url('repuestos') ?>" id="aa"><span><img title="Repuestos" style=" width:40px; height:40px; " src="<?php echo base_url('/img/repuestos.png') ?>" /></span>
                            <p id="pa">Repuestos</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('insumos') ?>" id="aa"><span><img title="Insumos" style=" width:40px; height:40px; " src="<?php echo base_url('/img/materiales.png') ?>" /></span>
                            <p id="pa">Insumos</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('estanteria') ?>" id="aa"><span><img title="Estanteria" style=" width:40px; height:40px; " src="<?php echo base_url('/img/estanteria.png') ?>" /></span>
                            <p id="pa">Estanteria</p>
                        </a>
                    </li>
                    <div class="numeroDinamico" style="display: flex;-webkit-box-align: center; align-items: center; justify-content: center; font-size: 11px; text-align: center;font-weight: 500;position: absolute;border-radius: 8px;background-color: rgb(236, 47, 77);padding: 2px 4px;width: 20px;margin-left: 60px;height: 15px;">4</div>
                    <li>
                        <a href="<?php echo base_url('carrito') ?>" id="aa"><span><img title="Carrito" style=" width:40px; height:40px; " src="<?php echo base_url('/img/carrito.png') ?>" /></span>
                            <p id="pa">Carrito de Materiales</p>
                        </a>
                    </li>
                <?php } ?>
                <li>
                    <a href="" id="aa"><span><img title="Peticiones" style=" width:40px; height:45px; " src="<?php echo base_url('/img/buzon.png') ?>" /></span>
                        <p id="pa">Peticiones</p>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('historial/materiales') ?>" id="aa"><span><img style=" width:35px; height:40px; " src="<?php echo base_url('/img/historial.png') ?>" /></span>
                        <p id="pa">Historial</p>
                    </a>
                </li>
                <li>
                    <a href="" id="aa" class="salir"><span><img title="Salir" style=" width:35px; height:35px; " src="<?php echo base_url('/img/salir.png') ?>" /></span>
                        <p id="pa">Cerrar Sesion</p>
                    </a>
                </li>
            </ul>
            <nav>
                <div class="container-fluid d-flex justify-content-end" style="position:relative; border-top: 1px solid white; margin-top: -50px">
                    <button type="button" id="sidebarCollapse" class="btn btn-primary" style="padding:0px;margin:10px 0 10px 0;">
                        <i><img class="menu" style=" width:30px; height:30px;" src="<?php echo base_url('/img/menu.png') ?>" /></i>
                        <span class="sr-only">Toggle Menu</span>
                    </button>
                </div>
            </nav>
        </div>
    </nav>

    <div>
        <a href="<?= base_url('/home') ?>"><img class="log" id="log" src="<?php echo base_url('/img/ingecosmo.png') ?>" width="100" /></a>
    </div>

    <script>
        const informacion = JSON.parse(localStorage.getItem('usuario'));
        if (informacion == null || informacion?.usuario == '') {
            window.location.href = '<?= base_url('') ?>'
        }
        $('.salir').on('click', function(e) {
            const informacion = {
                usuario: '',
                contrasena: ''
            };
            localStorage.setItem("usuario", JSON.stringify(informacion));
            $.ajax({
                type: 'POST',
                url: '<?= base_url('usuarios/salir') ?>',
                dataType: 'json',
                success: function(data) {
                    if (data == 1) {
                        window.location.href = '<?= base_url('') ?>'
                    }
                }
            })
        })
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
        const formatearFecha = (fecha) => {
            let fechaNueva = new Date(fecha)
            const opciones = {
                year: 'numeric',
                month: '2-digit',
                day: '2-digit',
            }
            return fechaNueva.toLocaleDateString('es-ES', opciones).replaceAll('/', '-').split('-')
        }
        const formatearCantidad = (cantidad) => {
            return Number(cantidad).toLocaleString('es-CO', {
                style: 'currency',
                currency: 'COP'
            })
        };
       

        function mostrarMensajeCarrito(icon, text) {
            Toast.fire({
                icon: `${icon}`,
                title: `${text}`
            })
        }
    </script>
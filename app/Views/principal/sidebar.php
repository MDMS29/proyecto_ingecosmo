<!doctype html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,400;1,500&display=swap" rel="stylesheet">
    <title>Ingecosmo Ltda.</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url('bootstrap5/css/bootstrap.min.css') ?>"></link>
    <link rel="stylesheet" href="<?php echo base_url('css/style.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/usuarios.css')?>">

    <!-- SCRIPTS -->
    <script src="<?php echo base_url('bootstrap5/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('js/jquery.min.js')?>"></script>
    <script src="js/main.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class=" d-flex align-items-stretch">

    <div class="d-flex">
        <nav id="sidebar" class="active">
            <!-- <h1><a class="logo"></a></h1> -->
            <div class=" d-flex justify-content-between flex-column" style="height:95vh;">
                <ul id="allElement" class="list-unstyled components mb-5">
                    <li class="active">
                        <a href="#" id="aa"><span><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/usuario.png') ?>"/></span><p id="pa" >Almacenista</p></a>
                    </li>
                    <li>
                        <a href="#"  id="aa"><span><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/trabajadores.png') ?>"/></span><p id="pa">Trabajadores</p></a>
                    </li>
                    <li>
                        <a href="#" id="aa"><span><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/clientes.png') ?>"/></span><p id="pa">Clientes</p></a>
                    </li>
                    <li>
                        <a href="#" id="aa"><span><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/materiales.png') ?>"/></span><p id="pa">Materiales</p></a>
                    </li>
                    <li>
                        <a href="#" id="aa"><span><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/vehiculo.png') ?>"/></span><p id="pa">Vehiculos</p></a>
                    </li>
                    <li>
                        <a href="#" id="aa"><span><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/proveedores.png') ?>"/></span><p id="pa">Proveedores</p></a>
                    </li>
                    <li>
                        <a href="#" id="aa"><span><img style=" width:35px; height:40px; " src="<?php echo base_url('/img/historial.png') ?>"/></span><p id="pa">Historial</p></a>
                    </li>
                    <li>
                        <a href="#" id="aa"><span><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/estanteria.png') ?>"/></span><p id="pa">Estanteria</p></a>
                    </li>
                    <li>
                        <a href="#" id="aa"><span><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/usuarioS.png') ?>"/></span><p id="pa">Usuarios</p></a>
                    </li>
                    <li>
                       <a href="#" id="aa"><span><img style=" width:35px; height:35px; " src="<?php echo base_url('/img/salir.png') ?>"/></span><p id="pa">Cerrar Sesion</p></a>
                    </li>
                </ul>
            </div>
            <nav>
                <div class="container-fluid d-flex justify-content-end" style="position:relative; border-top: 1px solid white; margin-top:5px">
                    <button  type="button" id="sidebarCollapse" class="btn btn-primary" style="padding:0px;margin:10px 0 10px 0;">
                        <i><img class="menu" style=" width:30px; height:30px;" src="<?php echo base_url('/img/menu.png') ?>"/></i>
                        <span class="sr-only">Toggle Menu</span>
                    </button>
                </div>
            </nav>
        </nav>
    </div>

<div>
    <a href=""><img class="log" id="log" style="" src="<?php echo base_url('/img/ingecosmo.png') ?>"/></a>
</div>

<script>
    document.querySelectorAll(".menu").forEach(el => {
        el.addEventListener("click", () => {
            el.classList.toggle("rotate");
        });
    });
</script>


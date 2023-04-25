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


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url('bootstrap5/css/bootstrap.min.css') ?>"></link>
    <link rel="stylesheet" href="<?php echo base_url('css/style.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/usuarios.css')?>">

    <!-- SCRIPTS -->
    

    <!-- SCRIPTS SHADIA -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('bootstrap5/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?php echo base_url('js/jquery.min.js')?>"></script>
    <script src="<?php echo base_url('js/main.js')?>"></script>
    <script src="<?php echo base_url('js/popper.js')?>"></script>
    <script src="<?php echo base_url('bootstrap5/js/bootstrap.min.js')?>"></script> 

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/categorias.css">


    

</head>

<body class=" d-flex align-items-stretch">

<nav id="sidebar2" class="navbar navbar-expand-lg " style="background-color:#000059">
  <div class="container-fluid">
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
   <img class="menu" style=" width:30px; height:30px;" src="<?php echo base_url('/img/menu.png') ?>"/>
        </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li><a class="dropdown-item" href="#" style="color: white"><img style=" width:40px; height:40px; display:inline-block " src="<?php echo base_url('/img/usuario.png') ?>"/> Almacenista</a></li>
            <li><a class="dropdown-item" href="#" style="color: white"><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/trabajadores.png') ?>"/> Trabajadores</a></li>
            <li><a class="dropdown-item" href="#" style="color: white"><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/clientes.png') ?>"/> Clientes</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url()?>Categoria" style="color: white"><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/repuestos.png') ?>"/> Repuestos</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url()?>Categoria" style="color: white"><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/materiales.png') ?>"/> Insumos</a></li>
            <li><a class="dropdown-item" href="#" style="color: white"><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/vehiculo.png') ?>"/> Vehiculos</a></li>
            <li><a class="dropdown-item" href="#" style="color: white"><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/proveedores.png') ?>"/> Proveedores</a></li>
            <li><a class="dropdown-item" href="#" style="color: white"><img style=" width:35px; height:40px; " src="<?php echo base_url('/img/historial.png') ?>"/> Hisotrial</a></li>
            <li><a class="dropdown-item" href="#" style="color: white"><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/estanteria.png') ?>"/> Estanteria</a></li>
            <li><a class="dropdown-item" href="#" style="color: white">"<img style=" width:40px; height:40px; " src="<?php echo base_url('/img/usuarioS.png') ?>"/> Usuarios</a></li>
            <li><hr class="dropdown-divider" style="border-color: white"></li>
            <li><a class="dropdown-item" href="#" style="color: white"><img style=" width:35px; height:35px; " src="<?php echo base_url('/img/salir.png') ?>"/> Cerrar Sesion</a></li>
         </li>
      </ul>
    </div>
  </div>
</nav>

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
                        <a href="<?php echo base_url()?>CategoriaRepuesto" id="aa"><span><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/repuestos.png') ?>"/></span><p id="pa">Repuestos</p></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url()?>Categoria" id="aa"><span><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/materiales.png') ?>"/></span><p id="pa">Insumos</p></a>
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


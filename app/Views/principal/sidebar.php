<!doctype html>
<html lang="en">

<head>
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
    <script src="js/jquery.min.js"></script>
    <script src="js/main.js"></script>
</head>

<body class=" d-flex align-items-stretch">

    <div class="d-flex">
        <nav id="sidebar" class="active">
            <h1><a href="<?php echo base_url() ?>" class="logo">M.</a></h1>
            <ul class="list-unstyled components mb-5">
                <li class="active">
                    <a href="#"><span class="fa fa-home"></span> casitaaaaa</a>
                </li>
                <li>
                    <a href="#"><span class="fa fa-user"></span> About</a>
                </li>
                <li>
                    <a href="#"><span class="fa fa-sticky-note"></span> Blog</a>
                </li>
                <li>
                    <a href="#"><span class="fa fa-cogs"></span> Service</a>
                </li>
                <li>
                    <a href="#"><span class="fa fa-paper-plane"></span> Contacts</a>
                </li>
                <li class="logo-user">
                    <a href="<?php echo base_url('usuarios') ?>"><span class="fa fa-user"></span> Usuarios</a>
                </li>
            </ul>
            <nav>
                <div class="container-fluid d-flex justify-content-center">
                    <button type="button" id="sidebarCollapse" class="btn btn-primary">
                        <i class="fa fa-bars"></i>
                        <span class="sr-only">Toggle Menu</span>
                    </button>
                </div>
            </nav>
        </nav>

    </div>

</body>

</html>
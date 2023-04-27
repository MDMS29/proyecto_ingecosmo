<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingecosmo Ltda.</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url("css/login.css") ?>">
</head>
<body class="container-lg d-flex align-items-center justify-content-center ">
    <div class="login">
        <form action="<?php echo base_url('/login') ?>" method="POST">
            <p class="texto-titulo">LOGIN</p>
            <div class="logo">
                <img class="logo-ingecosmo" src="<?php echo base_url('/img/logo.png'); ?>">
            </div>
            <div class="bloque-items">
                <p class="texto">NUMERO DE IDENTIFICACION</p>
                <input type="text" name="usuario" id="usuario" class="form-control">
                <br>
                <p class="texto">CONTRASEÑA</p>
                <input type="password" name="contrasena" id="contrasena" class="form-control">
                <?php echo session('mensaje'); ?>
            </div>
            <div class="botones-login">
                <button class="btn-ingresar">INGRESAR</button>
            </div>
        </form>
    </div>
</body>
</html>
<script>
    const alerta = document.querySelector(".alerta");
    setTimeout(() => {
        alerta.remove();
    }, 2000);
</script>
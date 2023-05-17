<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingecosmo Ltda.</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="<?php echo base_url('/img/ingecosmo.png') ?>" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url("css/login.css") ?>">
    <script src="<?= base_url('js/jquery.min.js') ?>"></script>

</head>

<body class="container-lg d-flex align-items-center justify-content-center ">
    <div class="login">
        <form id="formulario">
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
                <div id="error">
                    <!-- error -->
                </div>  
            </div>
            <div class="botones-login">
                <button id="Ing" class="btn-ingresar">INGRESAR</button>
            </div>
        </form>
    </div>
</body>

</html>
<script>
    const informacion = JSON.parse(localStorage.getItem('usuario'));
    if (informacion == null || informacion?.usuario == '') {
        // FORMULARIO
        $('#formulario').on('submit', function(e) {
            e.preventDefault();
            usuario = $('#usuario').val();
            contrasena = $('#contrasena').val();
            if ([usuario, contrasena].includes('')) {
                return alert('Campos Vacios')
            }
            $.ajax({
                url: '<?php echo base_url('/login') ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    usuario,
                    contrasena
                },
                success: function(data) {
                    if (data == 2) {
                        $('#error').html("<div class='alerta'> <i class='bi bi-exclamation-circle-fill'></i> Usuario o Contraseña Incorrecta </div>")
                        const alerta = document.querySelector(".alerta");
                        setTimeout(() => {
                            alerta.remove();
                        }, 2000);
                    }else{
                        const informacion = {
                            usuario,
                            contrasena
                        };
                        localStorage.setItem("usuario", JSON.stringify(informacion));
    
                        if (data == 1) {
                            window.location.href = "<?php echo base_url('/home') ?>"
                        }
                    }
                }
            })

        })
    } else {
        // LOCAL STORAGE
        const usuario = informacion.usuario;
        const contrasena = informacion.contrasena
        $.ajax({
            url: "<?php echo base_url('/login') ?>",
            type: 'POST',
            dataType: 'json',
            data: {
                usuario,
                contrasena
            },
            success: function(data) {
                const informacion = {
                    usuario,
                    contrasena
                };
                localStorage.setItem("usuario", JSON.stringify(informacion));
                const alerta = document.querySelector(".alerta");
                setTimeout(() => {
                    alerta.remove();
                }, 2000);
                if (data == 1) {
                    window.location.href = "<?php echo base_url('/home') ?>"
                }
            }
        })
    }   
</script>
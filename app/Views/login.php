<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingecosmo Ltda.</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="<?php echo base_url('/img/ingecosmo.png') ?>" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url("css/login.css") ?>">
    <script src="<?= base_url('js/jquery.min.js') ?>"></script>

</head>

<body class="container-lg d-flex align-items-center justify-content-center" style="height: 100vh;">
    <div class="login">
        <form id="formulario">
            <p class="texto-titulo">LOGIN</p>
            <div class="logo">
                <img class="logo-ingecosmo" src="<?php echo base_url('/img/logo.png'); ?>">
            </div>
            <div class="bloque-items" style="width: 100%;">
                <p class="texto">USUARIO</p>
                <input type="number" name="usuario" id="usuario" class="form-control">
                <br>
                <p class="texto">CONTRASEÑA</p>

                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="contrasena" id="contrasena" aria-label="Text input with checkbox">
                    <div class="input-group-text">
                        <!-- <input class="form-check-input" type="checkbox" value="" id="ver" onchange="verContrasena()"> -->
                        <button type="button" style="border: none; background-color:#f8f9fa !important;" id="verContrasena">
                            <i id="eye" class="bi bi-eye-fill fs-4" style="font-size: 18px !important;"></i>
                        </button>
                    </div>
                </div>

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
    let ver = true
    $("#verContrasena").click(function(e) {
        ver = !ver
        var check, password, ojo;
        password = document.getElementById("contrasena");
        ojo = document.getElementById("eye");
        if (ver == true) {
            password.type = "text";
            ojo.removeAttribute('')
            ojo.setAttribute('class', 'bi bi-eye-slash-fill');

        } else {
            ojo.setAttribute('class', 'bi bi-eye-fill fs-4');
            password.type = "password";
        }

    })


    const informacion = JSON.parse(localStorage.getItem('usuario'));
    if (informacion == null || informacion?.usuario == '') {
        // FORMULARIO
        $('#formulario').on('submit', function(e) {
            e.preventDefault();
            usuario = $('#usuario').val();
            contrasena = $('#contrasena').val();
            $.ajax({
                url: '<?php echo base_url('/login') ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    usuario,
                    contrasena
                },
                success: function(data) {
                    if (data == 2 || [usuario, contrasena].includes('')) {
                        $('#error').html("<div class='alerta'> <i class='bi bi-exclamation-circle-fill'></i> ¡Hay campos vacios o invalidos! </div>")
                        const alerta = document.querySelector(".alerta");
                        setTimeout(() => {
                            alerta.remove();
                        }, 2000);
                    } else {
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
                console.log(data)
                const informacion = {
                    usuario,
                    contrasena
                };
                localStorage.setItem("usuario", JSON.stringify(informacion));
                const alerta = document.querySelector(".alerta");
                if (data == 1) {
                    window.location.href = "<?php echo base_url('/home') ?>"
                }
                setTimeout(() => {
                    alerta.remove();
                }, 2000);
            }
        })
    }
</script>
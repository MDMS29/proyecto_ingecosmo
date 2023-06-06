<link rel="stylesheet" href="<?php echo base_url('css/usuarios/usuarios.css') ?>">
<link rel="stylesheet" href="<?php echo base_url("css/proveedores_clientes/proveedores_cliente.css") ?>">

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<div id="content" class="p-4 p-md-5" style="background-color:rgba(0, 0, 0, 0.05);">
    <div class="container emp-profile">
        <form method="post">
            <div class="row">

                <form action="<?php echo base_url('/usuarios/guardarFoto'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img style="border-radius: 5px;" alt="Foto Usuario" id="fotoPerfil" />
                            <div id="filePerfil" style="border-radius: 5px;" class="file btn btn-lg btn-primary">
                                Inserte foto
                                <input type="file" name="upload" accept="image/png" />
                            </div>
                        </div>
                    </div>
                </form>

                <div class="col-md-7" id="encP">
                    <div class="profile-head">
                        <h5 style="font-weight: bold;">
                            <?= $usuario['nombre_p'] . ' ' . $usuario['nombre_s'] . ' ' . $usuario['apellido_p'] . ' ' . $usuario['apellido_s'] ?>
                        </h5>

                        <h6>
                            <?= $usuario['nombre_rol'] ?>
                        </h6>

                        <p class="profile-ranting" style="opacity: 0;">3</p>
                        <ul class="nav nav-tabs" style="margin-bottom: 0;" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Info Personal</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#telefonos" role="tab" aria-controls="profile" aria-selected="false">Telefonos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#correos" role="tab" aria-controls="profile" aria-selected="false">Correos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#contraseñas" role="tab" aria-controls="profile" aria-selected="false">Cambiar Contraseña</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <?php if (session('idRol') == 1 || session('idRol') == 2) { ?>
                            <div class="profile-work">
                                <p>Permisos</p>
                                <p>Podrás ver los Trabajadores, Clientes, Materiales, Vehículos y Proveedores.</p>
                                <p>Tendrás el poder de agregar, editar y eliminar cualquiera de sus datos almacenados.</p>

                            </div>
                        <?php } ?>

                        <?php if (session('idRol') == 3) { ?>
                            <div class="profile-work">
                                <p>Permisos</p>
                                <p>Podrás ver los Insumos, Historial, Organizacion y Estanteria, tendrá el poder de agregar, editar y eliminar cualquiera de sus datos almacenados.</p>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="bloquePerfil">

                                    <div class="row">
                                        <div class="col-md-5">
                                            <label>Id Usuario</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?= $usuario['id_usuario'] ?></p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <label>Nombres</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?= $usuario['nombre_p'] . ' ' . $usuario['nombre_s'] ?></p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <label>Apellidos</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?= $usuario['apellido_p'] . ' ' . $usuario['apellido_s'] ?></p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <label>Tipo Documento</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?= $usuario['tipo_Documento'] ?></p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <label>N° Documento</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?= $usuario['n_identificacion'] ?></p>
                                        </div>
                                    </div>

                                </div>

                                <div class="bloquePerfil2">
                                    <div class="rowBtn">
                                        <button data-bs-toggle="modal" data-bs-target="#editarPerfil" type="button" class="btn btnRedireccion" onclick="editarCampos(<?= $usuario['id_usuario'] . ',' . 2 ?>)">Editar perfil</button>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="telefonos" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="table-responsive p-4" style="background-color: #f8f9fa;">
                                    <table class="table table-borderless table-sm table-hover" style="border:none;margin:0;">
                                        <thead>
                                            <tr class="table-secondary">
                                                <th scope="col" class="text-center">Numero</th>
                                                <th scope="col" class="text-center">Prioridad</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($telefonos as $tel) { ?>
                                                <tr>
                                                    <td class="text-center">
                                                        <?= $tel['numero'] ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?= $tel['prioridad'] == 'P' ? 'Principal' : 'Secundario' ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="correos" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="table-responsive p-4" style="background-color: #f8f9fa;">
                                    <table class="table table-borderless table-sm table-hover" style="border:none;margin:0;">
                                        <thead>
                                            <tr class="table-secondary">
                                                <th scope="col" class="text-center">Correo</th>
                                                <th scope="col" class="text-center">Prioridad</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($correos as $correo) { ?>
                                                <tr>
                                                    <td class="text-center">
                                                        <?= $correo['correo'] ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?= $correo['prioridad'] == 'P' ? 'Principal' : 'Secundario' ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <form autocomplete="off" id="formularioContraseñas">
                                <div class="tab-pane fade" id="contraseñas" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="container" style="background-color: #dfe6f2;border-radius:10px;">
                                        <div class="d-flex column-gap-3" style="width: 100%" id="contenedorPerfil">
                                            <div class="mb-3" style="width: 100%; margin: 0;" id="contenidoPerfil">
                                                <div class="mb-3" style="width: 100%; margin: 0;" id="bloqueContra">
                                                    <label id="labelNom" for="nombres" class="col-form-label"> Contraseña:
                                                    </label>
                                                    <input type="hidden" name="idUsuario" id="idUsuario" value="<?= $usuario['id_usuario'] ?>">

                                                    <div class="flex">
                                                        <input type="password" name="contraRes" class="form-control" id="contraRes" minlength="5">
                                                        <small class="normal">¡La contraseña debe contar con un minimo de 6 caracteres!</small>
                                                    </div>
                                                    <div class="form-check" style="margin-top: 10px;">
                                                        <input class="form-check-input" type="checkbox" value="" id="ver" onchange="verContrasena()">
                                                        <label class="form-check-label" for="ver">
                                                            Ver Contraseña
                                                        </label>
                                                    </div>
                                                </div>

                                                <div id="contenidoPerfil2" class="mb-3" style="width: 100%; margin: 0px;">
                                                    <div class="mb-3" style="width: 100%; margin: 0px;" id="bloqueContra">
                                                        <div>
                                                            <label for="nombres" class="col-form-label">Confirmar Contraseña:</label>
                                                            <input type="password" name="confirContraRes" class="form-control" id="confirContraRes" minlength="5">
                                                        </div>
                                                        <small id="msgConfirRes" class="normal"></small>
                                                    </div>
                                                    <div id="bloqueContra2">
                                                        <input type="button" class="btn btnAccionF" value="Actualizar" id="btnActuContra"></input>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- -------------------modal------------------------- -->
<form method="POST" id="formularioPerfil" autocomplete="off">
    <div class="modal fade" id="editarPerfil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="bodyP">
                <div class="modal-content">
                    <div class="modal-header" id="modalHeader">
                        <img class="imagenEncab" src="<?php echo base_url('/img/ingecosmo.jpg') ?>" />

                        <div class="d-flex align-items-center justify-content-center" style="width:auto;">
                            <img id="logoModal" src="<?= base_url('img/plus-b.png') ?>" alt="icon-plus" width="20">
                            <h1 class="modal-title fs-5" id="tituloModal">Editar</h1>
                        </div>

                        <button type="button" style="margin:0;" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form>
                            <div class="d-flex column-gap-3" style="width: 100%">
                                <div class="mb-3" style="width: 100%;">
                                    <label class="col-form-label" for="recipient-name" style="margin:0;">Primer Nombre:</label>
                                    <input class="form-control" type="text" min='1' max='300' id="nombreP" name="nombreP">
                                    <input id="id" name="id" hidden>
                                    <input type="text" name="tp" id="tp" hidden>

                                </div>

                                <div class="mb-3" style="width: 100%;">
                                    <label class="col-form-label" style="margin:0;" for="message-text">Segundo Nombre:</label>
                                    <input class="form-control" id="nombreS" name="nombreS"></input>
                                </div>

                                <div class="mb-3" style="width: 100%;">
                                    <label class="col-form-label" style="margin:0;" for="message-text">Primer Apellido:</label>
                                    <input class="form-control" id="apellidoP" name="apellidoP"></input>
                                </div>
                            </div>

                            <div class="d-flex column-gap-3" style="width: 100%">
                                <div class="mb-3" style="width: 100%;">
                                    <label class="col-form-label" style="margin:0;" for="message-text">Segundo Apellido:</label>
                                    <input class="form-control" id="apellidoS" name="apellidoS"></input>
                                </div>

                                <div class="mb-3" style="width: 100%;">
                                    <label class="col-form-label" style="margin:0;" for="tipoDoc">Tipo Identificación:</label>
                                    <select class="form-select form-select form-control" name="tipoDoc" id="tipoDoc">
                                        <option value="1" selected>Cedula de Ciudadania</option>
                                        <option>-- Seleccione --</option>
                                    </select>
                                </div>

                                <div class="mb-3" style="width: 100%;">
                                    <label class="col-form-label" style="margin:0;" for="message-text">N° Identificacion:</label>
                                    <input class="form-control" id="nIdenti" name="nIdenti"></input>
                                    <small id="msgDoc" class="invalido"></small>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btnRedireccion" data-bs-dismiss="modal" id="btnCerrar">Cerrar</button>
                        <button type="submit" class="btn btnAccionF" id="btnGuardar">Actualizar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // variables
    var inputIden = 0;
    var validIdent = true;
    var res

    // foto perfil
    var foto = '<?= base_url('usuarios/mostrarImagen/') . $usuario['id_usuario'] ?>';
    $('#fotoPerfil').attr('src', `${foto}`)

    function limpiarCampos() {
        $('#msgConfirRes').text('')
        $('#msgConfir').text('')
        $('#msgDoc').text('')
    }

    function editarCampos(id, tp) {
        //Actualizar datos
        if (tp == 2) {
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('srchUsu/') ?>" + id + "/" + 0,
                dataType: 'json',
            }).done(function(res) {
                $('#tp').val(2)
                $('#id').val(res[0]['id_usuario'])
                $('#nombreP').val(res[0]['nombre_p'])
                $('#nombreS').val(res[0]['nombre_s'])
                $('#apellidoP').val(res[0]['apellido_p'])
                $('#apellidoS').val(res[0]['apellido_s'])
                $('#tipoDoc').val(1)
                $('#nIdenti').val(res[0]['n_identificacion'])
                $('#msgDoc').text('')
                console.log(res)
            })
        }
    }
    $('#formularioPerfil').on('submit', function(e) {
        e.preventDefault()
        id = $('#id').val()
        tp = $('#tp').val()
        nombreP = $('#nombreP').val()
        nombreS = $('#nombreS').val()
        apellidoP = $('#apellidoP').val()
        apellidoS = $('#apellidoS').val()
        tipoDoc = $('#tipoDoc').val()
        nIdenti = $('#nIdenti').val()
        console.log({
            id,
            tp,
            nombreP,
            nombreS,
            apellidoP,
            apellidoS,
            tipoDoc,
            nIdenti
        })
        if ([nombreP, apellidoP, apellidoS, tipoDoc, nIdenti].includes('') || validIdent == false) {
            return mostrarMensaje('error', '¡Hay campos vacios o invalidos!')
        } else {
            $.ajax({
                url: '<?php echo base_url('usuarios/insertar') ?>',
                type: 'POST',
                data: {
                    id,
                    tp,
                    nombreP,
                    nombreS,
                    apellidoP,
                    apellidoS,
                    tipoDoc,
                    nIdenti,
                    rol: '<?= session('idRol') ?>'
                },
                success: function(idUser) {
                    if (tp == 2) {
                        mostrarMensaje('success', '¡Se ha Actualizado el Usuario!')
                        validIdent = true
                    }
                }
            }).done(function(data) {
                $("#editarPerfil").modal('hide');
                location.reload();
            })
        }
    })
    // ---------------------------validaciones---------------------------
    //Funcion para buscar cliente segun su identificacion
    function buscarUsuarioIdent(id, inputIden) {
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('srchUsu/') ?>" + id + "/" + inputIden,
            dataType: 'JSON',
            success: function(res) {
                if (res[0] == null) {
                    $('#msgDoc').text('')
                    validIdent = true
                } else if (res[0] != null) {
                    $('#msgDoc').text('* Numero de identificación invalido *')
                    validIdent = false
                }
            }
        })
    }
    //Identificar si el numero de identificacion no este registrado
    $('#nIdenti').on('input', function(e) {
        inputIden = $('#nIdenti').val()
        tp = $('#tp').val()
        id = $('#id').val()
        if (tp == 2 && id != 0) {
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('srchUsu/') ?>" + id + "/" + inputIden,
                dataType: 'JSON',
                success: function(res) {
                    if (res[0]['n_identificacion'] == inputIden) {
                        $('#msgDoc').text('')
                        validIdent = true
                    } else {
                        buscarUsuarioIdent(0, inputIden)
                    }
                }
            })
        }
    })
    // -----------contrassss y su validacion----------------
    //Ver contraseñas
    function verContrasena() {
        var check, password;
        password = document.getElementById("contraRes");
        password2 = document.getElementById("confirContraRes");
        check = document.getElementById("ver");
        if (check.checked == true) // Si la checkbox de mostrar contraseña está activada
        {
            password.type = "text";
            password2.type = "text";
        } else // Si no está activada 
        {
            password.type = "password";
            password2.type = "password";
        }
    }
    //Verificacion de contraseñas
    function verifiContra(tipo, inputMsg, inputContra, inputConfir) {
        input = $(`#${inputMsg}`)
        contra = $(`#${inputContra}`).val()
        confirContra = $(`#${inputConfir}`).val()
        if (tipo == 2) {
            if (contra == '' && confirContra == '') {
                input.text('').removeClass().addClass('normal')

            } else if (contra == confirContra) {
                input.text('¡Contraseñas valida!').removeClass().addClass('valido')

            } else if (contra == '') {
                input.text('¡Ingrese una contraseña!').removeClass().addClass('normal')

            } else if (confirContra == '') {
                input.text('').removeClass().addClass('normal')

            } else if (contra != confirContra) {
                return input.text('¡Las contraseñas no coinciden!').removeClass().addClass('invalido')
            }
        } else {
            if (contra == '' && confirContra == '') {
                input.text('').removeClass().addClass('normal')

            } else if (contra == '' && confirContra) {
                input.text('¡Ingrese una contraseña!').removeClass().addClass('normal')

            } else if (confirContra == '') {
                input.text('').removeClass().addClass('normal')

            } else if (confirContra && contra == confirContra) {
                input.text('¡Contraseñas valida!').removeClass().addClass('valido')

            } else if (confirContra && contra != confirContra) {
                return input.text('¡Las contraseñas no coinciden!').removeClass().addClass('invalido')
            }
        }
    }
    $('#confirContraRes').on('input', function(e) {
        verifiContra(2, 'msgConfirRes', 'contraRes', 'confirContraRes')
    })
    $('#contraRes').on('input', function(e) {
        verifiContra(1, 'msgConfirRes', 'contraRes', 'confirContraRes')
    })
    //Funcion para cambiar contraseña
    $('#btnActuContra').on('click', function(e) {
        e.preventDefault()
        idUsuario = $("#idUsuario").val()
        contra = $("#contraRes").val()
        contraConfir = $("#confirContraRes").val()

        if ([contra, contraConfir].includes('') || contra != contraConfir) {
            return mostrarMensaje('error', '¡Hay campos vacios o invalidos!')
        } else {
            $.ajax({
                url: '<?= base_url('usuarios/cambiarContrasena') ?>',
                data: {
                    idUsuario,
                    contra,
                    contraConfir,
                    // rol: '< ?= session('idRol') ?>'
                },
                type: 'POST',
                dataType: 'json'
            }).done(function(data) {
                limpiarCampos('msgConfirRes')
                if (data == 2) {
                    return mostrarMensaje('error', '¡Ha ocurrido un error!')
                } else {
                    mostrarMensaje('success', '¡Se ha actualizado su contraseña!')
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
                }
            })
        }
    })
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
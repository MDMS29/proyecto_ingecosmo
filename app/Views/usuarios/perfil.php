<link rel="stylesheet" href="<?php echo base_url('css/usuarios/usuarios.css') ?>">
<!-- <link rel="stylesheet" href="< ?php echo base_url("css/proveedores_clientes/proveedores_cliente.css") ?>"> -->

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<div id="content" class="p-4 p-md-5" style="background-color:rgba(0, 0, 0, 0.05);">
    <h1>Perfil</h1>
    <div class="container-info">
        <div class="info-user">
            <div class="d-flex align-items-center">
                <img style="border-radius: 50%;" alt="Foto Usuario" id="fotoPerfil" />
            </div>
            <div class="w-100 p-2">
                <h5><?= $usuario['nombre_p'] . ' ' . $usuario['nombre_s'] . ' ' . $usuario['apellido_p'] . ' ' . $usuario['apellido_s'] ?></h5>

                <div class="d-flex gap-3 p-2">
                    <label>Rol:</label>
                    <p><?= $usuario['nombre_rol'] ?></p>
                </div>

                <div class="d-flex">
                    <div class="px-2 d-flex gap-3 flex-grow-1">
                        <label>Tipo Documento:</label>
                        <p><?= $usuario['tipo_Documento'] ?></p>
                    </div>
                    <div class="px-2 d-flex gap-3 flex-grow-1">
                        <label>N° Documento:</label>
                        <p><?= $usuario['n_identificacion'] ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="info-user flex-column">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#telefonos" role="tab" aria-controls="profile" aria-selected="false">Telefonos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#correos" role="tab" aria-controls="profile" aria-selected="false">Correos</a>
                </li>
            </ul>
            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="telefonos" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="table-responsive p-4">
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
                        <div class="table-responsive p-4">
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
                </div>
            </div>
        </div>
        <div></div>
        <div></div>
    </div>
</div>

<!-- -------------------modal------------------------- -->
<form method="POST" id="formularioPerfil" autocomplete="off">
    <div class="modal fade" id="editarPerfil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="body-R" style="width: 100%;">
                <div class="modal-content">
                    <div class="modal-header flex align-items-center gap-3">
                        <img class="imagenEncab" src="<?php echo base_url('/img/ingecosmo.png') ?>" width="100" />

                        <div class="d-flex align-items-center justify-content-center" style="width:auto;">
                            <img id="logoModal" src="<?= base_url('img/editar.png') ?>" alt="icon-plus" width="20">
                            <h1 class="modal-title fs-5" id="tituloModal"> Editar</h1>
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

                            <div class="d-flex column-gap-3" style="width: 100%">
                                <div class="mb-3" style="width: 100%">
                                    <label for="nombres" id="FotoUsuario" class="col-form-label">Foto de Usuario:</label>
                                    <input type="file" name="foto" id="foto" class="form-control" accept="image/png">
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btnAccionF" data-bs-dismiss="modal" id="btnCerrar">Cerrar</button>
                        <button type="submit" class="btn btnRedireccion" id="btnGuardar">Actualizar</button>
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
            var formData = new FormData();
            formData.append('id', id);
            formData.append('tp', tp);
            formData.append('nombreP', nombreP);
            formData.append('nombreS', nombreS);
            formData.append('apellidoP', apellidoP);
            formData.append('apellidoS', apellidoS);
            formData.append('tipoDoc', tipoDoc);
            formData.append('nIdenti', nIdenti);
            formData.append('rol', '<?= session('idRol') ?>');
            formData.append('foto', $('#foto')[0].files[0]);
            $.ajax({
                url: '<?php echo base_url('usuarios/insertar') ?>',
                type: 'POST',
                data: formData,
                dataType: 'json',
                contentType: false, // Importante: desactiva el tipo de contenido predeterminado
                processData: false, // Importante: no proceses los datos
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
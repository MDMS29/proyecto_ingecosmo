<link rel="stylesheet" href="<?php echo base_url('css/usuarios/usuarios.css') ?>">

<!-- TABLA MOSTRAR USUARIOS -->
<div id="content" class="p-4 p-md-5" style="background-color:rgba(0, 0, 0, 0.002);">
    <h2 class="text-center mb-4"><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/usuarioS-n.png') ?>" /> Usuarios Del Sistema</h2>
    <div class="table-responsive p-2">
        <table class="table table-striped" id="tableUsuarios" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">Nombres</th>
                    <th scope="col" class="text-center">Apellidos</th>
                    <th scope="col" class="text-center">Tipo Documento</th>
                    <th scope="col" class="text-center">Identificación</th>
                    <th scope="col" class="text-center">Rol</th>
                    <th scope="col" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <!-- TABLA DE USUARIOS -->
            </tbody>
        </table>
    </div>
    <div class="footer-page mt-4">
        <button type="button" class="btn btnRedireccion" data-bs-toggle="modal" data-bs-target="#agregarUsuario" onclick="seleccionarUsuario(<?= 0 . ',' . 1 ?>)"><img src="<?= base_url('icons/plus.png') ?>" alt="icon-plus" width="20"> Agregar</button>
        <a href="<?= base_url('usuarios/eliminados') ?>" class="btn btnAccionF"> <img src="<?= base_url('icons/delete.png') ?>" alt="icon-plus" width="20"> Eliminados</a>
    </div>
</div>

<!-- FORMULARIO PARA AGREGAR - EDITAR USUARIO -->
<form autocomplete="off" id="formularioUsuarios">
    <div class="modal fade" id="agregarUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <input type="text" name="id" id="id" hidden>
        <input type="text" name="tp" id="tp" hidden>
        <div class="modal-dialog modal-xl">
            <div class="body">
                <div class="logo">
                    <img src="<?= base_url('img/logo_empresa.png') ?>" alt="Logo Empresa" class="logoEmpresa">
                </div>
                <div class="modal-content">
                    <div class="modal-header flex">
                        <h1 class="modal-title fs-5 text-center" id="tituloModal"><!-- TEXTO DINAMICO--></h1>
                        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">X</button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="d-flex column-gap-3" style="width: 100%">
                                <div class="mb-3" style="width: 100%">
                                    <label for="nombre_p" class="col-form-label">Primer Nombre:</label>
                                    <input type="text" name="nombre_p" class="form-control" id="nombreP">
                                </div>
                                <div class="mb-3" style="width: 100%">
                                    <label for="nombre_s" class="col-form-label">Segundo Nombre:</label>
                                    <input type="text" name="nombre_s" class="form-control" id="nombreS">
                                </div>
                                <div class="mb-3" style="width: 100%">
                                    <div class="mb-3">
                                        <label for="tipoDoc" class="col-form-label">Tipo Identificación:</label>
                                        <select class="form-select form-select" name="tipoDoc" id="tipoDoc">
                                            <option value="1" selected>Cedula de Ciudadania</option>
                                            <option>-- Seleccione --</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex column-gap-3" style="width: 100%">
                                <div class="mb-3" style="width: 100%">
                                    <label for="apellido_p" class="col-form-label">Primer Apellido:</label>
                                    <input type="text" name="apellido_p" class="form-control" id="apellidoP">
                                </div>
                                <div class="mb-3" style="width: 100%">
                                    <label for="apellido_s" class="col-form-label">Segundo Apellido:</label>
                                    <input type="text" name="apellido_s" class="form-control" id="apellidoS">
                                </div>
                                <div class="mb-3" style="width: 100%">
                                    <div class="">
                                        <label for="nIdenti" class="col-form-label">N° Identificación:</label>
                                        <input type="number" name="nIdenti" class="form-control" id="nIdenti" minlength="9" maxlength="11">
                                        <small id="msgDoc" class="invalido"></small>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex column-gap-3" style="width: 100%">
                                <div class="mb-3" style="width: 100%">
                                    <label for="telefono" class="col-form-label">Telefono:</label>
                                    <div class="d-flex">
                                        <input type="number" name="telefono" class="form-control" id="telefono" disabled>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#agregarTelefono" data-bs-target="#staticBackdrop" class="btn" style="border:none;background-color:gray;color:white;" title="Agregar Telefono">+</button>
                                    </div>
                                </div>
                                <div class="mb-3" style="width: 100%">
                                    <label for="email" class="col-form-label">Email:</label>
                                    <div class="d-flex">
                                        <input type="email" name="email" class="form-control" id="email" disabled>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#agregarCorreo" data-bs-target="#staticBackdrop" class="btn" style="border:none;background-color:gray;color:white;" title="Agregar Correo">+</button>
                                    </div>
                                </div>
                                <div class="mb-3" style="width: 100%">
                                    <div class="mb-3">
                                        <label for="rol" class="col-form-label">Tipo de Rol:</label>
                                        <select class="form-select form-select" name="rol" id="rol">
                                            <option selected value="">-- Seleccione --</option>
                                            <?php foreach ($roles as $r) { ?>
                                                <option value="<?= $r['id_rol'] ?>"><?= $r['nombre'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex column-gap-3" style="width: 100%">
                                <div class="mb-3" style="width: 100%" id="divContras">
                                    <label id="labelNom" for="nombres" class="col-form-label"> <!-- TEXTO DINAMICO -->
                                    </label>
                                    <input type="password" name="contra" class="form-control" id="contra" minlength="5">
                                    <small class="normal">¡La contraseña debe contar con un minimo de 6
                                        caracteres!</small>
                                </div>
                                <div class="mb-3" style="width: 100%" id="divContras2">
                                    <div>
                                        <label for="nombres" class="col-form-label">Confirmar Contraseña:</label>
                                        <input type="password" name="confirContra" class="form-control" id="confirContra" minlength="5">
                                    </div>
                                    <small id="msgConfir" class="normal"></small>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btnRedireccion" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btnAccionF" id="btnGuardar"><!-- TEXTO DIANMICO --></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


<!-- MODAL EDITAR CONTRASEÑA -->
<form autocomplete="off" id="formularioContraseñas">
    <div class="modal fade" id="cambiarContra" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header flex justify-content-between align-items-center">
                    <img src="<?= base_url('img/ingecosmo.png') ?>" alt="logo-empresa" width="60" height="60">
                    <h1 class="modal-title fs-5 text-center " id="tituloModal"><img src="<?= base_url('icons/restorePass.png') ?>" alt="" width="30" height="30"> REESTABLECER CONTRASEÑA</h1>
                    <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close" onclick="limpiarCampos('contraRes', 'confirContraRes', 'idUsuario')">X</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="idUsuario" id="idUsuario">
                    <div class="container p-4" style="background-color: #d9d9d9;border-radius:10px;">
                        <div class="d-flex column-gap-3" style="width: 100%">
                            <div class="mb-3" style="width: 100%" id="divContras">
                                <label id="labelNom" for="nombres" class="col-form-label"> Contraseña:
                                </label>
                                <div class="flex">
                                    <input type="password" name="contraRes" class="form-control" id="contraRes" minlength="5">
                                    <small class="normal">¡La contraseña debe contar con un minimo de 6 caracteres!</small>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="ver" onchange="verContrasena()">
                                    <label class="form-check-label" for="ver">
                                        Ver Contraseña
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3" style="width: 100%" id="divContras2">
                                <div>
                                    <label for="nombres" class="col-form-label">Confirmar Contraseña:</label>
                                    <input type="password" name="confirContraRes" class="form-control" id="confirContraRes" minlength="5">
                                </div>
                                <small id="msgConfirRes" class="normal"></small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btnRedireccion" data-bs-dismiss="modal" aria-label="Close" onclick="limpiarCampos('contraRes', 'confirContraRes')">Cerrar</button>
                    <input type="submit" class="btn btnAccionF" value="Actualizar"></input>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- MODAL AGREGAR - EDITAR TELEFONO -->
<div class="modal fade" id="agregarTelefono" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header flex justify-content-between align-items-center">
                <img src="<?= base_url('img/ingecosmo.png') ?>" alt="logo-empresa" width="60" height="60">
                <h1 class="modal-title fs-5 text-center " id="tituloModal"><img src="<?= base_url('icons/plus-b.png') ?>" alt="" width="30" height="30"> AGREGAR TELEFONO</h1>
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#agregarUsuario" aria-label="Close" onclick="limpiarCampos('telefonoAdd', 'prioridad')">X</button>
            </div>
            <div class="modal-body">
                <div class="container p-4" style="background-color: #d9d9d9;border-radius:10px;">
                    <div class="mb-2 d-flex gap-3" style="width: 100%;">
                        <div class="d-flex gap-2" style="width: 100%;">
                            <label for="telefonoAdd" class="col-form-label">Telefono:</label>
                            <div>
                                <input type="text" name="telefonoAdd" class="form-control" id="telefonoAdd" maxlength="10">
                                <small id="msgTel" class="invalido"></small>
                            </div>
                        </div>
                        <div class="d-flex gap-2" style="width: 100%;">
                            <label for="prioridad" class="col-form-label">Prioridad:</label>
                            <select class="form-select form-select" name="prioridad" id="prioridad">
                                <option selected value="">-- Seleccione --</option>
                                <option value="P">Primaria</option>
                                <option value="S">Secundaria</option>
                            </select>
                        </div>
                    </div>
                    <div class="table-responsive" style="overflow:scroll-vertical;overflow-y: scroll !important; height: 150px;background-color:white;">
                        <table class="table table-bordered table-sm table-hover" id="tablePaises" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th>Telefono</th>
                                    <th>Priodidad</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="bodyTel">
                                <tr class="text-center">
                                    <td colspan="3">NO HAY TELEFONOS</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btnRedireccion" data-bs-toggle="modal" data-bs-target="#agregarUsuario" onclick="limpiarCampos('telefonoAdd', 'prioridad')">Cerrar</button>
                <button type="button" class="btn btnAccionF" id="btnAddTel">Agregar</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL AGREGAR - EDITAR CORREO -->
<div class="modal fade" id="agregarCorreo" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header flex justify-content-between align-items-center">
                <img src="<?= base_url('img/ingecosmo.png') ?>" alt="logo-empresa" width="60" height="60">
                <h1 class="modal-title fs-5 text-center " id="tituloModal"><img src="<?= base_url('icons/plus-b.png') ?>" alt="" width="30" height="30"> AGREGAR CORREO</h1>
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#agregarUsuario" aria-label="Close" onclick="limpiarCampos('telefonoAdd', 'prioridadCorreo')">X</button>
            </div>
            <div class="modal-body">
                <div class="container p-4" style="background-color: #d9d9d9;border-radius:10px;">
                    <div class="mb-2 d-flex gap-3" style="width: 100%;">
                        <div class="d-flex gap-2" style="width: 100%;">
                            <label for="correoAdd" class="col-form-label">Correo:</label>
                            <div>
                                <input type="email" name="correoAdd" class="form-control" id="correoAdd">
                                <small id="msgCorreo" class="invalido"></small>
                            </div>
                        </div>
                        <div class="d-flex gap-2" style="width: 100%;">
                            <label for="prioridad" class="col-form-label">Prioridad:</label>
                            <select class="form-select form-select" name="prioridadCorreo" id="prioridadCorreo">
                                <option selected value="">-- Seleccione --</option>
                                <option value="P">Primaria</option>
                                <option value="S">Secundaria</option>
                            </select>
                        </div>
                    </div>
                    <div class="table-responsive" style="overflow:scroll-vertical;overflow-y: scroll !important; height: 150px;background-color:white;">
                        <table class="table table-bordered table-sm table-hover" id="tablePaises" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th>Correo</th>
                                    <th>Priodidad</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="bodyCorre">
                                <tr class="text-center">
                                    <td colspan="3">NO HAY CORREOS</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btnRedireccion" data-bs-toggle="modal" data-bs-target="#agregarUsuario" onclick="limpiarCampos('telefonoAdd', 'prioridadCorreo')">Cerrar</button>
                <button type="button" class="btn btnAccionF" id="btnAddCorre">Agregar</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
    var ContadorPRC = 0;
    var contador = 0;
    var contadorCorreo = 0;
    var inputIden = 0;
    let telefonos = [] //Telefonos del usuario.
    let correos = [] //Correos del usuario.
    var validCorreo
    //Ver contraseñas
    function verContrasena() {
        var password1, password2, check;
        password1 = document.getElementById("contraRes");
        password2 = document.getElementById("confirContraRes");
        check = document.getElementById("ver");
        if (check.checked == true) // Si la checkbox de mostrar contraseña está activada
        {
            password1.type = "text";
            password2.type = "text";
        } else // Si no está activada 
        {
            password1.type = "password";
            password2.type = "password";
        }
    }
    // Tabla de usuarios  
    var tableUsuarios = $("#tableUsuarios").DataTable({
        ajax: {
            url: '<?= base_url('usuarios/obtenerUsuarios') ?>',
            method: "POST",
            data: {
                estado: 'A'
            },
            dataSrc: "",
        },
        columns: [{
                data: null,
                render: function(data, type, row) {
                    ContadorPRC = ContadorPRC + 1;
                    return "<b>" + ContadorPRC + "</b>";
                },
            },
            {
                data: null,
                render: function(data, type, row) {
                    // Combinar campos
                    return data.nombre_p + " " + data.nombre_s;
                }
            },
            {
                data: null,
                render: function(data, type, row) {
                    // Combinar campos
                    return data.apellido_p + " " + data.apellido_s;
                }
            },
            {
                data: 'doc_res'
            },
            {
                data: 'n_identificacion'
            },
            {
                data: 'nombre_rol'
            },
            {
                data: null,
                render: function(data, type, row) {
                    return (
                        '<button class="btn" onclick="seleccionarUsuario(' + data.id_usuario + ' , 2 )" data-bs-target="#agregarUsuario" data-bs-toggle="modal"><img src="<?php echo base_url('icons/edit.svg') ?>" alt="Boton Editar" title="Editar Usuario"></button>' +
                        '<button class="btn" onclick=cambiarEstado(' + data.id_usuario + ',"I")><img src="<?php echo base_url("icons/delete.svg") ?>" alt="Boton Eliminar" title="Eliminar Usuario"></button>' +
                        '<butto class="btn" data-bs-toggle="modal" data-bs-target="#cambiarContra" data-bs-target="#staticBackdrop" onclick=$("#idUsuario").val(' + data.id_usuario + ') ><img src="<?php echo base_url("icons/restorePass.png") ?>" width="25" heigth="25"/></butto>'
                    );
                },
            }
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },

    });

    //Limpiar campos de telefonos y correos
    function limpiarCampos(input1, input2, input3) {
        $(`#${input1}`).val('')
        $(`#${input2}`).val('')
        $(`#${input3}`).val('')
    }
    //Verificacion de contraseñas
    function verifiContra(tipo) {
        input = $('#msgConfir')
        input2 = $('#msgConfirRes')
        contra = $('#contra').val()
        contra = $('#contraRes').val()
        confirContra = $('#confirContra').val()
        confirContra = $('#confirContraRes').val()
        if (tipo == 2) {
            if (contra == '' && confirContra == '') {
                input.text('').removeClass().addClass('normal')
                input2.text('').removeClass().addClass('normal')
            } else if (contra == confirContra) {
                input.text('¡Contraseñas valida!').removeClass().addClass('valido')
                input2.text('¡Contraseñas valida!').removeClass().addClass('valido')
            } else if (contra == '') {
                input.text('¡Ingrese una contraseña!').removeClass().addClass('normal')
                input2.text('¡Ingrese una contraseña!').removeClass().addClass('normal')
            } else if (confirContra == '') {
                input.text('').removeClass().addClass('normal')
                input2.text('').removeClass().addClass('normal')
            } else if (contra != confirContra) {
                return input.text('¡Las contraseñas no coinciden!').removeClass().addClass('invalido')
                return input2.text('¡Las contraseñas no coinciden!').removeClass().addClass('invalido')
            }
        } else {
            if (contra == '' && confirContra == '') {
                input.text('').removeClass().addClass('normal')
            } else if (contra == '' && confirContra) {
                input.text('¡Ingrese una contraseña!').removeClass().addClass('normal')
                input2.text('¡Ingrese una contraseña!').removeClass().addClass('normal')
            } else if (confirContra == '') {
                input.text('').removeClass().addClass('normal')
                input2.text('').removeClass().addClass('normal')
            } else if (confirContra && contra == confirContra) {
                input.text('¡Contraseñas valida!').removeClass().addClass('valido')
                input2.text('¡Contraseñas valida!').removeClass().addClass('valido')
            } else if (confirContra && contra != confirContra) {
                return input.text('¡Las contraseñas no coinciden!').removeClass().addClass('invalido')
                return input2.text('¡Las contraseñas no coinciden!').removeClass().addClass('invalido')
            }
        }
    }
    $('#confirContra').on('input', function(e) {
        verifiContra(2)
    })
    $('#contra').on('input', function(e) {
        verifiContra(1)
    })
    $('#confirContraRes').on('input', function(e) {
        verifiContra(2)
    })
    $('#contraRes').on('input', function(e) {
        verifiContra(1)
    })
    //Insertar y editar Usuario
    function seleccionarUsuario(id, tp) {
        if (tp == 2) {
            //Actualizar datos
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('srchUsu/') ?>" + id + "/" + 0,
                dataType: 'json',

            }).done(function(res) {

                $('#tituloModal').text('Editar Usuario')
                $('#tp').val(2)
                $('#id').val(res[0]['id_usuario'])
                $('#nombreP').val(res[0]['nombre_p'])
                $('#nombreS').val(res[0]['nombre_s'])
                $('#apellidoP').val(res[0]['apellido_p'])
                $('#apellidoS').val(res[0]['apellido_s'])
                $('#tipoDoc').val(1)
                $('#nIdenti').val(res[0]['n_identificacion'])
                $('#rol').val(res[0]['id_rol'])
                $('#labelNom').text('Cambiar Contraseña:')
                $('#contra').val('')
                $('#divContras').attr('hidden', '')
                $('#divContras2').attr('hidden', '')
                $('#confirContra').val('')
                $('#btnGuardar').text('Actualizar')
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('telefonos/obtenerTelefonosUser/') ?>' + id + '/' + 7,
                    dataType: 'json',
                    success: function(data) {
                        telefonos = data[0]
                        guardarTelefono()
                    }
                })
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('email/obtenerEmailUser/') ?>' + id + '/' + 7,
                    dataType: 'json',
                    success: function(data) {
                        correos = data[0]
                        guardarCorreo()
                    }
                })
            })
        } else {
            //Insertar datos
            $('#tituloModal').text('Agregar')
            $('#tp').val(1)
            $('#id').val(0)
            $('#nombreP').val('')
            $('#nombreS').val('')
            $('#apellidoP').val('')
            $('#apellidoS').val('')
            $('#tipoDoc').val(1)
            $('#nIdenti').val('')
            $('#telefono').val('')
            $('#email').val('')
            $('#rol').val('')
            $('#contra').val('')
            $('#confirContra').val('')
            $('#divContras').removeAttr('hidden')
            $('#divContras2').removeAttr('hidden')
            $('#labelNom').text('Contraseña:')
            $('#btnGuardar').text('Agregar')
            // $('#formularioUsuarios').modal('hidden')
            // telefonos = []
        }
    }
    //Funcion para cambiar contraseña
    $('#formularioContraseñas').on('submit', function(e) {
        e.preventDefault()
        idUsuario = $("#idUsuario").val()
        contra = $("#contraRes").val()
        contraConfir = $("#confirContraRes").val()

        if ([contra, contraConfir].includes('')) {
            return mostrarMensaje('error', '¡Hay campos vacios!')
        } else {
            $.ajax({
                url: '<?= base_url('usuarios/cambiarContrasena') ?>',
                data: {
                    idUsuario,
                    contra,
                    contraConfir
                },
                type: 'POST',
                dataType: 'json'
            }).done(function(data) {
                $('#cambiarContra').modal('hide')
                tableUsuarios.ajax.reload(null, false); //Recargar tabla
                ContadorPRC = 0
                if (data == 2) {
                    return mostrarMensaje('error', '¡Ha ocurrido un error!')
                } else {
                    return mostrarMensaje('success', '¡Se ha actualizado su contraseña!')
                }
            })
        }
    })
    //Funcion para buscar usuario segun su identificacion
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
    var validIdent; //Valor para la identificación si es valido o invalido
    $('#nIdenti').on('input', function(e) {
        inputIden = $('#nIdenti').val()
        tp = $('#tp').val()
        id = $('#id').val()
        if (tp == 1 && id == 0) {
            buscarUsuarioIdent(0, inputIden)
        } else if (tp == 2 && id != 0) {
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
    //Envio de formulario
    $('#formularioUsuarios').on('submit', function(e) {
        e.preventDefault()
        tp = $('#tp').val()
        id = $('#id').val()
        nombreP = $('#nombreP').val()
        nombreS = $('#nombreS').val()
        apellidoP = $('#apellidoP').val()
        apellidoS = $('#apellidoS').val()
        tipoDoc = $('#tipoDoc').val()
        nIdenti = $('#nIdenti').val()
        rol = $('#rol').val()
        console.log(rol)
        contra = $('#contra').val()
        confirContra = $('#confirContra').val()
        //Control de campos vacios
        if ([nombreP, apellidoP, apellidoS, tipoDoc, nIdenti, rol].includes('') || contra != confirContra || validIdent == false || validCorreo == false || correos.length == 0 || telefonos.length == 0) {
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
                    rol,
                    contra,
                    telefonos
                },
                success: function(idUser) {
                    telefonos.forEach(tel => {
                        //Insertar Telefonos
                        $.post({
                            url: '<?php echo base_url('telefonos/insertar') ?>',
                            data: {
                                tp,
                                idUsuario: idUser,
                                numero: tel.numero,
                                prioridad: tel.prioridad,
                                tipoUsu: 7,
                                tipoTel: 3,
                            },
                            success: function(res) {
                                if (res != 1) {
                                    mostrarMensaje('error', '¡Ha ocurrido un error!')
                                }
                            }
                        })
                    });
                    correos.forEach(correo => {
                        //Insertar Correos
                        $.post({
                            url: '<?php echo base_url('email/insertar') ?>',
                            data: {
                                tp,
                                idUsuario: idUser,
                                correo: correo.correo,
                                prioridad: correo.prioridad,
                                tipoUsu: 7,
                            },
                            success: function(res) {
                                if (res != 1) {
                                    mostrarMensaje('error', '¡Ha ocurrido un error!')
                                    setTimeout(() => window.location.href = "<?= base_url('usuarios') ?>", 2000)
                                }
                            }
                        })
                    });
                    if (tp == 2) {
                        mostrarMensaje('success', '¡Se ha Actualizado el Usuario!')
                    } else {
                        mostrarMensaje('success', '¡Se ha Registrado el Usuario!')
                    }
                }
            }).done(function(data) {
                $('#agregarUsuario').modal('hide')
                tableUsuarios.ajax.reload(null, false); //Recargar tabla
                ContadorPRC = 0
            });
        };
    })


    // Agregar Telefono a la tabla
    $('#btnAddTel').on('click', function(e) {

        const numero = $('#telefonoAdd').val()
        const prioridad = $('#prioridad').val()

        if ([numero, prioridad].includes('') || validTel == false) {
            return mostrarMensaje('error', '¡Hay campos vacios o invalidos!')
        }
        contador += 1
        let info = {
            id: `${contador}1111`,
            numero,
            prioridad
        }
        let filtro = telefonos.filter(tel => tel.prioridad == 'P')
        let filtroTel = telefonos.filter(tel => tel.numero == info.numero)
        $('#telefonoAdd').val('')
        $('#prioridad').val('')
        if (filtroTel.length > 0) {
            filtro = []
            return mostrarMensaje('error', '¡Ya se agrego este numero de telefono!')
        }
        if (info.prioridad == 'S') {
            telefonos.push(info)
            return guardarTelefono()
        } else if (filtro.length > 0) {
            filtro = []
            return mostrarMensaje('error', '¡Ya hay un telefono prioritario!')

        } else {
            telefonos.push(info)
            return guardarTelefono()
        }

    })
    //Funcion para buscar el correo o el telefono
    function buscarCorreoTel(url, valor, inputName, tipo) {
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url() ?>" + `${url}` + valor + '/' + 0 + '/' + 7, //url, valor, idUsuario, tipoUsuario
            dataType: 'JSON',
            success: function(res) {
                if (res[0] == null) {
                    $(`#${inputName}`).text('')
                    validTel = true
                    validCorreo = true
                } else if (res[0] != null) {
                    $(`#${inputName}`).text(`* Este ${tipo} ya esta registrado *`)
                    validTel = false
                    validCorreo = false
                }
            }
        })
    }
    //Al escribir validar que el numero no este registrado
    $('#telefonoAdd').on('input', function(e) {
        numero = $('#telefonoAdd').val()
        buscarCorreoTel('telefonos/buscarTelefono/', numero, 'msgTel', 'telefono')
    })
    // Funcion para mostrar telefonos en la tabla.
    function guardarTelefono() {
        $('#telefono').val(telefonos[0]?.numero)
        var cadena
        if (telefonos.length == 0) {
            cadena += ` <tr class="text-center">
            <td colspan="3">NO HAY TELEFONOS</td>
            </tr>`
            $('#bodyTel').html(cadena)
        } else {
            for (let i = 0; i < telefonos.length; i++) {
                cadena += ` <tr class="text-center">
                <td>${telefonos[i].numero}</td>
                <td>${telefonos[i].prioridad == 'S' ? 'Secundaria' : 'Primaria'}</td>
                <td><button class="btn" onclick="eliminarTel(${telefonos[i].id})"><img src="<?= base_url('icons/delete.svg') ?>" title="Eliminar Telefono"></td>
                </tr>`
            }
        }
        $('#bodyTel').html(cadena)
    }
    //Eliminar telefono de la tabla
    function eliminarTel(id) {
        tp = $('#tp').val()
        if (tp == 2) {
            // Consulta tipo delete
            $.ajax({
                url: '<?php echo base_url('telefonos/eliminarTelefono/') ?>' + id,
                type: 'POST',
                dataType: 'json',
                success: function(data) {
                    if (data == 1) {
                        return mostrarMensaje('success', '¡Se ha eliminado el telefono!')
                    }
                }
            })
        }
        telefonos = telefonos.filter(tel => tel.id != id)
        guardarTelefono() //Actualizar tabla
    }
    //Agregar Correo a la tabla
    $('#btnAddCorre').on('click', function(e) {
        const tp = $('#tp').val()
        const correo = $('#correoAdd').val()
        const prioridad = $('#prioridadCorreo').val()
        if ([correo, prioridad].includes('')) {
            return mostrarMensaje('error', '¡Hay campos vacios!')
        }
        let info = {
            id: contadorCorreo += 1,
            correo,
            prioridad
        }
        let filtro = correos.filter(correo => correo.prioridad == 'P')
        let filtroCorreo = correos.filter(correo => correo.correo == info.correo)
        $('#correoAdd').val('')
        $('#prioridadCorreo').val('')
        if (filtroCorreo.length > 0) {
            filtro = []
            return mostrarMensaje('error', '¡Ya se agrego este correo!')
        }
        if (info.prioridad == 'S') {
            correos.push(info)
            return guardarCorreo()
        } else if (filtro.length > 0) {
            filtro = []
            return mostrarMensaje('error', '¡Ya hay un correo prioritario!')
        } else {
            correos.push(info)
            return guardarCorreo()
        }

    })
    //Al escribir validar que el correo no este registrado
    $('#correoAdd').on('input', function(e) {
        correo = $('#correoAdd').val()
        buscarCorreoTel('email/buscarEmail/', correo, 'msgCorreo', 'correo')
    })
    // Funcion para mostrar correos en la tabla.
    function guardarCorreo() {
        $('#email').val(correos[0]?.correo)
        var cadena
        if (correos.length == 0) {
            cadena += ` <tr class="text-center">
                            <td colspan="3">NO HAY CORREOS</td>
                        </tr>`
            $('#bodyCorre').html(cadena)
        } else {
            for (let i = 0; i < correos.length; i++) {
                cadena += ` <tr class="text-center">
                <td>${correos[i].correo}</td>
                <td>${correos[i].prioridad == 'S' ? 'Secundaria' : 'Primaria'}</td>
                <td><button class="btn" onclick="eliminarCorreo(${correos[i].id})"><img src="<?= base_url('icons/delete.svg') ?>" title="Eliminar Telefono"></td>
                </tr>`
            }
        }
        $('#bodyCorre').html(cadena)
    }
    //Eliminar correo de la tabla
    function eliminarCorreo(id) {
        tp = $('#tp').val()
        if (tp == 2) {
            // Consulta tipo delete
            $.ajax({
                url: '<?php echo base_url('email/eliminarEmail/') ?>' + id,
                type: 'POST',
                dataType: 'json',
                success: function(data) {
                    if (data == 1) {
                        mostrarMensaje('success', '¡Se ha eliminado el correo!!')
                    }
                }
            })
        }
        correos = correos.filter(correo => correo.id != id)
        guardarCorreo() //Actualizar tabla
    }
    //Cambiar estado de "Activo" a "Eliminado"
    function cambiarEstado(id, estado) {
        $.ajax({
            url: '<?= base_url() ?>' + 'usuarios/cambiarEstado',
            type: 'POST',
            data: {
                id: id,
                estado: estado
            },
            success: function(data) {
                if (data == 1) {
                    mostrarMensaje('success', '¡Se ha eliminado el usuario!')
                } else {
                    mostrarMensaje('error', '¡Ha ocurrido un error!')
                }

            }
        }).done(function(data) {
            tableUsuarios.search('').draw()
            tableUsuarios.ajax.reload(null, false); //Recargar tabla
            ContadorPRC = 0
        })
    }
</script>
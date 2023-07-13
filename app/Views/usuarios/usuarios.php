<link rel="stylesheet" href="<?php echo base_url('css/usuarios/usuarios.css') ?>">

<!-- TABLA MOSTRAR USUARIOS -->
<div id="content" class="p-4 p-md-5" style="background-color:rgba(0, 0, 0, 0.05);">
    <h2 class="text-center mb-4"><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/usuarioS-n.png') ?>" /> Usuarios del Sistema</h2>
    <div class="table-responsive p-2">
        <div class="d-flex justify-content-center align-items-center flex-wrap ocultar">
            <b class="fs-6 text-black"> Ocultar Columnas:</b> <a class="toggle-vis btn" data-column="0">#</a> - <a class="toggle-vis btn" data-column="3">Tipo Documento</a> - <a class="toggle-vis btn" data-column="4">Identificación</a> - <a class="toggle-vis btn" data-column="5">Rol</a>
        </div>
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

        <button type="button" class="btn btnRedireccion" data-bs-toggle="modal" data-bs-target="#agregarUsuario" onclick="seleccionarUsuario(<?= 0 . ',' . 1 ?>)"><img src="<?= base_url('img/plus.png') ?>" alt="icon-plus" width="20"> Agregar</button>
        <a href="<?= base_url('usuarios/eliminados') ?>" class="btn btnAccionF"> <img src="<?= base_url('img/delete.png') ?>" alt="icon-plus" width="20"> Eliminados</a>
    </div>
</div>

<!-- FORMULARIO PARA AGREGAR - EDITAR USUARIO -->
<form autocomplete="off" id="formularioUsuarios" enctype="multipart/form-data">
    <div class="modal fade" id="agregarUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <input type="text" name="id" id="id" hidden>
        <input type="text" name="tp" id="tp" hidden>
        <div class="modal-dialog modal-xl">
            <div class="body">
                <div class="modal-content">
                    <div class="modal-header flex align-items-center gap-3">
                        <div class="d-flex" style="width: 100%; justify-content: space-between; align-items: center;">
                            <img src="<?= base_url('img/logo_empresa.png') ?>" alt="Logo Empresa" class="logoEmpresa" width="100">
                            <h1 class="modal-title fs-5 d-flex align-items-center gap-2">
                                <img id="imgModal" src="" width="25" />
                                <span id="tituloModal"><!-- TEXTO DINAMICO--></span>
                            </h1>
                            <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">X</button>
                        </div>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="d-flex column-gap-3" style="width: 100%">
                                <div class="mb-3" style="width: 100%">
                                    <label for="nombre_p" class="col-form-label">Primer Nombre: <i class="asterisco" style="color:crimson;">*</i></label>
                                    <input type="text" name="nombre_p" class="form-control" id="nombreP" oninput="this.value = this.value.replace(/[^a-zA-Zñáéíóú ]/,'')">
                                </div>
                                <div class="mb-3" style="width: 100%">
                                    <label for="nombre_s" class="col-form-label">Segundo Nombre:</label>
                                    <input type="text" name="nombre_s" class="form-control" id="nombreS" oninput="this.value = this.value.replace(/[^a-zA-Zñáéíóú ]/,'')">
                                </div>
                                <div class="mb-3" style="width: 100%">
                                    <div class="mb-3">
                                        <label for="tipoDoc" class="col-form-label">Tipo Identificación: <i class="asterisco" style="color:crimson;">*</i></label>
                                        <select  class="form-select form-select" name="tipoDoc" id="tipoDoc">
                                            <option value="1" selected>Cedula de Ciudadania</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex column-gap-3" style="width: 100%">
                                <div class="mb-3" style="width: 100%">
                                    <label for="apellido_p" class="col-form-label">Primer Apellido: <i class="asterisco" style="color:crimson;">*</i></label>
                                    <input type="text" name="apellido_p" class="form-control" id="apellidoP" oninput="this.value = this.value.replace(/[^a-zA-Zñáéíóú ]/,'')">
                                </div>
                                <div class="mb-3" style="width: 100%">
                                    <label for="apellido_s" class="col-form-label">Segundo Apellido: <i class="asterisco" style="color:crimson;">*</i></label>
                                    <input type="text" name="apellido_s" class="form-control" id="apellidoS" oninput="this.value = this.value.replace(/[^a-zA-Zñáéíóú ]/,'')">
                                </div>
                                <div class="mb-3" style="width: 100%">
                                    <div class="">
                                        <label for="nIdenti" class="col-form-label">N° Identificación: <i class="asterisco" style="color:crimson;">*</i></label>
                                        <input type="number" name="nIdenti" class="form-control" id="nIdenti" minlength="9" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/,'')">
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
                                        <label for="rol" class="col-form-label">Tipo de Rol: <i class="asterisco" style="color:crimson;">*</i></label>
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
                                    <label id="labelNom" for="nombres" class="col-form-label"> Contraseña: <i class="asterisco" style="color:crimson;">*</i></label>
                                    <input type="password" name="contra" class="form-control" id="contra" minlength="5">
                                    <small class="normal">¡La contraseña debe contar con un minimo de 6 caracteres!</small>

                                    <div class="form-check" style="margin-top: 10px;">
                                        <input class="form-check-input" type="checkbox" value="" id="ver" onchange="verContrasena()">
                                        <label class="form-check-label" for="ver">
                                            Ver Contraseña
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3" style="width: 100%" id="divContras2">
                                    <div>
                                        <label for="nombres" class="col-form-label">Confirmar Contraseña: <i class="asterisco" style="color:crimson;">*</i></label>
                                        <input type="password" name="confirContra" class="form-control" id="confirContra" minlength="5">
                                    </div>
                                    <small id="msgConfir" class="normal"></small>
                                </div>
                                <div class="mb-3" style="width: 100%">
                                    <label for="nombres" id="fotoUsuario" class="col-form-label">Foto de Usuario:</label>
                                    <input type="file" name="foto" id="foto" class="form-control" accept="image/png">
                                </div>
                                <div class="mb-3" style="width: 100%" id="bloqueFoto">
                                    <img style=" width: auto; height: 100px;" alt="Foto Usuario" id="fotoPerfil" />
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                    <label class="campObl" style="color: gray; margin-inline-end: auto;">(*) Campos obligatorios.</label>
                        <button type="button" class="btn btnAccionF" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btnRedireccion" id="btnGuardar"><!-- TEXTO DIANMICO --></button>
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
            <div class="body-R">
                <div class="modal-content">
                    <div class="modal-header flex justify-content-between align-items-center">
                        <img src="<?= base_url('img/ingecosmo.png') ?>" alt="logo-empresa" width="60" height="60">
                        <h1 class="modal-title fs-5 text-center " id="tituloModal"><img src="<?= base_url('img/restorePass.png') ?>" alt="" width="30" height="30"> Restablecer
                            Contraseña</h1>
                        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close" onclick="limpiarCampos('contraRes', 'confirContraRes', 'idUsuario')">X</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="idUsuario" id="idUsuario">
                        <div class="container p-4" style="background-color: #dfe6f2;border-radius:10px;">
                            <div class="d-flex column-gap-3" style="width: 100%">
                                <div class="mb-3" style="width: 100%" id="divContras">
                                    <label id="labelNom" for="nombres" class="col-form-label"> Contraseña: <i  style="color:crimson;">*</i>
                                    </label>
                                    <div class="flex">
                                        <input type="password" name="contraRes" class="form-control" id="contraRes" minlength="5">
                                        <small class="normal">¡La contraseña debe contar con un minimo de 6
                                            caracteres!</small>
                                    </div>
                                    <div class="form-check" style="margin-top: 10px;">
                                        <input class="form-check-input" type="checkbox" value="" id="verModal" onchange="verContrasenaModal()">
                                        <label class="form-check-label" for="verModal">
                                            Ver Contraseña
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3" style="width: 100%" id="divContras2">
                                    <div>
                                        <label for="nombres" class="col-form-label">Confirmar Contraseña: <i  style="color:crimson;">*</i></label>
                                        <input type="password" name="confirContraRes" class="form-control" id="confirContraRes" minlength="5">
                                    </div>
                                    <small id="msgConfirRes" class="normal"></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <label style="color: gray; margin-inline-end: auto;">(*) Campos obligatorios.</label>
                        <button type="button" class="btn btnAccionF" data-bs-dismiss="modal" aria-label="Close" onclick="limpiarCampos('contraRes', 'confirContraRes')">Cerrar</button>
                        <input type="submit" class="btn btnRedireccion" value="Actualizar" id="btnActuContra"></input>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- MODAL AGREGAR - EDITAR TELEFONO -->
<div class="modal fade" id="agregarTelefono" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="body-R">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between align-items-center">
                    <img src="<?= base_url('img/ingecosmo.png') ?>" alt="logo-empresa" width="100" height="60">
                    <h1 class="modal-title fs-5 text-center " id="tituloModal"><img id="logoModal" src="<?= base_url('img/plus-b.png') ?>" alt="" width="30" height="30"> Agregar Telefono</h1>
                    <button type="button" class="btn" aria-label="Close" onclick="limpiarCampos('telefonoAdd', 'prioridad', 'tipoTele', 3)">X</button>
                </div>
                <input type="text" name="editTele" id="editTele" hidden>
                <div class="modal-body">
                    <div class="container p-4" style="background-color: #d9d9d9;border-radius:10px;">
                        <div class="mb-2 d-flex gap-3 flex-wrap" style="width: 100%;">
                            <div class="flex-grow-1">
                                <label for="telefonoAdd" class="col-form-label">Telefono: <i class="asterisco" style="color:crimson;">*</i></label>
                                <div>
                                    <input type="text" name="telefonoAdd" class="form-control" id="telefonoAdd" minlength="7" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/,'')">
                                    <small id="msgTel" class="invalido"></small>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <label for="prioridad" class="col-form-label">Tipo Telefono: <i class="asterisco" style="color:crimson;">*</i></label>
                                <select class="form-select form-control" name="tipoTele" id="tipoTele">
                                    <option selected value="">-- Seleccione --</option>
                                    <?php foreach ($tipoTele as $tipe) { ?>
                                        <option value="<?= $tipe['id'] ?>"><?= $tipe['nombre'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="flex-grow-1">
                                <label for="prioridad" class="col-form-label">Prioridad: <i class="asterisco" style="color:crimson;">*</i></label>
                                <select class="form-select form-control" name="prioridad" id="prioridad">
                                    <option selected value="">-- Seleccione --</option>
                                    <option value="P">Principal</option>
                                    <option value="S">Secundaria</option>
                                </select>
                            </div>
                        </div>
                        <div class="table-responsive" style="overflow:scroll-vertical;overflow-y: scroll !important; height: 150px;background-color:white;">
                            <table class="table table-bordered table-sm table-hover" id="tablePaises" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th>Telefono</th>
                                        <th>Tipo</th>
                                        <th>Prioridad</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="bodyTel">
                                    <tr class="text-center">
                                        <td colspan="4">NO HAY TELEFONOS</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <label class="campObl" style="color: gray; margin-inline-end: auto;">(*) Campos obligatorios.</label>
                    <button type="button" class="btn btnRedireccion" onclick="limpiarCampos('telefonoAdd', 'prioridad', 'tipoTele', 3)">Cerrar</button>
                    <button type="button" class="btn btnAccionF" id="btnAddTel">Agregar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL AGREGAR - EDITAR CORREO -->
<div class="modal fade" id="agregarCorreo" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="body-R">
            <div class="modal-content">
                <div class="modal-header flex justify-content-between align-items-center">
                    <img src="<?= base_url('img/ingecosmo.png') ?>" alt="logo-empresa" width="100" height="60">
                    <h1 class="modal-title fs-5 text-center " id="tituloModal"><img src="<?= base_url('img/plus-b.png') ?>" alt="" width="30" height="30"> Agregar Correo</h1>
                    <button type="button" class="btn" aria-label="Close" onclick="limpiarCampos('correoAdd', 'prioridadCorreo', '', 4)">X</button>
                </div>
                <input type="text" name="editCorreo" id="editCorreo" hidden>

                <div class="modal-body">

                    <div class="container p-4" style="background-color: #d9d9d9;border-radius:10px;">
                        <div class="mb-2 d-flex gap-3" style="width: 100%;">
                            <div class="d-flex gap-2" style="width: 100%;">
                                <label for="correoAdd" class="col-form-label">Correo:<i class="asterisco" style="color:crimson;">*</i></label>
                                <div>
                                    <input type="email" name="correoAdd" class="form-control" id="correoAdd" oninput="this.value = this.value.replace(/[^a-zA-Z0-9.@ñ]/,'')">
                                    <small id="msgCorreo" class="invalido"></small>
                                </div>
                            </div>
                            <div class="d-flex gap-2" style="width: 100%;">
                                <label for="prioridad" class="col-form-label">Prioridad:<i class="asterisco" style="color:crimson;">*</i></label>
                                <select class="form-select form-select" name="prioridadCorreo" id="prioridadCorreo">
                                    <option selected value="">-- Seleccione --</option>
                                    <option value="P">Principal</option>
                                    <option value="S">Secundaria</option>
                                </select>
                            </div>
                        </div>
                        <div class="table-responsive" style="overflow:scroll-vertical;overflow-y: scroll !important; height: 150px;background-color:white;">
                            <table class="table table-bordered table-sm table-hover" id="tablePaises" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th>Correo</th>
                                        <th>Prioridad</th>
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
                <label class="campObl" style="color: gray; margin-inline-end: auto;">(*) Campos obligatorios.</label>
                    <button type="button" class="btn btnRedireccion" onclick="limpiarCampos('correoAdd', 'prioridadCorreo', '', 4)">Cerrar</button>
                    <button type="button" class="btn btnAccionF" id="btnAddCorre">Agregar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Confirma Eliminar -->
<div class="modal fade" id="modalConfirmar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">

        <div class="modal-content" id="modalEliminarContentP">
            <div class="modalContenedorP">
                <div id="contenidoHeaderEliminarP" class="modal-header">
                    <img style=" width:80px; height:60px; margin-bottom: 0; " src="<?php echo base_url('/img/ingecosmo.png') ?>" />
                </div>

                <div class="contenidoEliminarP">
                    <div class="bloqueModalP">
                        <img style=" width:80px; height:60px; margin:10px; " src="<?php echo base_url('/img/icon-alerta.png') ?>" />
                        <p class="textoModalP">¿Estas seguro de eliminar este Usuario?</p>
                    </div>

                </div>
            </div>
            <div id="bloqueBtnP" class="modal-footer">
                <button id="btnNo" class="btn btnRedireccion" data-bs-dismiss="modal">Cerrar</button>
                <a id="btnSi" class="btn btnAccionF">Eliminar</a>
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
    var id_usuario = $('#id');
    let telefonos = [] //Telefonos del usuario.
    let correos = [] //Correos del usuario.
    var validTel = true
    var validCorreo = true
    var validIdent = true;
    var objCorreo = {
        id: 0,
        correo: '',
        prioridad: ''
    }
    var objTelefono = {
        id: 0,
        numero: '',
        tipo: '',
        prioridad: ''
    }

    //Marcar botones ocultar columnas
    var botones = $(".ocultar a");
    botones.click(function() {
        if ($(this).attr('class').includes('active')) {
            $(this).removeClass('active');
        } else {
            $(this).addClass('active');
        }
    })
    //Mostrar Ocultar Columnas
    $('a.toggle-vis').on('click', function(e) {
        e.preventDefault();
        // Get the column API object
        var column = tableUsuarios.column($(this).attr('data-column'));
        // Toggle the visibility
        column.visible(!column.visible());
    });
    //Ver contraseñas
    function verContrasena() {
        var password1, password2, check;
        password1 = document.getElementById("contra");
        password2 = document.getElementById("confirContra");
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
    //Ver contraseñas
    function verContrasenaModal() {
        var check, passwordModal1, passwordModal2;
        passwordModal1 = document.getElementById("contraRes");
        passwordModal2 = document.getElementById("confirContraRes");
        check = document.getElementById("verModal");
        if (check.checked == true) // Si la checkbox de mostrar contraseña está activada
        {
            passwordModal1.type = "text";
            passwordModal2.type = "text";
        } else // Si no está activada 
        {
            passwordModal1.type = "password";
            passwordModal2.type = "password";
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
                        '<button class="btn" onclick="seleccionarUsuario(' + data.id_usuario + ' , 2 )" data-bs-target="#agregarUsuario" data-bs-toggle="modal"><img src="<?php echo base_url('img/edit.svg') ?>" alt="Boton Editar" title="Editar Usuario"></button>' +
                        '<button class="btn" data-href=' + data.id_usuario + ' data-bs-toggle="modal" data-bs-target="#modalConfirmar"><img src="<?php echo base_url("img/delete.svg") ?>" alt="Boton Eliminar" title="Eliminar Usuario"></button>' +
                        '<button class="btn" data-bs-toggle="modal" data-bs-target="#cambiarContra" data-bs-target="#staticBackdrop" onclick=$("#idUsuario").val(' + data.id_usuario + ') ><img src="<?php echo base_url("img/restorePass.png") ?>" width="25" heigth="25"  title="Restablecer Contraseña"/></button>'
                    );
                },
            }
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },

    });
    //Limpiar campos de telefonos y correos
    function limpiarCampos(input1, input2, input3, accion) {
        if (accion == 3) {
            if (telefonos.length != 0) {
                principalT = telefonos.filter(tel => tel.prioridad == 'P')
                if (principalT.length == 0) {
                    return mostrarMensaje('error', '¡Debe tener un telefono principal!')
                } else {
                    $('#agregarTelefono').modal('hide')
                    // $('#fotoModal').attr('hidden', '')
                    $('#agregarUsuario').modal('show')

                }
            } else {
                $('#agregarTelefono').modal('hide')
                // $('#fotoModal').attr('hidden', '')
                $('#agregarUsuario').modal('show')

            }
        }
        if (accion == 4) {
            if (correos.length != 0) {
                principalC = correos.filter(correo => correo.prioridad == 'P')
                if (principalC.length == 0) {
                    return mostrarMensaje('error', '¡Debe tener un correo principal!')
                } else {
                    $('#agregarCorreo').modal('hide')
                    $('#agregarUsuario').modal('show')
                    // $('#fotoModal').attr('hidden')
                }
            } else {
                $('#agregarCorreo').modal('hide')
                $('#agregarUsuario').modal('show')
                // $('#fotoModal').attr('hidden')
            }
        }
        if (objCorreo.id != 0) {
            correos.push(objCorreo)
            guardarCorreo()
        }
        if (objTelefono.id != 0) {
            telefonos.push(objTelefono)
            guardarTelefono()
        }
        if (input1 == 0) {
            telefonos = []
            correos = []
        }
        objCorreo = {
            id: 0,
            correo: '',
            prioridad: ''
        }
        objTelefono = {
            id: 0,
            numero: '',
            tipo: '',
            prioridad: ''
        }
        $(`#${input1}`).val('')
        $(`#${input2}`).val('')
        $(`#${input3}`).val('')
        $('#msgConfirRes').text('')
        $('#msgConfir').text('')
        $('#msgTel').text('')
        $('#msgCorreo').text('')
        $('#FotoUsuario').text('')
        // $('#fotoModal').removeAttr('hidden')
        $('#foto').val('')
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
    $('#confirContra').on('input', function(e) {
        verifiContra(2, 'msgConfir', 'contra', 'confirContra')
    })
    $('#contra').on('input', function(e) {
        verifiContra(1, 'msgConfir', 'contra', 'confirContra')
    })
    $('#confirContraRes').on('input', function(e) {
        verifiContra(2, 'msgConfirRes', 'contraRes', 'confirContraRes')
    })
    $('#contraRes').on('input', function(e) {
        verifiContra(1, 'msgConfirRes', 'contraRes', 'confirContraRes')
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
                limpiarCampos()
                $('#tituloModal').text('Editar')
                $('#logoModal').attr('src', '<?php echo base_url('img/editar.png') ?>')
                $('#tp').val(2)
                $('#id').val(res[0]['id_usuario'])
                $('#nombreP').val(res[0]['nombre_p'])
                $('#nombreS').val(res[0]['nombre_s'])
                $('#apellidoP').val(res[0]['apellido_p'])
                $('#apellidoS').val(res[0]['apellido_s'])
                $('#tituloFoto').val(res[0]['nombre_p'] + ' ' + res[0]['nombre_s'] + ' ' + res[0]['apellido_p'] + ' ' + res[0]['apellido_s'])
                $('#tipoDoc').val(1)
                $('#nIdenti').val(res[0]['n_identificacion'])
                $('#rol').val(res[0]['id_rol'])
                $('#fotoModal').removeAttr('hidden')
                $('#bloqueFoto').removeAttr('hidden')
                $('#contra').val('')
                $('#divContras').attr('hidden', '')
                $('#divContras2').attr('hidden', '')
                $('#confirContra').val('')
                $('#btnGuardar').text('Actualizar')
                $('#fotoUsuario').text('Cambiar foto de Usuario:')
                $('.asterisco').hide()
                $('.campObl').hide()
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
                $('#imgModal').attr('src', '<?= base_url('img/editar1.png') ?>')
                var foto = '<?= base_url('usuarios/mostrarImagen/') ?>' + res[0]['id_usuario'];
                $('#fotoPerfil').attr('src', `${foto}`)
            })
        } else {
            //Insertar datos
            telefonos = []
            correos = []
            limpiarCampos(0)
            guardarCorreo()
            guardarTelefono()
            $('#tituloModal').text('Agregar')
            $('#logoModal').attr('src', '<?php echo base_url('img/plus-b.png') ?>')
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
            $('#fotoModal').attr('hidden', '')
            $('#bloqueFoto').attr('hidden', '')
            $('#contra').val('')
            $('#confirContra').val('')
            $('#divContras').removeAttr('hidden')
            $('#divContras2').removeAttr('hidden')
            $('#btnGuardar').text('Agregar')
            $('#fotoUsuario').text('Foto de Usuario:')
            $('#msgDoc').text('')
            $('#imgModal').attr('src', '<?= base_url('img/plus-b.png') ?>')
            $('.asterisco').show()
            $('.campObl').show()
        }
    }
    //Funcion para cambiar contraseña
    $('#formularioContraseñas').on('submit', function(e) {
        e.preventDefault()
        $('#btnGuardar').attr('disabled', '')
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
                    contraConfir
                },
                type: 'POST',
                dataType: 'json'
            }).done(function(data) {
                $('#cambiarContra').modal('hide')
                tableUsuarios.ajax.reload(null, false); //Recargar tabla
                ContadorPRC = 0
                limpiarCampos('msgConfirRes')
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
        $('#btnActuContra').attr('disabled', '')
        id = $('#id').val()
        nombreP = $('#nombreP').val()
        nombreS = $('#nombreS').val()
        apellidoP = $('#apellidoP').val()
        apellidoS = $('#apellidoS').val()
        tipoDoc = $('#tipoDoc').val()
        nIdenti = $('#nIdenti').val()
        telefono = $('#telefono').val()
        correo = $('#correo').val()
        rol = $('#rol').val()
        contra = $('#contra').val()
        confirContra = $('#confirContra').val()

        //Control de campos vacios
        if ([nombreP, apellidoP, apellidoS, tipoDoc, nIdenti, rol].includes('') || contra != confirContra || validIdent == false || validCorreo == false) {
            return mostrarMensaje('error', '¡Hay campos vacios o invalidos!')
        }  else {
            var formData = new FormData();
            formData.append('id', id);
            formData.append('tp', tp);
            formData.append('nombreP', nombreP);
            formData.append('nombreS', nombreS);
            formData.append('apellidoP', apellidoP);
            formData.append('apellidoS', apellidoS);
            formData.append('tipoDoc', tipoDoc);
            formData.append('nIdenti', nIdenti);
            formData.append('rol', rol);
            formData.append('contra', contra);
            formData.append('foto', $('#foto')[0].files[0]);
            var idUserT = ''
            $.ajax({
                url: '<?php echo base_url('usuarios/insertar') ?>',
                type: 'POST',
                data: formData,
                dataType: 'json',
                contentType: false, // Importante: desactiva el tipo de contenido predeterminado
                processData: false, // Importante: no proceses los datos

            }).done(function(data) {
                console.log(data)
                telefonos.forEach(tel => {
                    console.log(tel)
                    //Insertar Telefonos
                    formData.append('tp', tp);
                    formData.append('idUsuario', data);
                    formData.append('idTele', tel.id);
                    formData.append('numero', tel.numero);
                    formData.append('prioridad', tel.prioridad);
                    formData.append('tipoUsu', 7);
                    formData.append('tipoTel', tel.tipo);
                    $.ajax({
                        url: '<?php echo base_url('telefonos/insertar') ?>',
                        type: 'POST',
                        data: formData,
                        dataType: 'json',
                        contentType: false, // Importante: desactiva el tipo de contenido predeterminado
                        processData: false, // Importante: no proceses los datos
                        success: function(res) {
                            if (res != 1) {
                                mostrarMensaje('error', '¡Ha ocurrido un error!')
                            }
                        }
                    })
                });
                correos.forEach(correo => {
                    //Insertar Correos
                    formData.append('tp', tp);
                    formData.append('idUsuario', data);
                    formData.append('idCorreo', correo.id);
                    formData.append('correo', correo.correo);
                    formData.append('prioridad', correo.prioridad);
                    formData.append('tipoUsu', 7);
                    $.ajax({
                        url: '<?php echo base_url('email/insertar') ?>',
                        type: 'POST',
                        data: formData,
                        dataType: 'json',
                        contentType: false, // Importante: desactiva el tipo de contenido predeterminado
                        processData: false, // Importante: no proceses los datos
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
                    validTel = true
                    validCorreo = true
                } else {
                    validTel = true
                    validCorreo = true
                    mostrarMensaje('success', '¡Se ha Registrado el Usuario!')
                }
                limpiarCampos()
                $('#agregarUsuario').modal('hide')
                tableUsuarios.ajax.reload(null, false); //Recargar tabla
                ContadorPRC = 0
                $('#btnGuardar').removeAttr('disabled')
                $('#btnActuContra').removeAttr('disabled')
                $('#editTele').val('');
                objCorreo = {
                    id: 0,
                    correo: '',
                    prioridad: ''
                }
                objTelefono = {
                    id: 0,
                    numero: '',
                    tipo: '',
                    prioridad: ''
                }
            });
        };
    })
    // Agregar Telefono a la tabla
    $('#btnAddTel').on('click', function(e) {
        const numero = $('#telefonoAdd').val()
        const tipo = $('#tipoTele').val()
        const prioridad = $('#prioridad').val()
        const editTel = $('#editTele').val();

        const regex = /^\d{10,10}$/;
        if (!regex.test(parseInt(numero))) {
            return mostrarMensaje('error', '¡Telefono invalido!')
        }

        if ([numero, prioridad].includes('') || validTel == false) {
            return mostrarMensaje('error', '¡Hay campos vacios o invalidos!')
        }
        contador += 1
        let info = {
            id: [editTel].includes('') || editTel == 0 ? `${contador += 1}e` : editTel,
            tipo,
            numero,
            prioridad
        }
        let filtro = telefonos.filter(tel => tel.prioridad == 'P')
        let filtroTel = telefonos.filter(tel => tel.numero == info.numero)

        if (filtroTel.length > 0) {
            filtro = []
            $('#btnEditarTel').removeAttr('disabled')
            return mostrarMensaje('error', '¡Ya se agrego este numero de telefono!')
        }
        if (info.prioridad == 'S') {
            telefonos.push(info)
            $('#telefonoAdd').val('')
            $('#tipoTele').val('')
            $('#prioridad').val('')
            $('#editTele').val(0);
            objTelefono = {
                id: 0,
                numero: '',
                tipo: '',
                prioridad: ''
            }
            return guardarTelefono()
        } else if (filtro.length > 0) {
            filtro = []
            return mostrarMensaje('error', '¡Ya hay un telefono prioritario!')

        } else {
            $('#btnEditarTel').removeAttr('disabled')
            telefonos.push(info)
            $('#telefonoAdd').val('')
            $('#tipoTele').val('')
            $('#prioridad').val('')
            $('#editTele').val(0);
            objTelefono = {
                id: 0,
                numero: '',
                tipo: '',
                prioridad: ''
            }
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
        principal = telefonos.filter(tel => tel.prioridad == 'P')
        $('#telefono').val(principal[0]?.numero)
        var cadena
        if (telefonos.length == 0) {
            cadena += ` <tr class="text-center">
            <td colspan="4">NO HAY TELEFONOS</td>
            </tr>`
            $('#bodyTel').html(cadena)
        } else {
            for (let i = 0; i < telefonos.length; i++) {
                cadena += ` <tr class="text-center" id='${telefonos[i].id}'>
                                <td>${telefonos[i].numero}</td>
                                <td id=${telefonos[i].tipo}>${telefonos[i].tipo == 3 ? 'Celular' : 'Fijo'}</td>
                                <td id=${telefonos[i].prioridad}>${telefonos[i].prioridad == 'S' ? 'Secundaria' : 'Principal'}</td>  
                                <td>
                                    <button class="btn btnEditarTel" id="btnEditarTel${telefonos[i].id}" onclick="editarTelefono('${telefonos[i].id}')"><img src="<?= base_url('img/edit.svg') ?>" title="Editar Telefono">
                                    <button class="btn" onclick="eliminarTel('${telefonos[i].id}')"><img src="<?= base_url('img/delete.svg') ?>" title="Eliminar Telefono">
                                </td>
                            </tr>`
            }
        }
        $('#bodyTel').html(cadena)
    }
    //Editar Telefono
    function editarTelefono(id) {
        const fila = $(`#${id}`);
        const numero = fila.find('td').eq(0)
        const tipo = fila.find('td').eq(1)
        const prioridad = fila.find('td').eq(2)
        $('#telefonoAdd').val(numero.text());
        $('#tipoTele').val(tipo.attr('id'));
        $('#prioridad').val(prioridad.attr('id'));
        $('#editTele').val(fila.attr('id'));
        objTelefono = {
            id: fila.attr('id'),
            numero: numero.text(),
            tipo: tipo.attr('id'),
            prioridad: prioridad.attr('id')
        }
        telefonos = telefonos.filter(tel => tel.id != fila.attr('id'));
        guardarTelefono()
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
        const editCorreo = $('#editCorreo').val();

        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!regex.test(correo)) {
            validCorreo = false
            return mostrarMensaje('error', '¡Tipo de correo invalido!')
        }

        if ([correo, prioridad].includes('') || validCorreo == false) {
            return mostrarMensaje('error', '¡Hay campos vacios o invalidos!')
        }
        let info = {
            id: [editCorreo].includes('') || editCorreo == 0 ? `${contador += 1}e` : editCorreo,
            correo,
            prioridad
        }
        let filtro = correos.filter(correo => correo.prioridad == 'P')
        let filtroCorreo = correos.filter(correo => correo.correo == info.correo)

        if (filtroCorreo.length > 0) {
            filtro = []
            return mostrarMensaje('error', '¡Ya se agrego este correo!')
        }
        if (info.prioridad == 'S') {
            correos.push(info)
            $('#correoAdd').val('')
            $('#prioridadCorreo').val('')
            $('#editCorreo').val(0);
            objCorreo = {
                id: 0,
                correo: '',
                prioridad: ''
            }
            return guardarCorreo()
        } else if (filtro.length > 0) {
            filtro = []
            return mostrarMensaje('error', '¡Ya hay un correo prioritario!')
        } else {
            correos.push(info)
            $('#correoAdd').val('')
            $('#prioridadCorreo').val('')
            $('#editCorreo').val(0);
            objCorreo = {
                id: 0,
                correo: '',
                prioridad: ''
            }
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
        principal = correos.filter(correo => correo.prioridad == 'P')
        $('#email').val(principal[0]?.correo)
        var cadena
        if (correos.length == 0) {
            cadena += ` <tr class="text-center">
                            <td colspan="3">NO HAY CORREOS</td>
                        </tr>`
            $('#bodyCorre').html(cadena)
        } else {
            for (let i = 0; i < correos.length; i++) {
                cadena += ` <tr class="text-center" id='${correos[i].id}'>
                                <td>${correos[i].correo}</td>
                                <td id=${correos[i].prioridad} >${correos[i].prioridad == 'S' ? 'Secundaria' : 'Principal'}</td>
                                <td>
                                    <button class="btn" onclick="editarCorreo('${correos[i].id}')"><img src="<?= base_url('img/edit.svg') ?>" title="Editar Correo">
                                    <button class="btn" onclick="eliminarCorreo('${correos[i].id}')"><img src="<?= base_url('img/delete.svg') ?>" title="Eliminar Correo">
                                </td>
                            </tr>`
            }
        }
        $('#bodyCorre').html(cadena)
    }
    //Editar Correo
    function editarCorreo(id) {
        const fila = $(`#${id}`);
        const correo = fila.find('td').eq(0)
        const prioridad = fila.find('td').eq(1)
        $('#correoAdd').val(correo.text());
        $('#prioridadCorreo').val(prioridad.attr('id'));
        $('#editCorreo').val(fila.attr('id'));
        objCorreo = {
            id: fila.attr('id'),
            correo: correo.text(),
            prioridad: prioridad.attr('id')
        }
        correos = correos.filter(correo => correo.id != fila.attr('id'));
        guardarCorreo()
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
                        mostrarMensaje('success', '¡Se ha eliminado el correo!')
                    }
                }
            })
        }
        correos = correos.filter(correo => correo.id != id)
        guardarCorreo() //Actualizar tabla
    }
    //Cambiar estado de "Activo" a "Inactivo" 
    $('#modalConfirmar').on('shown.bs.modal', function(e) {
        $(this).find('#btnSi').attr('onclick', `EliminarUsuario(${$(e.relatedTarget).data('href')})`)
    })

    function EliminarUsuario(id) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('usuarios/cambiarEstado') ?>",
            data: {
                id,
                estado: 'I'
            }
        }).done(function(data) {
            ContadorPRC = 0
            mostrarMensaje('success', data)
            $('#modalConfirmar').modal('hide')
            tableUsuarios.ajax.reload(null, false)
        })
    }
</script>


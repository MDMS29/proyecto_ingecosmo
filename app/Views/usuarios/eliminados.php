<link rel="stylesheet" href="<?php echo base_url('css/usuarios/usuarios.css') ?>">

<!-- TABLA MOSTRAR USUARIOS -->
<div id="content" class="p-4 p-md-5" style="background-color:rgba(0, 0, 0, 0.05);">
    <h2 class="text-center mb-4"><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/usuarioS-n.png') ?>" /> Usuarios Eliminados</h2>
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
    <div class="footer-page">
        <button type="button" class="btn btnAccionF d-flex gap-2 align-items-center" onclick="window.history.back()"><img src="<?= base_url('img/regresa.png') ?>" alt="icon-plus" width="20"> Regresar</button>
    </div>
</div>

<div class="modal fade" id="verUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <input type="text" name="id" id="id" hidden>
    <input type="text" name="tp" id="tp" hidden>
    <div class="modal-dialog modal-xl">
        <div class="body">
            <div class="modal-content">
                <div class="modal-header flex align-items-center">
                    <div class="logo">
                        <img src="<?= base_url('img/logo_empresa.png') ?>" alt="Logo Empresa" class="logoEmpresa" width="100">
                    </div>
                    <h1 class="modal-title fs-5 text-center d-flex align-items-center gap-2"><i class="bi bi-eye-fill fs-4"></i><span id="tituloModal"><!-- TEXTO DINAMICO--></span></h1>
                    <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="d-flex column-gap-3" style="width: 100%">
                            <div class="mb-3" style="width: 100%">
                                <label for="nombre_p" class="col-form-label">Primer Nombre:</label>
                                <input type="text" name="nombre_p" class="form-control" id="nombreP" disabled>
                            </div>
                            <div class="mb-3" style="width: 100%">
                                <label for="nombre_s" class="col-form-label">Segundo Nombre:</label>
                                <input type="text" name="nombre_s" class="form-control" id="nombreS" disabled>
                            </div>
                            <div class="mb-3" style="width: 100%">
                                <div class="mb-3">
                                    <label for="tipoDoc" class="col-form-label">Tipo Identificación:</label>
                                    <select class="form-select form-select" name="tipoDoc" id="tipoDoc" disabled>
                                        <option value="1" selected>Cedula de Ciudadania</option>
                                        <option>-- Seleccione --</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex column-gap-3" style="width: 100%">
                            <div class="mb-3" style="width: 100%">
                                <label for="apellido_p" class="col-form-label">Primer Apellido:</label>
                                <input type="text" name="apellido_p" class="form-control" id="apellidoP" disabled>
                            </div>
                            <div class="mb-3" style="width: 100%">
                                <label for="apellido_s" class="col-form-label">Segundo Apellido:</label>
                                <input type="text" name="apellido_s" class="form-control" id="apellidoS" disabled>
                            </div>
                            <div class="mb-3" style="width: 100%">
                                <div class="">
                                    <label for="nIdenti" class="col-form-label">N° Identificación:</label>
                                    <input type="number" name="nIdenti" class="form-control" id="nIdenti" minlength="9" maxlength="11" disabled>
                                    <small id="msgDoc" class="invalido"></small>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex column-gap-3" style="width: 100%">
                            <div class="mb-3" style="width: 100%">
                                <label for="telefono" class="col-form-label">Telefono:</label>
                                <div class="d-flex">
                                    <input type="number" name="telefono" class="form-control" id="telefono" disabled>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#verTelefono" data-bs-target="#staticBackdrop" class="btn" style="border:none;background-color:gray;color:white;" title="Agregar Telefono">+</button>
                                </div>
                            </div>
                            <div class="mb-3" style="width: 100%">
                                <label for="email" class="col-form-label">Email:</label>
                                <div class="d-flex">
                                    <input type="email" name="email" class="form-control" id="email" disabled>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#verCorreos" data-bs-target="#staticBackdrop" class="btn" style="border:none;background-color:gray;color:white;" title="Agregar Correo">+</button>
                                </div>
                            </div>
                            <div class="mb-3" style="width: 100%">
                                <div class="mb-3">
                                    <label for="rol" class="col-form-label">Tipo de Rol:</label>
                                    <select class="form-select form-select" name="rol" id="rol" disabled>
                                        <option selected value="">-- Seleccione --</option>
                                        <?php foreach ($roles as $r) { ?>
                                            <option value="<?= $r['id_rol'] ?>"><?= $r['nombre'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btnAccionF" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL AGREGAR - EDITAR TELEFONO -->
<div class="modal fade" id="verTelefono" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="body-R">
            <div class="modal-content">
                <div class="modal-header flex justify-content-between align-items-center">
                    <img src="<?= base_url('img/ingecosmo.png') ?>" alt="logo-empresa" width="100" height="60">
                    <h1 class="modal-title fs-5 text-center " id="tituloModal"><i class="bi bi-eye-fill fs-4"></i> Ver Telefonos</h1>
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#verUsuario" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <div class="container p-4" style="background-color: #d9d9d9;border-radius:10px;">
                        <div class="table-responsive" style="overflow:scroll-vertical;overflow-y: scroll !important; height: 150px;background-color:white;">
                            <table class="table table-bordered table-sm table-striped" id="tablePaises" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th>Telefono</th>
                                        <th>Tipo</th>
                                        <th>Prioridad</th>
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
                    <button type="button" class="btn btnAccionF" data-bs-toggle="modal" data-bs-target="#verUsuario">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL VER CORREOS -->
<div class="modal fade" id="verCorreos" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="body-R">
            <div class="modal-content">
                <div class="modal-header flex justify-content-between align-items-center">
                    <img src="<?= base_url('img/ingecosmo.png') ?>" alt="logo-empresa" width="100" height="60">
                    <h1 class="modal-title fs-5 text-center " id="tituloModal"><i class="bi bi-eye-fill fs-4"></i> Ver Correos</h1>
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#verUsuario" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <div class="container p-4" style="background-color: #d9d9d9;border-radius:10px;">
                        <div class="table-responsive" style="overflow:scroll-vertical;overflow-y: scroll !important; height: 150px;background-color:white;">
                            <table class="table table-bordered table-sm table-striped" id="tablePaises" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th>Correo</th>
                                        <th>Prioridad</th>
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
                    <button type="button" class="btn btnAccionF" data-bs-toggle="modal" data-bs-target="#verUsuario">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Confirma Reestablecer -->
<div class="modal fade" id="modalConfirmar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">

        <div class="modal-content" id="modalEliminarContentP">
            <div class="modalContenedorP">
                <div id="contenidoHeaderEliminarP" class="modal-header">
                    <img style=" width:100px; margin-bottom: 0; " src="<?php echo base_url('/img/ingecosmo.png') ?>" />
                </div>

                <div class="contenidoEliminarP">
                    <div class="bloqueModalP">
                        <img style=" width:80px; height:60px; margin:10px; " src="<?php echo base_url('/img/icon-alerta.png') ?>" />
                        <p class="textoModalP">¿Estas seguro de reestablecer este Usuario?</p>
                    </div>

                </div>
            </div>
            <div id="bloqueBtnP" class="modal-footer">
                <button id="btnNo" class="btn btnAccionF" data-bs-dismiss="modal">Cerrar</button>
                <a id="btnSi" class="btn btnRedireccion">Reestablecer</a>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    var ContadorPRC = 0;
    let telefonos = [] //Telefonos del usuario.
    let correos = [] //Correos del usuario.
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
    // Tabla de usuarios
    var tableUsuarios = $("#tableUsuarios").DataTable({
        ajax: {
            url: '<?= base_url('usuarios/obtenerUsuarios') ?>',
            method: "POST",
            data: {
                estado: 'I'
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

                        '<button class="btn text-primary" onclick="seleccionarUsuario(' + data.id_usuario + ')" data-bs-target="#verUsuario" data-bs-toggle="modal" width="20"><i class="bi bi-eye-fill fs-4" title="Ver Usuario"></i></button>' +
                        '<button class="btn" data-href=' + data.id_usuario + ' data-bs-toggle="modal" data-bs-target="#modalConfirmar"><img src="<?php echo base_url("img/restore.png") ?>" alt="Boton Restablecer" title="Restablecer Usuario" width="20"></button>'
                    );
                },
            }
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }
    });

    function seleccionarUsuario(id) {
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('srchUsu/') ?>" + id + "/" + 0,
            dataType: 'json'
        }).done(function(res) {
            $('#tituloModal').text('Ver Usuario')
            $('#id').val(res[0]['id_usuario'])
            $('#nombreP').val(res[0]['nombre_p'])
            $('#nombreS').val(res[0]['nombre_s'])
            $('#apellidoP').val(res[0]['apellido_p'])
            $('#apellidoS').val(res[0]['apellido_s'])
            $('#tipoDoc').val(1)
            $('#nIdenti').val(res[0]['n_identificacion'])
            $('#rol').val(res[0]['id_rol'])
            $('#btnGuardar').text('Actualizar')
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('telefonos/obtenerTelefonosUser/') ?>' + id + '/' + 7,
                dataType: 'json',
                success: function(data) {
                    telefonos = data[0]
                    mostrarTelefonos()
                }
            })
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('email/obtenerEmailUser/') ?>' + id + '/' + 7,
                dataType: 'json',
                success: function(data) {
                    correos = data[0]
                    mostrarCorreo()
                }
            })
        })
    }
    // Funcion para mostrar correos en la tabla.
    function mostrarCorreo() {
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
                                <td>${correos[i].prioridad == 'S' ? 'Secundaria' : 'Principal'}</td>
                            </tr>`
            }
        }
        $('#bodyCorre').html(cadena)
    }
    // Funcion para mostrar telefonos en la tabla.
    function mostrarTelefonos() {
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
                                <td id=${telefonos[i].tipo}>${telefonos[i].tipo == 3 ? 'Celular' : 'Fijo'}</td>
                                <td>${telefonos[i].prioridad == 'S' ? 'Secundaria' : 'Principal'}</td>
                            </tr>`
            }
        }
        $('#bodyTel').html(cadena)
    }
    //Cambiar estado de "Inactivo" a "Activo"
    $('#modalConfirmar').on('shown.bs.modal', function(e) {
        $(this).find('#btnSi').attr('onclick', `ReestablecerUsuario(${$(e.relatedTarget).data('href')})`)
    })

    function ReestablecerUsuario(id) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('usuarios/cambiarEstado') ?>",
            data: {
                id,
                estado: 'A'
            }
        }).done(function(data) {
            mostrarMensaje('success', data)
            ContadorPRC = 0
            $('#modalConfirmar').modal('hide')
            tableUsuarios.ajax.reload(null, false)
        })
    }
</script>
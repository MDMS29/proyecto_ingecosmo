<link rel="stylesheet" href="<?php echo base_url('css/usuarios/usuarios.css') ?>">

<div id="content" class="p-4 p-md-5" style="background-color:rgba(0, 0, 0, 0.05);">
    <h2 class="text-center mb-4"><img style=" width:50px; height:50px; " src="<?php echo base_url('/img/Aliados.png') ?>" /> Aliados Eliminados</h2>
    <div class="table-responsive p-2">
        <div class="d-flex justify-content-center align-items-center flex-wrap ocultar">
            <b class="fs-6 text-black"> Ocultar Columnas:</b> <a class="toggle-vis btn" data-column="0">#</a> - <a class="toggle-vis btn" data-column="2">NIT</a> - <a class="toggle-vis btn" data-column="3">Dirección</a> - <a class="toggle-vis btn" data-column="4">Más Info</a>
        </div>
        <table class="table table-striped" id="tableAliados" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">Razón Social</th>
                    <th scope="col" class="text-center">NIT</th>
                    <th scope="col" class="text-center">Dirección</th>
                    <th scope="col" class="text-center">Más Info</th>
                    <th scope="col" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-center">
            </tbody>
        </table>
    </div>
    <div class="footer-page">
        <button type="button" class="btn btnAccionF d-flex gap-2 align-items-center" onclick="window.history.back()"><img src="<?= base_url('img/regresa.png') ?>" alt="icon-plus" width="20"> Regresar</button>
    </div>
</div>


<!-- -----modal----------     -->
<div class="modal fade" id="verAliado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <input type="text" name="id" id="id" value="0" hidden>
    <input type="text" name="tp" id="tp" hidden>
    <div class="modal-dialog modal-lg">
        <div class="body">
            <div class="modal-content">
                <div class="modal-header flex align-items-center gap-3">
                    <img src="<?= base_url('img/logo_empresa.png') ?>" alt="Logo Empresa" class="logoEmpresa" width="100">
                    <div class="d-flex align-items-center justify-content-center" style="width:auto;">
                        <i class="bi bi-eye-fill text-dark fs-4"></i>
                        <h1 class="modal-title fs-5 text-center" id="tituloModal"><!--TEXTO DINAMICO--></h1>
                    </div>
                    <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="d-flex column-gap-3" style="width: 100%; padding-inline:20px;">
                            <div class="mb-3" style="width: 100%;">
                                <label for="recipient-name" class="col-form-label" style="margin:0;">Razón Social:</label>
                                <input class="form-control" type="text" min='1' max='300' id="RazonSocial" name="RazonSocial" disabled>
                                <small id="msgRaSo" class="invalido"></small>

                                <input hidden id="tp" name="tp">
                                <input hidden id="id" name="id">
                            </div>

                            <div class="mb-3" style="width: 100%; ">
                                <label style="margin:0;" for="message-text" class="col-form-label">NIT:</label>
                                <input type="text" class="form-control" id="nit" name="nit" disabled></input>
                                <small id="msgNit" class="invalido"></small>
                            </div>
                        </div>

                        <div class="mb-3" style="width: 100%; padding-inline:20px;">
                            <label style="margin:0;" class="col-form-label" for="message-text">Dirección:</label>
                            <input class="form-control" id="direccion" name="direccion" disabled></input>
                        </div>

                        <div class="d-flex column-gap-3" style="width: 100%; padding-inline:20px;">
                            <div class="mb-3" style="width: 100%">
                                <label for="telefono" class="col-form-label">Teléfono:</label>
                                <div class="d-flex">
                                    <input type="number" name="telefono" class="form-control" id="telefono" disabled style="background-color: #eceaea;">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#verTelefonos" class="btn" style="border:none;background-color:gray;color:white;" title="Ver Telefonos">+</button>
                                </div>
                            </div>

                            <div class="mb-3" style="width: 100%">
                                <label for="email" class="col-form-label">Email:</label>
                                <div class="d-flex">
                                    <input type="email" name="email" class="form-control" id="email" disabled style="background-color: #eceaea;">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#verCorreos" class="btn" style="border:none;background-color:gray;color:white;" title="Ver Correos">+</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btnAccionF" data-bs-dismiss="modal" id="btnCerrar">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL AGREGAR - EDITAR TELEFONO -->
<div class="modal fade" id="verTelefonos" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="body-R">
            <div class="modal-content">
                <div class="modal-header flex justify-content-between align-items-center">
                    <img src="<?= base_url('img/logo_empresa.png') ?>" alt="Logo Empresa" class="logoEmpresa" width="100">
                    <div class="d-flex align-items-center justify-content-center" style="width:auto;">
                        <i class="bi bi-eye-fill fs-4 text-dark"></i>
                        <h1 class="modal-title fs-5 text-center" id="tituloModal"> Ver Teléfono</h1>
                    </div>
                    <button type="button" id="btnCerrarTel0" class="btn" data-bs-toggle="modal" data-bs-target="#verAliado" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <div class="container p-4" style="background-color: #d9d9d9;border-radius:10px;">
                        <div class="table-responsive" style="overflow:scroll-vertical;overflow-y: scroll !important; height: 150px;background-color:white;">
                            <table class="table table-bordered table-sm table-hover" id="tablePaises" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th>Teléfono</th>
                                        <th>Prioridad</th>
                                    </tr>
                                </thead>
                                <tbody id="bodyTel">
                                    <tr class="text-center">
                                        <td colspan="3">NO HAY TELÉFONOS</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btnAccionF" id="btnCerrarTel1" data-bs-toggle="modal" data-bs-target="#verAliado">Cerrar</button>
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
                    <img src="<?= base_url('img/logo_empresa.png') ?>" alt="Logo Empresa" class="logoEmpresa" width="100">
                    <div class="d-flex align-items-center justify-content-center" style="width:auto;">
                        <i class="bi bi-eye-fill fs-4 text-dark"></i>
                        <h1 class="modal-title fs-5 text-center" id="tituloModal"> Ver Correo</h1>
                    </div>
                    <button type="button" id="btnCerrarCorreo0" class="btn" data-bs-toggle="modal" data-bs-target="#verAliado" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <div class="container p-4" style="background-color: #d9d9d9;border-radius:10px;">
                        <div class="table-responsive" style="overflow:scroll-vertical;overflow-y: scroll !important; height: 150px;background-color:white;">
                            <table class="table table-bordered table-sm table-hover" id="tablePaises" width="100%" cellspacing="0">
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
                    <button type="button" class="btn btnAccionF" id="btnCerrarCorreo1" data-bs-toggle="modal" data-bs-target="#verAliado">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Confirma Restablecer -->
<div class="modal fade" id="modalConfirmar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">

        <div class="modal-content" id="modalEliminarContentP">
            <div class="modalContenedorP">
                <div id="contenidoHeaderEliminarP" class="modal-header">
                    <img style=" width:100px;  margin-bottom: 0px; " src="<?php echo base_url('/img/ingecosmo.png') ?>" />
                </div>

                <div class="contenidoEliminarP">
                    <div class="bloqueModalP">
                        <img style=" width:80px; height:60px; margin:10px; " src="<?php echo base_url('/img/icon-alerta.png') ?>" />
                        <p class="textoModalP">¿Estas seguro de restablecer este Aliado?</p>
                    </div>

                </div>
            </div>
            <div id="bloqueBtnP" class="modal-footer">
                <button id="btnNo" class="btn btnAccionF" data-bs-dismiss="modal">Cerrar</button>
                <a id="btnSi" class="btn btnRedireccion">Restablecer</a>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    var ContadorPRC = 0;
    let telefonos = [] //Telefonos del Aliados.
    let correos = [] //Correos del Aliados.

    //Mostrar Ocultar Columnas
    $('a.toggle-vis').on('click', function(e) {
        e.preventDefault();
        // Get the column API object
        var column = tableAliados.column($(this).attr('data-column'));
        // Toggle the visibility
        column.visible(!column.visible());
    });
    var botones = $(".ocultar a");
    botones.click(function() {
        if ($(this).attr('class').includes('active')) {
            $(this).removeClass('active');
        } else {
            $(this).addClass('active');
        }
    })
    // Tabla de Aliados
    var tableAliados = $("#tableAliados").DataTable({
        ajax: {
            url: '<?= base_url('aliados/obtenerAliados') ?>',
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
                data: 'razon_social'
            },
            {
                data: 'n_identificacion'
            },
            {
                data: 'direccion'
            },
            {
                data: null,
                render: function(data, type, row) {
                    return (
                        '<button class="btn" onclick="verTelefonos(' + data.id_tercero + ')" title="Ver Telefonos" data-bs-target="#verTelefonos" data-bs-toggle="modal"><i class="bi bi-telephone text-info fw-2"></i></button>' +

                        '<button class="btn" onclick="verCorreos(' + data.id_tercero + ')" title="Ver Correos" data-bs-target="#verCorreos" data-bs-toggle="modal"><i class="bi bi-envelope text-warning fw-2"></i></button>'
                    );
                }
            },
            {
                data: null,
                render: function(data, type, row) {
                    return (
                        '<button class="btn text-primary" onclick="seleccionarAliado(' + data.id_tercero + ')" data-bs-target="#verAliado" data-bs-toggle="modal" width="20"><i class="bi bi-eye-fill fs-4"></i></button>' +
                        '<button class="btn" data-href=' + data.id_tercero + ' data-bs-toggle="modal" data-bs-target="#modalConfirmar"><img src="<?php echo base_url("img/restore.png") ?>" alt="Boton Eliminar" title="Activar Aliado" width="20"></button>'
                    );
                },
            }
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }
    });

    function verTelefonos(id) {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('telefonos/obtenerTelefonosUser/') ?>' + id + '/' + 56,
            dataType: 'json',
            success: function(data) {
                telefonos = data[0]
                mostrarTelefonos()
                $('#btnCerrarTel0').removeAttr('data-bs-target')
                $('#btnCerrarTel1').removeAttr('data-bs-target')
                $('#btnCerrarTel0').attr('data-bs-dismiss', 'modal')
                $('#btnCerrarTel1').attr('data-bs-dismiss', 'modal')
            }
        })
    }

    function verCorreos(id) {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('email/obtenerEmailUser/') ?>' + id + '/' + 56,
            dataType: 'json',
            success: function(data) {
                correos = data[0]
                mostrarCorreo()
                $('#btnCerrarCorreo0').removeAttr('data-bs-target')
                $('#btnCerrarCorreo1').removeAttr('data-bs-target')
                $('#btnCerrarCorreo0').attr('data-bs-dismiss', 'modal')
                $('#btnCerrarCorreo1').attr('data-bs-dismiss', 'modal')
            }
        })
    }

    function seleccionarAliado(id) {
        //Actualizar datos
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('/aliados/buscarAliado/') ?>" + id + '/' + 0 + '/' + 0,
            dataType: 'json',
            success: function(res) {
                $('#tituloModal').text('Ver Aliado')
                $('#tp').val(2)
                $('#id').val(res[0]['id_tercero'])
                $('#RazonSocial').val(res[0]['razon_social'])
                $('#nit').val(res[0]['n_identificacion'])
                $('#direccion').val(res[0]['direccion'])
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('telefonos/obtenerTelefonosUser/') ?>' + id + '/' + 56,
                    dataType: 'json',
                    success: function(data) {
                        telefonos = data[0]
                        mostrarTelefonos()
                    }
                })
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('email/obtenerEmailUser/') ?>' + id + '/' + 56,
                    dataType: 'json',
                    success: function(data) {
                        correos = data[0]
                        mostrarCorreo()
                    }
                })
                $('#btnCerrarCorreo0').removeAttr('data-bs-dismiss')
                $('#btnCerrarCorreo1').removeAttr('data-bs-dismiss')
                $('#btnCerrarCorreo0').attr('data-bs-target', '#verAliado')
                $('#btnCerrarCorreo1').attr('data-bs-target', '#verAliado')

                $('#btnCerrarTel0').removeAttr('data-bs-dismiss')
                $('#btnCerrarTel1').removeAttr('data-bs-dismiss')
                $('#btnCerrarTel0').attr('data-bs-target', '#verAliado')
                $('#btnCerrarTel1').attr('data-bs-target', '#verAliado')
            }
        })
    }
    // Funcion para mostrar correos en la tabla.
    function mostrarCorreo() {
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
        principal = telefonos.filter(tel => tel.prioridad == 'P')
        $('#telefono').val(principal[0]?.numero)
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
                                <td>${telefonos[i].prioridad == 'S' ? 'Secundaria' : 'Principal'}</td>
                            </tr>`
            }
        }
        $('#bodyTel').html(cadena)
    }

    //Cambiar estado de "Inactivo" a "Activo"
    $('#modalConfirmar').on('shown.bs.modal', function(e) {
        $(this).find('#btnSi').attr('onclick', `RestablecerAliado(${$(e.relatedTarget).data('href')})`)
    })

    function RestablecerAliado(id) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('aliados/cambiarEstado') ?>",
            data: {
                id,
                estado: 'A'
            }
        }).done(function(data) {
            mostrarMensaje('success', data)
            ContadorPRC = 0
            $('#modalConfirmar').modal('hide')
            tableAliados.ajax.reload(null, false)
        })
    }
</script>
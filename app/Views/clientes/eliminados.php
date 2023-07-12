<link rel="stylesheet" href="<?php echo base_url("css/proveedores_clientes/proveedores_cliente.css") ?>">

<div id="content" class="p-4 p-md-5" style="background-color:rgba(0, 0, 0, 0.05);">
    <h2 class="text-center mb-4"><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/clientes-b.png') ?>" /> Clientes Eliminados</h2>
    <div class="table-responsive p-2">
        <div class="d-flex justify-content-center align-items-center flex-wrap ocultar">
            <b class="fs-6 text-black"> Ocultar Columnas:</b> <a class="toggle-vis btn" data-column="0">#</a> - <a class="toggle-vis btn" data-column="3">Tipo Documento</a> - <a class="toggle-vis btn" data-column="4">Identificación</a> - <a class="toggle-vis btn" data-column="5">Direccion</a> - <a class="toggle-vis btn" data-column="6">Más Info</a>
        </div>
        <table class="table table-striped" id="tableClientes" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">Nombres</th>
                    <th scope="col" class="text-center">Apellidos</th>
                    <th scope="col" class="text-center">Tipo de Documento</th>
                    <th scope="col" class="text-center">No. Documento</th>
                    <th scope="col" class="text-center">Direccion</th>
                    <th scope="col" class="text-center">Más Info</th>
                    <th scope="col" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php $contador = 0 ?>
                <?php if (empty($clientes)) { ?>
                    <tr>
                        <td class="text-center" colspan="7">
                            <h3>¡No hay Clientes Eliminados!</h3>
                        </td>
                    </tr>
                <?php } ?>
                <!-- texto dinamico -->
            </tbody>
        </table>
    </div>

    <div class="footer-page">
        <button type="button" class="btn btnAccionF d-flex gap-2 align-items-center" onclick="window.history.back()"><img src="<?= base_url('img/regresa.png') ?>" alt="icon-plus" width="20"> Regresar</button>
    </div>
</div>


<!-- MODAL VER CLIENTE -->

<div class="modal fade" id="verCliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="body-R">

            <div class="modal-content">
                <div class="modal-header" id="modalHeader">
                    <img src="<?php echo base_url('img/logo_empresa.png') ?>" width="100" />

                    <div class="d-flex align-items-center justify-content-center" style="width:auto;">
                        <i class="bi bi-eye-fill fs-4 text-dark"></i>
                        <h1 class="modal-title mx-1 fs-5" id="tituloModal">Ver Cliente</h1>
                    </div>

                    <button type="button" style="margin:0;" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form>
                        <div class="d-flex column-gap-3" style="width: 100%">
                            <div class="mb-3" style="width: 100%;">
                                <label class="col-form-label" for="recipient-name" style="margin:0;">Primer Nombre:</label>
                                <input class="form-control" type="text" min='1' max='300' id="nombreP" name="nombreP" disabled>
                                <input hidden id="tp" name="tp">
                                <input hidden id="id" name="id">
                            </div>

                            <div class="mb-3" style="width: 100%;">
                                <label class="col-form-label" style="margin:0;" for="message-text">Segundo Nombre:</label>
                                <input class="form-control" id="nombreS" name="nombreS" disabled>
                            </div>

                            <div class="mb-3" style="width: 100%;">
                                <label class="col-form-label" style="margin:0;" for="message-text">Primer Apellido:</label>
                                <input class="form-control" id="apellidoP" name="apellidoP" disabled>
                            </div>
                        </div>

                        <div class="d-flex column-gap-3" style="width: 100%">
                            <div class="mb-3" style="width: 100%;">
                                <label class="col-form-label" style="margin:0;" for="message-text">Segundo Apellido:</label>
                                <input class="form-control" id="apellidoS" name="apellidoS" disabled>
                            </div>

                            <div class="mb-3" style="width: 100%;">
                                <label class="col-form-label" style="margin:0;" for="tipoDoc">Tipo Identificación:</label>
                                <select class="form-select form-select form-control" name="tipoDoc" id="tipoDoc" disabled>
                                    <option value="1" selected>Cedula de Ciudadania</option>
                                    <option>-- Seleccione --</option>
                                </select>
                            </div>

                            <div class="mb-3" style="width: 100%;">
                                <label class="col-form-label" style="margin:0;" for="message-text">N° Identificacion:</label>
                                <input class="form-control" id="nIdenti" name="nIdenti" disabled>
                                <small id="msgDoc" class="invalido"></small>
                            </div>
                        </div>

                        <div class="d-flex column-gap-3" style="width: 100%">
                            <div class="mb-3" style="width: 100%;">
                                <label class="col-form-label" style="margin:0;" for="message-text">Direccion:</label>
                                <input class="form-control" id="direccion" name="direccion" disabled>
                            </div>

                            <div class="mb-3" style="width: 100%">
                                <label for="telefono" class="col-form-label">Telefono:</label>
                                <div class="d-flex">
                                    <input type="number" name="telefono" class="form-control" id="telefono" disabled>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#verTelefono" data-bs-target="#staticBackdrop" class="btn" style="border:none;background-color:gray;color:white;" title="Ver Telefono">+</button>
                                </div>
                            </div>

                            <div class="mb-3" style="width: 100%">
                                <label for="email" class="col-form-label">Email:</label>
                                <div class="d-flex">
                                    <input type="email" name="email" class="form-control" id="email" disabled>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#verCorreo" data-bs-target="#staticBackdrop" class="btn" style="border:none;background-color:gray;color:white;" title="Ver Correo">+</button>
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

<!-- MODAL TELEFONO -->
<div class="modal fade" id="verTelefono" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header flex justify-content-between align-items-center">
                <img src="<?= base_url('img/ingecosmo.png') ?>" alt="logo-empresa" width="100" height="60">
                <h1 class="modal-title fs-5 text-center " id="tituloModal">
                    <i class="bi bi-eye-fill fs-4 text-dark"></i>
                    Ver Telefonos
                </h1>
                <button type="button" class="btn" id="btnCerrarTel0" data-bs-toggle="modal" data-bs-target="#verCliente" aria-label="Close">X</button>
            </div>
            <input type="text" name="editTele" id="editTele" hidden>
            <div class="modal-body">
                <div class="container p-4" style="background-color: #d9d9d9;border-radius:10px;">
                    <div class="table-responsive" style="overflow:scroll-vertical;overflow-y: scroll !important; height: 150px;background-color:white;">
                        <table class="table table-bordered table-sm table-hover" id="tablePaises" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th>Telefono</th>
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
                <button type="button" class="btn btnAccionF" id="btnCerrarTel1" data-bs-toggle="modal" data-bs-target="#verCliente">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL CORREO-->
<div class="modal fade" id="verCorreo" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header flex justify-content-between align-items-center">
                <img src="<?= base_url('img/ingecosmo.png') ?>" alt="logo-empresa" width="60" height="60">
                <h1 class="modal-title fs-5 text-center " id="tituloModal"><i class="bi bi-eye-fill fs-4 text-dark"></i> Ver Correos</h1>
                <button type="button" class="btn" id="btnCerrarCorreo0" data-bs-toggle="modal" data-bs-target="#verCliente" aria-label="Close">X</button>
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
                <button type="button" id="btnCerrarCorreo1" class="btn btnAccionF" data-bs-toggle="modal" data-bs-target="#verCliente">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal Confirma Reestablecer -->
<div class="modal fade" id="modalActivarP" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">

        <div class="modal-content" id="modalEliminarContentP">
            <div class="modalContenedorP">
                <div id="contenidoHeaderEliminarP" class="modal-header">
                    <img style=" width:100px;  margin-bottom: 0; " src="<?php echo base_url('/img/ingecosmo.png') ?>" />
                </div>

                <div class="contenidoEliminarP">
                    <div class="bloqueModalP">
                        <img style=" width:80px; height:60px; " src="<?php echo base_url('/img/icon-alerta.png') ?>" />
                        <p class="textoModalP">¿Estas seguro de reestablecer este Cliente?</p>
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
    ContadorPRC = 0
    let telefonos = [] //Telefonos del cliente.
    let correos = [] //Correos del cliente.

    //Mostrar Ocultar Columnas
    $('a.toggle-vis').on('click', function(e) {
        e.preventDefault();
        // Get the column API object
        var column = tableClientes.column($(this).attr('data-column'));
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


    //Cambiar estado de "Inactivo" a "Activo"
    $('#modalActivarP').on('shown.bs.modal', function(e) {
        $(this).find('#btnSi').attr('onclick', `ReestablecerCLiente(${$(e.relatedTarget).data('href')})`)
    })

    $('.btnNo').click(function() {
        $("#modalActivarP").modal("hide");
    });


    function ReestablecerCLiente(id) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('clientes/cambiarEstado') ?>",
            data: {
                id,
                estado: 'A'
            }
        }).done(function(data) {
            mostrarMensaje('success', data)
            ContadorPRC = 0
            $('#modalActivarP').modal('hide')
            tableClientes.ajax.reload(null, false)
        })
    }

    // ------------------------------ estructura Tabla ------------------------------------- 
    // Obtener email principal cliente
    var emailTable = [];
    var telefonoTable = [];

    // Tabla   
    var tableClientes = $("#tableClientes").DataTable({
        ajax: {
            url: '<?= base_url('clientes/obtenerClientes') ?>',
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
                data: 'tipoDoc'
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
                        '<button class="btn" onclick="verTelefonos(' + data.id_tercero + ')" title="Ver Telefonos" data-bs-target="#verTelefono" data-bs-toggle="modal"><i class="bi bi-telephone text-info fw-2"></i></button>' +

                        '<button class="btn" onclick="verCorreos(' + data.id_tercero + ')" title="Ver Correos" data-bs-target="#verCorreo" data-bs-toggle="modal"><i class="bi bi-envelope text-warning fw-2"></i></button>'
                    );
                }
            },
            {
                data: null,
                render: function(data, type, row) {
                    return (
                        '<button class="btn text-primary" onclick="seleccionarCliente(' + data.id_tercero + ')" data-bs-target="#verCliente" data-bs-toggle="modal" width="20"><i class="bi bi-eye-fill fs-4"></i></button>' +
                        '<button class="btn" data-href=' + data.id_tercero + ' data-bs-toggle="modal" data-bs-target="#modalActivarP"><img src="<?php echo base_url("img/restore.png") ?>" alt="Boton Restablecer" title="Restablecer Cliente" width="20"></button>'
                    );
                },
            }
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
    });


    function seleccionarCliente(id) {
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('srchCli/') ?>" + id + "/" + 0,
            dataType: 'json',
        }).done(function(res) {
            $('#tituloModal').text('Ver Cliente')
            $('#id').val(res[0]['id_tercero'])
            $('#nombreP').val(res[0]['nombre_p'])
            $('#nombreS').val(res[0]['nombre_s'])
            $('#apellidoP').val(res[0]['apellido_p'])
            $('#apellidoS').val(res[0]['apellido_s'])
            $('#tipoDoc').val(1)
            $('#nIdenti').val(res[0]['n_identificacion'])
            $('#direccion').val(res[0]['direccion'])
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('telefonos/obtenerTelefonosUser/') ?>' + id + '/' + 5,
                dataType: 'json',
                success: function(data) {
                    telefonos = data[0]
                    mostrarTelefonos()
                }
            })
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('email/obtenerEmailUser/') ?>' + id + '/' + 5,
                dataType: 'json',
                success: function(data) {
                    correos = data[0]
                    mostrarCorreo()
                }
            })
            $('#btnCerrarCorreo0').removeAttr('data-bs-dismiss')
            $('#btnCerrarCorreo1').removeAttr('data-bs-dismiss')
            $('#btnCerrarCorreo0').attr('data-bs-target', '#verCliente')
            $('#btnCerrarCorreo1').attr('data-bs-target', '#verCliente')

            $('#btnCerrarTel0').removeAttr('data-bs-dismiss')
            $('#btnCerrarTel1').removeAttr('data-bs-dismiss')
            $('#btnCerrarTel0').attr('data-bs-target', '#verCliente')
            $('#btnCerrarTel1').attr('data-bs-target', '#verCliente')
        })
    }

    // ---------------------------mostrar correos y telefonos-----------------------------
    function verTelefonos(id) {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('telefonos/obtenerTelefonosUser/') ?>' + id + '/' + 5,
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
            url: '<?php echo base_url('email/obtenerEmailUser/') ?>' + id + '/' + 5,
            dataType: 'json',
            success: function(data) {
                correos = data[0]
                mostrarCorreo()
                $('#verCorreo').removeAttr('data-bs-backdrop')
                $('#btnCerrarCorreo0').removeAttr('data-bs-target')
                $('#btnCerrarCorreo1').removeAttr('data-bs-target')
                $('#btnCerrarCorreo0').attr('data-bs-dismiss', 'modal')
                $('#btnCerrarCorreo1').attr('data-bs-dismiss', 'modal')
            }
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
                                <td>${telefonos[i].prioridad == 'S' ? 'Secundaria' : 'Principal'}</td>
                            </tr>`
            }
        }
        $('#bodyTel').html(cadena)
    }
</script>
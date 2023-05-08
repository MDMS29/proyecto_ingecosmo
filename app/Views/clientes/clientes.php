<link rel="stylesheet" href="<?php echo base_url("css/proveedores_clientes/proveedores_cliente.css") ?>">

<div id="content" class="p-4 p-md-5" style="background-color:rgba(0, 0, 0, 0.002);">
    <h2 class="text-center mb-4"><img style=" width:40px; height:40px; " src="<?php echo base_url('/icons/clientes-b.png') ?>" /> Clientes</h2>
    <div class="table-responsive p-2">
        <table class="table table-striped" id="tableClientes" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">Nombres</th>
                    <th scope="col" class="text-center">Apellidos</th>
                    <th scope="col" class="text-center">Tipo de Documento</th>
                    <th scope="col" class="text-center">No. Documento</th>
                    <th scope="col" class="text-center">Direccion</th>
                    <th scope="col" class="text-center">Telefono</th>
                    <th scope="col" class="text-center">Correo</th>
                    <th scope="col" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <!-- TABLA CLIENTES -->
            </tbody>
        </table>
    </div>
    <div class="footer-page">
        <button class="btn btnRedireccion" data-bs-toggle="modal" data-bs-target="#agregarCliente" onclick="seleccionarCliente(<?= 0 . ',' . 1 ?>)"><img src="<?= base_url('icons/plus.png') ?>" alt="icon-plus" width="20"> Agregar</button>

        <a href="<?php echo base_url('/clientes/eliminados'); ?>" class="btn btnAccionF"> <img src="<?= base_url('icons/delete.png') ?>" alt="icon-plus" width="20"> Eliminados</a>
    </div>
</div>


<!-- -----modal----------     -->
<form method="POST" action="<?php echo base_url(); ?>clientes/insertar" autocomplete="off">

    <div class="modal fade" id="agregarCliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="body">

                <div class="modal-content">
                    <div class="modal-header" id="modalHeader">

                        <img style=" width:60px; height:60px; " src="<?php echo base_url('/img/ingecosmo.jpg') ?>" />

                        <div id="modalHeader2" class="d-flex align-items-center justify-content-center" style="width:auto;">
                            <img id="logoModal" src="<?= base_url('icons/plus-b.png') ?>" alt="icon-plus" width="20">
                            <h1 class="modal-title fs-5" id="tituloModal">Agregar</h1>
                        </div>

                        <button type="button" style="margin:0;" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form>
                            <div class="d-flex column-gap-3" style="width: 100%">
                                <div class="mb-3" style="width: 100%;">
                                    <label class="col-form-label" for="recipient-name" style="margin:0;">Primer Nombre:</label>
                                    <input class="form-control" type="text" min='1' max='300' id="nombreP" name="nombreP">
                                    <input hidden id="tp" name="tp">
                                    <input hidden id="id" name="id">
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
                                    <select class="form-select form-select" name="tipoDoc" id="tipoDoc">
                                        <option value="1" selected>Cedula de Ciudadania</option>
                                        <option>-- Seleccione --</option>
                                    </select>
                                </div>

                                <div class="mb-3" style="width: 100%;">
                                    <label class="col-form-label" style="margin:0;" for="message-text">No. Documento:</label>
                                    <input class="form-control" id="Nidentificacion" name="Nidentificacion"></input>
                                </div>
                            </div>

                            <div class="d-flex column-gap-3" style="width: 100%">
                                <div class="mb-3" style="width: 100%;">
                                    <label class="col-form-label" style="margin:0;" for="message-text">Direccion:</label>
                                    <input class="form-control" id="direccion" name="direccion"></input>
                                </div>

                                <div class="mb-3" style="width: 100%;">
                                    <label class="col-form-label" style="margin:0;" for="message-text">Telefono:</label>
                                    <input class="form-control" id="numero" name="numero"></input>
                                </div>

                                <div class="mb-3" style="width: 100%;">
                                    <label class="col-form-label" style="margin:0;" for="message-text">Correo:</label>
                                    <input class="form-control" id="correo" name="correo"></input>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btnRedireccion" data-bs-dismiss="modal" id="btnCerrar">Cerrar</button>
                        <button type="submit" class="btn btnAccionF" id="btnGuardar">Agregar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Modal Confirma Eliminar -->
<div class="modal fade" id="modalConfirmaP" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">

        <div class="modal-content" id="modalEliminarContentP">
            <div class="modalContenedorP">
                <div id="contenidoHeaderEliminarP" class="modal-header">
                    <img style=" width:80px; height:60px; margin-bottom: 0; " src="<?php echo base_url('/img/ingecosmo.png') ?>" />
                    <button type="button" style="margin:0;" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> 
                </div>

                <div class="contenidoEliminarP">
                    <div class="bloqueModalP">
                        <img style=" width:80px; height:60px; margin:10px; " src="<?php echo base_url('/icons/icon-alerta.png') ?>" />
                        <p class="textoModalP">¿Estas seguro de eliminar este Cliente?</p>
                    </div>

                </div>
            </div>
            <div id="bloqueBtnP" class="modal-footer">
                <button id="btnNo" class="btn btnRedireccion" data-dismiss="modal">Cerrar</button>
                <a id="btnSi" class="btn btnAccionF">Eliminar</a>
            </div>

        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // variables
    var ContadorPRC = 0

    //Cambiar estado de "Activo" a "Inactivo" 
    $('#modalConfirmaP').on('shown.bs.modal', function(e) {
        $(this).find('#btnSi').attr('onclick', `EliminarCliente(${$(e.relatedTarget).data('href')})`)
    })

    function EliminarCliente(id) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('clientes/cambiarEstado') ?>",
            data: {
                id,
                estado: 'I'
            }
        }).done(function(data) {
            mostrarMensaje('success', data)
            $('#modalConfirmaP').modal('hide')
            tableClientes.ajax.reload(null, false)
        })
    }

    // Tabla 
    var tableClientes = $("#tableClientes").DataTable({
        ajax: {
            url: '<?= base_url('clientes/obtenerClientes') ?>',
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
                data: 'tipoDoc'
            },
            {
                data: 'n_identificacion'
            },
            {
                data: 'direccion'
            },
            {
                data: 'numero'
            },
            {
                data: 'correo'
            },
            {
                data: null,
                render: function(data, type, row) {
                    return (
                        '<button class="btn" onclick="seleccionarCliente(' + data.id_tercero + ' , 2 )" data-bs-target="#agregarCliente" data-bs-toggle="modal"><img src="<?php echo base_url('icons/edit.svg') ?>" alt="Boton Editar" title="Editar Cliente"></button>' +

                        '<button class="btn" data-href=' + data.id_tercero + ' data-bs-toggle="modal" data-bs-target="#modalConfirmaP"><img src="<?php echo base_url("icons/delete.svg") ?>" alt="Boton Eliminar" title="Eliminar Cliente"></button>'
                    );
                },
            }
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },

    });

    //Insertar y editar Usuario
    function seleccionarCliente(id, tp) {
        if (tp == 2) {
            //Actualizar datos
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('srchCli/') ?>" + id + "/" + 0,
                dataType: 'json',

            }).done(function(res) {
                $('#tituloModal').text('EDITAR')
                $('#tp').val(2)
                $('#id').val(res[0]['id_tercero'])
                $('#nombreP').val(res[0]['nombre_p'])
                $('#nombreS').val(res[0]['nombre_s'])
                $('#apellidoP').val(res[0]['apellido_p'])
                $('#apellidoS').val(res[0]['apellido_s'])
                $('#tipoDoc').val(1)
                $('#Nidentificacion').val(res[0]['n_identificacion'])
                $('#direccion').val(res[0]['direccion'])
                $('#numero').val(res[0]['numero'])
                $('#correo').val(res[0]['correo'])
                $('#btnGuardar').text('Actualizar')
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('telefonos/obtenerTelefonosCliente/') ?>' + id + '/' + 5,
                    dataType: 'json',
                    success: function(data) {
                        telefonos = data[0]
                        guardarTelefono()
                    }
                })
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('email/obtenerEmailCliente/') ?>' + id + '/' + 5,
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
            $('#nombreP').val('')
            $('#nombreS').val('')
            $('#apellidoP').val('')
            $('#apellidoS').val('')
            $('#tipoDoc').val('')
            $('#Nidentificacion').val('')
            $('#direccion').val('')
            $('#numero').val('')
            $('#correo').val('')
            $('#btnGuardar').text('Agregar')
        }
    }

    $('#btnNo').click(function() {
        $("#modalConfirmaP").modal("hide");
    });
</script>
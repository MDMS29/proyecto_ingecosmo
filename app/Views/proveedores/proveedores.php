<link rel="stylesheet" href="<?php echo base_url("css/proveedores_clientes/proveedores_cliente.css") ?>">

<div id="content" class="p-4 p-md-5" style="background-color:rgba(0, 0, 0, 0.05);">
    <h2 class="text-center mb-4"><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/icon-proveedores.png') ?>" /> Proveedores</h2>
    <div class="table-responsive p-2">
        <table class="table table-striped" id="tableProveedores" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">Razon Social</th>
                    <th scope="col" class="text-center">NIT</th>
                    <th scope="col" class="text-center">Direccion</th>
                    <th scope="col" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <!-- TABLA PROVEDOORES -->
            </tbody>
        </table>
    </div>
    <div class="footer-page">
        <button class="btn btnRedireccion" data-bs-toggle="modal" data-bs-target="#agregarProveedor" onclick="seleccionarProveedor(<?= 0 . ',' . 1 ?>)"><img src="<?= base_url('img/plus.png') ?>" alt="icon-plus" width="20"> Agregar</button>
        <a href="<?php echo base_url('/proveedores/eliminados'); ?>" class="btn btnAccionF"> <img src="<?= base_url('img/delete.png') ?>" alt="icon-plus" width="20"> Eliminados</a>
    </div>
</div>

<!-- -----modal----------     -->
<form method="POST" id="formularioProveedores" autocomplete="off">
    <div class="modal fade" id="agregarProveedor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header" id="modalHeader">
                    <img class="imagenEncab" src="<?php echo base_url('/img/ingecosmo.jpg') ?>"/>

                    <div class="d-flex align-items-center justify-content-center" style="width:auto;">
                        <img id="logoModal" src="<?= base_url('img/plus-b.png') ?>" alt="icon-plus">
                        <h1 class="modal-title fs-5 text-center" id="tituloModal"></h1>
                    </div>

                    <button type="button" style="margin:0;" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form>
                    <div class="modal-body d-flex">
                        <div class="column-gap-3" style="width: 100%; padding-inline: 15px;">
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label" style="margin:0;">Razon Social:</label>
                                <input class="form-control" type="text" min='1' max='300' id="RazonSocial" name="RazonSocial">
                                <small id="msgRaSo" class="invalido"></small>

                                <input hidden id="tp" name="tp">
                                <input hidden id="id" name="id">
                            </div>

                            <div class="mb-3">
                                <label style="margin:0;" for="message-text" class="col-form-label">NIT:</label>
                                <input type="text" class="form-control" id="nit" name="nit"></input>
                                <small id="msgNit" class="invalido"></small>
                            </div>

                            <div class="mb-3">
                                <label style="margin:0;" class="col-form-label" for="message-text">Direccion:</label>
                                <input class="form-control" id="direccion" name="direccion"></input>
                            </div>
                        </div>


                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btnRedireccion" data-bs-dismiss="modal" id="btnCerrar">Cerrar</button>
                    <button type="submit" class="btn btnAccionF" id="btnGuardar"></button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Modal Confirma Eliminar -->
<div class="modal fade" id="modalConfirmarP" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">

        <div class="modal-content" id="modalEliminarContentP">
            <div class="modalContenedorP">
                <div id="contenidoHeaderEliminarP" class="modal-header">
                    <img style=" width:80px; height:60px; margin-bottom: 0; " src="<?php echo base_url('/img/ingecosmo.png') ?>" />
                    <button type="button" style="margin:0;" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="contenidoEliminarP">
                    <div class="bloqueModalP">
                        <img style=" width:80px; height:60px; margin:10px; " src="<?php echo base_url('/img/icon-alerta.png') ?>" />
                        <p class="textoModalP">¿Estas seguro de eliminar este Proveedor?</p>
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

<script>
    // variables
    var ContadorPRC = 0
    var inputRazonSocial = 0;
    var inputNit = 0;
    var validRazonSocial = true;
    var validNi = true;
    //Editar o Agregar Proveedor
    function seleccionarProveedor(id, tp) {
        if (tp == 2) {
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('/proveedores/buscarProveedor/') ?>" + id + "/" + 0 + '/' + 0,
                dataType: 'json',
                success: function(res) {
                    $('#tituloModal').text('Editar')
                    $('#logoModal').attr('src', '<?php echo base_url('img/editar.png') ?>')
                    $('#tp').val(2)
                    $('#id').val(res[0]['id_tercero'])
                    $('#RazonSocial').val(res[0]['razon_social'])
                    $('#nit').val(res[0]['n_identificacion'])
                    $('#direccion').val(res[0]['direccion'])
                    $('#btnGuardar').text('Actualizar')
                    $('#msgRaSo').text('')
                    $('#msgNit').text('')
                    validRazonSocial = true;
                    validNi = true;
                }
            })

        } else {
            //Insertar datos
            $('#tituloModal').text('Agregar')
            $('#logoModal').attr('src', '<?php echo base_url('img/plus-b.png') ?>')
            $('#tp').val(1)
            $('#id').val(0)
            $('#RazonSocial').val('')
            $('#nit').val('')
            $('#direccion').val('')
            $('#btnGuardar').text('Agregar')
            $('#msgRaSo').text('')
            $('#msgNit').text('')
            validRazonSocial = true;
            validNi = true;
        }
    }
    // Tabla   
    var tableProveedores = $("#tableProveedores").DataTable({
        ajax: {
            url: '<?= base_url('proveedores/obtenerProveedores') ?>',
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
                        '<button class="btn" onclick="seleccionarProveedor(' + data.id_tercero + ' , 2 )" data-bs-target="#agregarProveedor" data-bs-toggle="modal"><img src="<?php echo base_url('img/edit.svg') ?>" alt="Boton Editar" title="Editar Proveedor"></button>' +

                        '<button class="btn" data-href=' + data.id_tercero + ' data-bs-toggle="modal" data-bs-target="#modalConfirmarP"><img src="<?php echo base_url("img/delete.svg") ?>" alt="Boton Eliminar" title="Eliminar Proveedor"></button>'
                    );
                },
            }
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },

    });
    //Validacion de Razon Social
    function buscarRazonSocial(id, inputRazonSocial) {
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('/proveedores/buscarProveedor/') ?>" + 0 + "/" + inputRazonSocial + '/' + 0,
            dataType: 'JSON',
            success: function(res) {
                if (res[0] == null) {
                    $('#msgRaSo').text('')
                    validRazonSocial = true
                } else if (res[0] != null) {
                    $('#msgRaSo').text('* Razon Social ya existente *')
                    validRazonSocial = false
                }
            }
        })
    }
    //Identificar si la Razon Social esta registrado
    $('#RazonSocial').on('input', function(e) {
        inputRazonSocial = $('#RazonSocial').val()
        tp = $('#tp').val()
        id = $('#id').val()
        if (inputRazonSocial == '') {
            $('#msgRaSo').text('')
            validRazonSocial = true
        }
        if (tp == 1 && id == 0) {
            buscarRazonSocial(0, inputRazonSocial)
        } else if (tp == 2 && id != 0) {
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('proveedores/buscarProveedor/') ?>" + id + "/" + inputRazonSocial + '/' + 0,

                dataType: 'JSON',
                success: function(res) {
                    if (res[0].razon_social == inputRazonSocial) {
                        $('#msgRaSo').text('')
                        validRazonSocial = true
                    } else {
                        buscarRazonSocial(0, inputRazonSocial)
                    }
                }
            })
        }
    })
    //Validacion de Nit
    function buscarNit(id, inputNit) {
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('/proveedores/buscarProveedor/') ?>" + 0 + "/" + 0 + '/' + inputNit,
            dataType: 'JSON',
            success: function(res) {
                if (res[0] == null) {
                    $('#msgNit').text('')
                    validNit = true
                } else if (res[0] != null) {
                    $('#msgNit').text('* NIT ya existente *')
                    validNit = false
                }
            }
        })
    }
    //Identificar si el NIT esta registrado
    $('#nit').on('input', function(e) {
        inputNit = $('#nit').val()
        tp = $('#tp').val()
        id = $('#id').val()
        if (tp == 1 && id == 0) {
            buscarNit(0, inputNit)
        } else if (tp == 2 && id != 0) {
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('/proveedores/buscarProveedor/') ?>" + id + "/" + 0 + '/' + inputNit,
                dataType: 'JSON',
                success: function(res) {
                    if (res[0].n_identificacion == inputNit) {
                        $('#msgNit').text('')
                        validNit = true
                    } else {
                        buscarNit(0, inputNit)
                    }
                }
            })
        }
    })
    //Envio de formulario
    $('#formularioProveedores').on('submit', function(e) {
        e.preventDefault()
        $('#btnGuardar').text('Agregar')
        tp = $('#tp').val()
        id = $('#id').val()
        RazonSocial = $('#RazonSocial').val()
        nit = $('#nit').val()
        direccion = $('#direccion').val()

        //Control de campos vacios
        if ([RazonSocial, nit, direccion].includes('') || validRazonSocial != true || validNit != true) {
            return mostrarMensaje('error', '¡Hay campos vacios o invalidos!')
        } else {
            $.ajax({
                url: '<?php echo base_url('proveedores/insertar') ?>',
                type: 'POST',
                data: {
                    id,
                    tp,
                    RazonSocial,
                    nit,
                    direccion
                },
                success: function(idUser) {
                    if (tp == 2) {
                        mostrarMensaje('success', '¡Se ha Actualizado el Proveedor!')
                    } else {
                        mostrarMensaje('success', '¡Se ha Registrado el Proveedor!')
                    }
                }
            }).done(function(data) {
                $('#agregarProveedor').modal('hide')
                tableProveedores.ajax.reload(null, false); //Recargar tabla
                $('#btnGuardar').removeAttr('disabled') //Desabilitar boton para evitar registros dobles
                ContadorPRC = 0;
                validRazonSocial = true;
                validNit = true;
                $('#msgRaSo').text('')
                $('#msgNit').text('')
            });
        };

    })
    //Cambiar estado de "Activo" a "Inactivo" 
    $('#modalConfirmarP').on('shown.bs.modal', function(e) {
        $(this).find('#btnSi').attr('onclick', `EliminarProveedor(${$(e.relatedTarget).data('href')})`)
    })

    function EliminarProveedor(id) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('proveedores/cambiarEstado') ?>",
            data: {
                id,
                estado: 'I'
            }
        }).done(function(data) {
            mostrarMensaje('success', data)
            $('#modalConfirmarP').modal('hide')
            tableProveedores.ajax.reload(null, false)
        })
    }
</script>
<link rel="stylesheet" href="<?php echo base_url("css/proveedores_clientes/proveedores_cliente.css") ?>">
<link rel="stylesheet" href="<?= base_url('css/materiales.css') ?>">

<div id="content" class="p-4 p-md-5" style="background-color:rgba(0, 0, 0, 0.05);">
    <h2 class="text-center mb-4"><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/repuestos-b.png') ?>" />Administrar Repuestos</h2>
    <div class="d-flex justify-content-center align-items-center flex-wrap ocultar">
        <b class="fs-6 text-black"> Ocultar Columnas:</b> <a class="toggle-vis btn" data-column="0">#</a> - <a class="toggle-vis btn" data-column="3">Proveedor</a> - <a class="toggle-vis btn" data-column="4">Exixtencias</a> - <a class="toggle-vis btn" data-column="6">Fila</a>
    </div>
    <div class="table-responsive p-2">
        <table class="table table-striped" id="tableRepuestos" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">Nombre</th>
                    <th scope="col" class="text-center">Orden de Servicio</th>
                    <th scope="col" class="text-center">Proveedor</th>
                    <th scope="col" class="text-center">Existencias</th>
                    <th scope="col" class="text-center">Bodega</th>
                    <th scope="col" class="text-center">Fila</th>
                    <th scope="col" class="text-center">Acciones </th>
                </tr>
            </thead>
            <tbody class="text-center">
                <!-- TABLA PROVEDOORES -->
            </tbody>
        </table>
    </div>
    <div class="footer-page">
        <button class="btn btnAccionF " data-bs-toggle="modal" data-bs-target="#agregarRepuesto" onclick="seleccionarRepuesto(<?= 0 . ',' . 1 ?>)"><img src="<?= base_url('img/plus.png') ?>" alt="icon-plus" width="20"> Agregar</button>
        <a href="<?php echo base_url('/materiales/repuestosAdminEliminados'); ?>" class="btn btnRedireccion"> <img src="<?= base_url('img/delete.png') ?>" alt="icon-plus" width="20"> Eliminados</a>
    </div>
</div>


<!-- AGREGAR O EDITAR REPUESTO -->
<form id="formularioRepuesto" autocomplete="off">
    <input class="form-control" id="id" name="id" type="text" value="0" hidden>

    <input type="text" name="id" id="id" hidden>
    <input type="text" name="tp" id="tp" hidden>

    <div class="modal fade" id="agregarRepuesto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" id="modalContent">
                <div class="modal-header d-flex align-items-center justify-content-between">
                    <img src="<?= base_url('img/logo_empresa.png') ?>" alt="Logo Empresa" class="logoEmpresa" width="100">
                    <h1 class="modal-title fs-5 text-center d-flex align-items-center gap-2"><img id="imgModal" src=""><span id="tituloModal"><!-- TEXTO DINAMICO--></span> </h1>
                    <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>

                <div class="modal-body">
                    <div class="d-flex column-gap-3" style="width: 100%">
                        <div class="mb-3" style="width: 100%;">
                            <label for="exampleDataList" class="col-form-label">Nombre:</label>
                            <input class="form-control" id="nombre" name="nombre" placeholder="">
                            <input class="form-control" id="nombreHidden" name="nombreHidden" hidden>
                            <small id="msgAgregar" class="invalidoInsumo"></small>
                        </div>
                        <div class="mb-3" style="width: 100%;">
                            <label for="Existencias" class="col-form-label">Existencias:</label>
                            <input class="form-control" type="number" id="Existencias" name="Existencias" placeholder="">
                        </div>
                    </div>
                    <div class="d-flex column-gap-3" style="width: 100%">
                        <div class="mb-3" style="width: 100%;">
                            <label for="Orden" class="col-form-label">Proveedor:</label>
                            <select class="form-control form-select" name="Orden" id="Orden">
                                <option selected value="">-- Seleccione --</option>
                                <?php foreach ($proveedores as $data) { ?>
                                    <option value="<?= $data['id_tercero'] ?>"><?= $data['razon_social'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3" style="width: 100%;">
                            <label for="Orden" class="col-form-label">Orden de Servicio:</label>
                            <select class="form-control form-select" name="Orden" id="Orden">
                                <option selected value="">-- Seleccione --</option>
                                <?php foreach ($ordenes as $data) { ?>
                                    <option value="<?= $data['id_orden'] ?>"><?= $data['n_orden'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex column-gap-3" style="width: 100%">
                        <div class="mb-3" style="width: 100%;">
                            <label for="Orden" class="col-form-label">Bodega:</label>
                            <select class="form-control form-select" name="Orden" id="Orden">
                                <option selected value="">-- Seleccione --</option>
                                <?php foreach ($bodegas as $data) { ?>
                                    <option value="<?= $data['id'] ?>"><?= $data['nombre'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3" style="width: 100%;">
                            <label for="exampleDataList" class="col-form-label">Fila:</label>
                            <select style=" margin-left: 0px !important;" class="form-control form-select" name="fila" id="fila">
                                <option selected value="">-- Seleccione --</option>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" id="modalFooter">
                    <button type="button" class="btn btnRedireccion" onclick="limpiarCampos()" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btnAccionF" id="btnAgregar">Agregar</button>
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
                        <p class="textoModalP">¿Estas seguro de eliminar el repuesto?</p>
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
    var ContadorPRC = 0;

    //Mostrar Ocultar Columnas
    $('a.toggle-vis').on('click', function(e) {
        e.preventDefault();
        // Get the column API object
        var column = tableRepuestos.column($(this).attr('data-column'));
        // Toggle the visibility
        column.visible(!column.visible());
    });
    //Div ocualtar columnas de la tabla
    var botones = $(".ocultar a");
    botones.click(function() {
        if ($(this).attr('class').includes('active')) {
            $(this).removeClass('active');
        } else {
            $(this).addClass('active');
        }
    })
    // Limpiar campos
    function limpiarCampos() {
        validNom = true
        $('#msgAgregar').text('')
        $('#cantRestock').text('')
    }

    function seleccionarRepuesto(id, tp) {
        if (tp == 2) {
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('/repuestosAdmin/buscarRepuesto/') ?>",
                data: {
                    id
                },
                dataType: 'json',
                success: function(data) {
                    $('#tituloModal').text('Editar')
                    $('#imgModal').attr('src', '<?php echo base_url('img/editar.png') ?>')
                    $('#imgModal').attr('width', '25')
                    $('#tp').val(2)
                    $('#nombre').val(data[0]['nombre'])
                    $('#vehiculo').val(data[0]['id_vehiculo'])
                    $('#proveedor').val(data[0]['razon_social'])
                    $('#categoria').val(data[0]['nombre_categoria'])
                    $('#categoria').val(data[0]['nombre_categoria'])
                    $('#existencias').val(data[0]['cantidad_actual'])
                    $('#pCompra').val(data[0]['precio_compra'])
                    $('#pVenta').val(data[0]['precio_venta'])
                    $('#estante').val(data[0]['estante'])
                    mostrarFilas(data['idEstante'], data['fila'])
                    $('#btnGuardar').text('Actualizar')
                }
            })

        } else {
            //Insertar datos
            $('#tituloModal').text('Agregar')
            $('#imgModal').attr('src', '<?php echo base_url('img/plus-b.png') ?>')
            $('#imgModal').attr('width', '25')
            $('#tp').val(1)
            $('#id').val(0)
            $('#nombre').val('')
            $('#vehiculo').val('')
            $('#proveedor').val('')
            $('#categoria').val('')
            $('#categoria').val('')
            $('#existencias').val('')
            $('#pCompra').val('')
            $('#pVenta').val('')
            $('#estante').val('')
            mostrarFilas('', '')
            $('#btnGuardar').text('Agregar')
        }
    }
    // Tabla   
    var tableRepuestos = $("#tableRepuestos").DataTable({
        ajax: {
            url: '<?= base_url('repuestosAdmin/obtenerRepuestos') ?>',
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
                data: 'nombre'
            },
            {
                data: 'numeroOrden'
            },
            {
                data: 'razon_social'
            },
            {
                data: 'cantidad_actual'
            },
            {
                data: 'bodega'
            },
            {
                data: 'fila'
            },
            {
                data: null,
                render: function(data, type, row) {
                    return (
                        '<button class="btn" onclick="seleccionarRepuesto(' + data.id_material + ' , 2 )" data-bs-target="#agregarRepuesto" data-bs-toggle="modal"><img src="<?php echo base_url('img/edit.svg') ?>" alt="Boton Editar" title="Editar Repuesto"></button>' +

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
<link rel="stylesheet" href="<?php echo base_url("css/proveedores_clientes/proveedores_cliente.css") ?>">
<link rel="stylesheet" href="<?= base_url('css/materiales.css') ?>">

<div id="content" class="p-4 p-md-5" style="background-color:rgba(0, 0, 0, 0.05);">
    <h2 class="text-center mb-4"><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/repuestos-b.png') ?>" />Administrar Repuestos</h2>
    <div class="d-flex justify-content-center align-items-center flex-wrap ocultar">
        <b class="fs-6 text-black"> Ocultar Columnas:</b> <a class="toggle-vis btn" data-column="0">#</a> - <a class="toggle-vis btn" data-column="3">Proveedor</a> - <a class="toggle-vis btn" data-column="4">Exixtencias</a>
    </div>
    <div class="table-responsive p-2">
        <table class="table table-striped" id="tableRepuestosAdmin" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">Nombre</th>
                    <th scope="col" class="text-center">Orden de Servicio</th>
                    <th scope="col" class="text-center">Proveedor</th>
                    <th scope="col" class="text-center">Cantidad</th>
                    <th scope="col" class="text-center">Bodega</th>
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
        <a href="<?php echo base_url('repuestosAdmin/pendientes'); ?>" class="btn btnRedireccion"> <img src="<?= base_url('img/devolucionW.png') ?>" alt="icon-plus" width="20"> Devoluciones</a>
        <a href="<?php echo base_url('repuestosAdmin/confirmados'); ?>" class="btn btn-success"> <img src="<?= base_url('img/confirmarW.png') ?>" alt="icon-plus" width="20"> Confirmados</a>
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
                            <small id="msgAgregar" class="invalidoInsumo"></small>
                        </div>
                        <div class="mb-3" style="width: 100%;">
                            <label for="existencias" class="col-form-label">Existencias:</label>
                            <input class="form-control" type="number" id="existencias" name="existencias" placeholder="">
                        </div>
                    </div>
                    <div class="d-flex column-gap-3" style="width: 100%">
                        <div class="mb-3" style="width: 100%;">
                            <label for="proveedor" class="col-form-label">Proveedor:</label>
                            <select class="form-control form-select" name="proveedor" id="proveedor">
                                <option selected value="">-- Seleccione --</option>
                                <?php foreach ($proveedores as $data) { ?>
                                    <option value="<?= $data['id_tercero'] ?>"><?= $data['razon_social'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3" style="width: 100%;">
                            <label for="orden" class="col-form-label">Orden de Servicio:</label>
                            <select class="form-control form-select" name="orden" id="orden">
                                <option selected value="">-- Seleccione --</option>
                                <?php foreach ($ordenes as $data) { ?>
                                    <option value="<?= $data['id_orden'] ?>"><?= $data['n_orden'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex column-gap-3" style="width: 100%">
                        <div class="mb-3" style="width: 100%;">
                            <label for="bodega" class="col-form-label">Bodega:</label>
                            <select class="form-control form-select" name="bodega" id="bodega">
                                <option selected value="">-- Seleccione --</option>
                                <?php foreach ($bodegas as $data) { ?>
                                    <option value="<?= $data['id'] ?>"><?= $data['nombre'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" id="modalFooter">
                    <button type="button" class="btn btnRedireccion" onclick="limpiarCampos()" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btnAccionF" id="btnGuardar"></button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Modal Confirma Devolucion -->
<div class="modal fade" id="modalConfirmarD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content" id="modalEliminarContentP">
            <div class="modalContenedorP">
                <div id="contenidoHeaderEliminarP" class="modal-header">
                    <img style=" margin-bottom: 0;" width="100" src="<?php echo base_url('/img/ingecosmo.png') ?>" />
                    <h1 id="tituloM" class="fs-5">Observacion</h1><br>
                    <button type="button" style="margin:0;" class="btn-close" onclick="limpiarCampos()" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="contenidoEliminarP">
                    <div class="">
                        <label id="observacion" class=""></label>
                        <textarea id="observaciont" name="textarea" rows="5" cols="60" placeholder="Ej: El repuesto llego en mal estado..." style="border: 3px solid #161666; border-radius: 5px; padding: 7px;"></textarea>
                    </div>

                </div>
            </div>
            <div id="bloqueBtnP" class="modal-footer">
                <button id="btnNo" class="btn btnRedireccion" onclick="limpiarCampos()" data-bs-dismiss="modal">Cancelar</button>
                <a id="btnSig" class="btn btnAccionF " data-bs-toggle="modal" data-bs-target="#modalConfirmarP"></a>
            </div>

        </div>
    </div>
</div>


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
                        <p class="textoModalP">¿Estas seguro de devolver el repuesto?</p>
                    </div>

                </div>
            </div>
            <div id="bloqueBtnP" class="modal-footer">
                <button id="btnNo" class="btn btnRedireccion" data-bs-dismiss="modal">Cerrar</button>
                <a id="btnSi" class="btn btnAccionF">Devolver</a>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    var Contador = 0;

    //Mostrar Ocultar Columnas
    $('a.toggle-vis').on('click', function(e) {
        e.preventDefault();
        // Get the column API object
        var column = tableRepuestosAdmin.column($(this).attr('data-column'));
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
        $('#observaciont').val('')
    }

    function seleccionarRepuesto(id, tp) {
        if (tp == 2) {
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('/repuestosAdmin/buscarRepuesto/') ?>" + id,
                dataType: 'json',
                success: function(data) {
                    $('#tp').val(2)
                    $('#tituloModal').text('Editar')
                    $('#imgModal').attr('src', '<?php echo base_url('img/editar.png') ?>')
                    $('#imgModal').attr('width', '25')
                    $('#id').val(data['id_material'])
                    $('#nombre').val(data['nombre'])
                    $('#existencias').val(data['cantidad_actual'])
                    $('#proveedor').val(data['razon_social'])
                    $('#orden').val(data['numeroOrden'])
                    $('#bodega').val(data['bodega'])
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
            $('#existencias').val('')
            $('#proveedor').val('')
            $('#orden').val('')
            $('#bodega').val('')
            $('#btnGuardar').text('Agregar')
        }
    }

    function titulo(id) {
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('/repuestosAdmin/buscarRepuesto/') ?>" + id,
            dataType: 'json',
            success: function(data) {
                $('#tituloM').text(`Observacion - ${data.nombre}`)
                $('#observacion').text('Motivo de devolucion:')
                $('#btnSig').text('Confirmar')
            }
        })
    }

    // Tabla   
    var tableRepuestosAdmin = $("#tableRepuestosAdmin").DataTable({
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
                    Contador = Contador + 1;
                    return "<b>" + Contador + "</b>";
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
                data: null,
                render: function(data, type, row) {
                    return (
                        '<button class="btn" onclick="seleccionarRepuesto(' + data.id_material + ' , 2 )" data-bs-target="#agregarRepuesto" data-bs-toggle="modal"><img src="<?php echo base_url('img/edit.svg') ?>" alt="Boton Editar" title="Editar Repuesto"></button>' +
                        '<button class="btn" data-href=' + data.id_material + ' data-bs-toggle="modal" data-bs-target="#modalConfirmarD" onclick="titulo(' + data.id_material + ')"><img src="<?php echo base_url("img/devolucion.png") ?>" alt="Boton Devolver" title="Devolver Repuesto" style="width: 24px; height: 21px"></button>'
                    );
                },
            }
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },

    });

    $('#btnSig').on('click', function(e) {
        e.preventDefault()
        id = $('#id').val()
        observacion = $('#observaciont').val()
        if ([observacion].includes('')) {
            mostrarMensaje('error', '¡Hay campos vacios o invalidos!')
        } else {
            $.ajax({
                url: "<?= base_url('repuestosAdmin/insertarO') ?>",
                type: 'POST',
                dataType: 'json',
                data: {
                    id,
                    observacion
                },
                success: function(res) {
                    contador = 0       
                }
            })
        }
    })

    $('#formularioRepuesto').on('submit', function(e) {
        e.preventDefault()
        tp = $('#tp').val()
        id = $('#id').val()
        nombre = $('#nombre').val()
        existencias = $('#existencias').val()
        proveedor = $('#proveedor').val()
        orden = $('#orden').val()
        bodega = $('#bodega').val()

        if ([nombre, existencias, proveedor, orden, bodega].includes('')) {
            mostrarMensaje('error', '¡Hay campos vacios o invalidos!')
        } else {
            $.ajax({
                url: "<?= base_url('repuestosAdmin/insertar') ?>",
                type: 'POST',
                dataType: 'json',
                data: {
                    tp,
                    id,
                    nombre,
                    existencias,
                    proveedor,
                    orden,
                    bodega
                },
                success: function(res) {
                    contador = 0
                    if (tp == 2) {
                        if (res == 1) {
                            tableRepuestosAdmin.ajax.reload(null, false)
                            $('#agregarRepuesto').modal('hide')
                            mostrarMensaje('success', '¡Se ha actualizado el repuesto!')
                        } else {
                            mostrarMensaje('error', '¡Ha ocurrido un error!')
                        }
                    } else {
                        if (res == 1) {
                            tableRepuestosAdmin.ajax.reload(null, false)
                            $('#agregarRepuesto').modal('hide')
                            mostrarMensaje('success', '¡Se ha guardado el repuesto!')
                        } else {
                            mostrarMensaje('error', '¡Ha ocurrido un error!')
                        }
                    }
                }
            })
        }
    })

    //Cambiar estado de "Activo" a "Inactivo" 
    $('#modalConfirmarP').on('shown.bs.modal', function(e) {
        $(this).find('#btnSi').attr('onclick', `DevolverRepuesto(${$(e.relatedTarget).data('href')})`)
    })

    $('#modalConfirmarD').on('shown.bs.modal', function(e) {
        id = $(e.relatedTarget).data('href')
        $(this).find('#btnSig').attr('data-href', id)

    })

    function DevolverRepuesto(id) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('repuestosAdmin/cambiarEstado') ?>",
            data: {
                id,
                estado: 'P'
            }
        }).done(function() {
            Swal.fire(
                'Pendiente a devolver.',
                '¡Revisa el apartado de devoluciones para confirmar su devolución!',
                'success'
            )
            $('#modalConfirmarP').modal('hide')
            contador = 0
            tableRepuestosAdmin.ajax.reload(null, false)
        })
    }
    $('#btnNo').click(function() {
        $("#modalConfirmarP").modal("hide");
    });
</script>
<link rel="stylesheet" href="<?php echo base_url("css/proveedores_clientes/proveedores_cliente.css") ?>">
<link rel="stylesheet" href="<?= base_url('css/materiales.css') ?>">


<div id="content" class="p-4 p-md-5" style="background-color:rgba(0, 0, 0, 0.05);">
    <h2 class="text-center mb-4"><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/confirmadoB.png') ?>" /> Repuestos Confirmados</h2>
    <div class="d-flex justify-content-center align-items-center flex-wrap ocultar">
        <b class="fs-6 text-black"> Ocultar Columnas:</b> <a class="toggle-vis btn" data-column="0">#</a> - <a class="toggle-vis btn" data-column="3">Proveedor</a> - <a class="toggle-vis btn" data-column="4">Cantidad</a>
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
        <button type="button" class="btn btnAccionF d-flex gap-2 align-items-center" onclick="window.history.back()"><img src="<?= base_url('img/regresa.png') ?>" alt="icon-plus" width="20"> Regresar</button>
    </div>
</div>


<!-- VER REPUESTO -->
<div class="modal fade" id="verRepuesto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <input class="form-control" id="id" name="id" type="text" value="0" hidden>
    <input type="text" name="id" id="id" hidden>
    <input type="text" name="tp" id="tp" hidden>
    <div class="modal-dialog modal-lg">
        <div class="modal-content" id="modalContent">
            <div class="modal-header d-flex align-items-center justify-content-between">
                <img src="<?= base_url('img/logo_empresa.png') ?>" alt="Logo Empresa" class="logoEmpresa" width="100">
                <h1 class="modal-title fs-5 text-center d-flex align-items-center gap-2"><i class="bi bi-eye-fill fs-4 text-primary"></i><span id="tituloModal"><!-- TEXTO DINAMICO--></span> </h1>
                <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">X</button>
            </div>

            <div class="modal-body">
                <div class="d-flex column-gap-3" style="width: 100%">
                    <div class="mb-3" style="width: 100%;">
                        <label for="exampleDataList" class="col-form-label">Nombre:</label>
                        <input class="form-control" id="nombre" name="nombre" placeholder="" disabled>
                    </div>
                    <div class="mb-3" style="width: 100%;">
                        <label for="existencias" class="col-form-label">Existencias:</label>
                        <input class="form-control" type="number" id="existencias" name="existencias" placeholder="" disabled>
                    </div>
                </div>
                <div class="d-flex column-gap-3" style="width: 100%">
                    <div class="mb-3" style="width: 100%;">
                        <label for="proveedor" class="col-form-label">Proveedor:</label>
                        <select class="form-control form-select" name="proveedor" id="proveedor" disabled>
                            <option selected value="">-- Seleccione --</option>
                            <?php foreach ($proveedores as $data) { ?>
                                <option value="<?= $data['id_tercero'] ?>"><?= $data['razon_social'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3" style="width: 100%;">
                        <label for="orden" class="col-form-label">Orden de Servicio:</label>
                        <select class="form-control form-select" name="orden" id="orden" disabled>
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
                        <select class="form-control form-select" name="bodega" id="bodega" disabled>
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
                        <img id="imgModal" style=" width:60px; height:40px; margin:10px; " />
                        <p id="textoModalP" class="textoModalP"></p>
                        <p id="nombre"> </p>
                    </div>

                </div>
            </div>
            <div id="bloqueBtnP" class="modal-footer">
                <button id="btnNo" class="btn btnRedireccion" data-bs-dismiss="modal">Cerrar</button>
                <a id="btnSi" class="btn btnAccionF"></a>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    var contador = 0;

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

    function seleccionarRepuesto(id, tp) {
        if (tp == 2) {
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('/repuestosAdmin/buscarRepuesto/') ?>" + id,
                dataType: 'json',
                success: function(data) {
                    $('#tp').val(2)
                    $('#textoModalP').text(`¿Estas seguro de restablecer el Repuesto - ${data.nombre}?`)
                    $('#imgModal').attr('src', '<?php echo base_url('img/restore.png') ?>')
                    $('#btnSi').text('Restablecer')
                }
            })
        } else {
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('/repuestosAdmin/buscarRepuesto/') ?>" + id,
                dataType: 'json',
                success: function(data) {
                    $('#tp').val(1)
                    $('#textoModalP').text(`¿Estas seguro de pasar a pendiente el repuesto - ${data.nombre}?`)
                    $('#imgModal').attr('src', '<?php echo base_url('img/devolucionB.png') ?>')
                    $('#btnSi').text('Devolver')
                }
            })
        }
    }
    // Tabla   
    var tableRepuestosAdmin = $("#tableRepuestosAdmin").DataTable({
        ajax: {
            url: '<?= base_url('repuestosAdmin/obtenerRepuestos') ?>',
            method: "POST",
            data: {
                estado: 'C'
            },
            dataSrc: "",
        },
        columns: [{
                data: null,
                render: function(data, type, row) {
                    contador = contador + 1;
                    return "<b>" + contador + "</b>";
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
                        '<button class="btn" data-href=' + data.id_material + ' data-bs-toggle="modal" data-bs-target="#modalConfirmarP" onclick="seleccionarRepuesto(' + data.id_material + ',1)"><img src="<?php echo base_url("img/devolucion.png") ?>" alt="Boton Devolver" title="Devolver Repuesto" style="width: 24px; height: 21px"></button>'+
                        '<button class="btn" data-href=' + data.id_material + ' data-bs-toggle="modal" data-bs-target="#modalConfirmarP" onclick="seleccionarRepuesto(' + data.id_material + ',2)"><img src="<?php echo base_url("img/restore.png") ?>" alt="Boton Restaurar" title="Restaurar Repuesto" width="20"></button>'
                    );
                },
            }
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },

    });


    // Cambiar estado de "Activo" a "Inactivo" 
    $('#modalConfirmarP').on('shown.bs.modal', function(e) {
        tp = $('#tp').val()

        if (tp==2){
            $(this).find('#btnSi').attr('onclick', `RestablecerRepuesto(${$(e.relatedTarget).data('href')})`)
        } else {
            $(this).find('#btnSi').attr('onclick', `DevolverRepuesto(${$(e.relatedTarget).data('href')})`)
        }
    })

    function RestablecerRepuesto(id) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('repuestosAdmin/cambiarEstado') ?>",
            data: {
                id,
                estado: 'A'
            }
        }).done(function() {
            $('#modalConfirmarP').modal('hide')
            contador = 0
            tableRepuestosAdmin.ajax.reload(null, false)
            return  mostrarMensaje('success', '¡Se ha reestablecido el repuesto!')
        })
    }

    function DevolverRepuesto(id) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('repuestosAdmin/cambiarEstado') ?>",
            data: {
                id,
                estado: 'P' //Estado del repuesto: Pendiente
            }
        }).done(function() {
            $('#modalConfirmarP').modal('hide')
            contador = 0
            tableRepuestosAdmin.ajax.reload(null, false)
            return mostrarMensaje('success', '¡Se ha confirmado la devolucion del repuesto!')
        })
    }
    $('#btnNo').click(function() {
        $("#modalConfirmarP").modal("hide");
    });
</script>
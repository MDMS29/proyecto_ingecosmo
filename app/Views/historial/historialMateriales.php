<link rel="stylesheet" href="<?= base_url('css/vehiculos/vehiculos.css') ?>">

<!-- TABLA MOSTRAR VEHICULOS -->
<div id="content" class="p-4 p-md-5" style="background-color:rgba(0, 0, 0, 0.05);">
    <h2 class="text-center mb-4"><img style=" width:45px; height:45px; " src="<?php echo base_url('/img/historial-b.png') ?>" /> Historial Materiales</h2>
    <div class="table-responsive p-2">
        <div class="d-flex justify-content-center align-items-center flex-wrap ocultar">
            <b class="fs-6 text-black"> Ocultar Columnas:</b> <a class="toggle-vis btn" data-column="2">Trabajador</a> - <a class="toggle-vis btn" data-column="4">Fecha de Movimiento</a>
        </div>
        <table class="table table-striped" id="tableHistorial" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <!-- <th scope="col" class="text-center">Material</th> -->
                    <th scope="col" class="text-center">Orden de Servicio</th>
                    <th scope="col" class="text-center">Trabajador</th>
                    <th scope="col" class="text-center">Cantidad</th>
                    <th scope="col" class="text-center">Fecha Movimiento</th>
                    <th scope="col" class="text-center">Subtotal</th>
                    <th scope="col" class="text-center">Tipo Movimiento</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <!-- TABLA DE VEHICULOS -->
            </tbody>
        </table>
    </div>
    <div class="footer-page mt-4">
        <button type="button" class="btn btnAccionF d-flex gap-2 align-items-center" onclick="window.history.back()"><img src="<?= base_url('img/regresa.png') ?>" alt="icon-plus" width="20"> Regresar</button>
        <!-- <a href="< ?= base_url('usuarios/eliminados') ?>" class="btn btnAccionF"> <img src="< ?= base_url('img/delete.png') ?>" alt="icon-plus" width="20"> Eliminados</a> -->
    </div>
</div>

<div class="modal fade" id="verDetalles" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header flex justify-content-between align-items-center">
                <img src="<?= base_url('img/ingecosmo.png') ?>" alt="logo-empresa" width="100" height="60">
                <h1 class="modal-title fs-5 text-center " id="tituloModal"> <img src="<?= base_url('img/historial-b.png') ?>" alt="logo-empresa" width="40" height="40"> Ver Detalles</h1>
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#verCliente" aria-label="Close">X</button>
            </div>
            <input type="text" name="editOrden" id="editOrden" hidden>
            <div class="modal-body">
                <div class="container p-4" style="background-color: #d9d9d9;border-radius:10px;">
                    <div class="table-responsive" style="overflow:scroll-vertical;overflow-y: scroll !important; height: 150px;background-color:white;">
                        <table class="table table-bordered table-sm table-striped" id="tablePaises" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th>Materiales De La orden</th>
                                    <th>Fecha de entrega</th>
                                </tr>
                            </thead>
                            <tbody id="bodyTel1">
                                <tr class="text-center">
                                    <td colspan="3">NO HAY MATERIALES</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btnAccionF" data-bs-toggle="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    //Mostrar Ocultar Columnas
    $('a.toggle-vis').on('click', function(e) {
        e.preventDefault();
        // Get the column API object
        var column = tablaHistorial.column($(this).attr('data-column'));
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
    //Tabla de Historial
    var contador = 0
    var tablaHistorial = $('#tableHistorial').DataTable({
        ajax: {
            url: '<?= base_url('historial/obtenerMovimientoEnc') ?>',
            data: {},
            method: "POST",
            dataSrc: "",
        },
        columns: [{
                data: null,
                render: function(data, type, row) {
                    contador = contador + 1;
                    return "<b>" + contador + "</b>";
                }
            },
            // {
            //     data: "nombreMate"
            // },
            {
                data: null,
                render: function(data, type, row) {
                    return row.nombreOrden == null ? "No se encontro orden de servicio" : row.nombreOrden; //
                }
            },

            {
                data: null,
                render: function(data, type, row) {
                    return row.nombreTrabajador == null ? "No se encontro trabajador " : row.nombreTrabajador
                }
            },
            {
                data: 'cantidad'
            },
            {
                data: "fecha_movimiento"
            },
            {
                data: null,
                render: function(data, type, row) {
                    return formatearCantidad(row.subtotal)
                }
            },
            {
                data: "tipo_movimiento"
            },
     


        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
    });
</script>
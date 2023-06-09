<link rel="stylesheet" href="<?= base_url('css/vehiculos/vehiculos.css') ?>">

<!-- TABLA MOSTRAR VEHICULOS -->
<div id="content" class="p-4 p-md-5" style="background-color:rgba(0, 0, 0, 0.05);">
    <h2 class="text-center mb-4"><img style=" width:45px; height:45px; " src="<?php echo base_url('/img/historial-orden-b.png') ?>" /> Historial Ordenes de Servicio</h2>
    <div class="table-responsive p-2">
        <div class="d-flex justify-content-center align-items-center flex-wrap ocultar">
            <b class="fs-6 text-black"> Ocultar Columnas:</b> <a class="toggle-vis btn" data-column="0">Responsable</a> - <a class="toggle-vis btn" data-column="1">Tipo Responsable</a> - <a class="toggle-vis btn" data-column="4">Proceso Taller</a>
        </div>
        <table class="table table-striped" id="tableHistorial" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Responsable</th>
                    <th scope="col" class="text-center">Tipo Responsable</th>
                    <th scope="col" class="text-center">Orden de Servicio</th>
                    <th scope="col" class="text-center">Placa</th>
                    <th scope="col" class="text-center">Proceso Taller</th>
                    <th scope="col" class="text-center">Tipo Movimiento</th>
                    <th scope="col" class="text-center">Fecha Movimiento</th>
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
    var tablaHistorial = $('#tableHistorial').DataTable({
        ajax: {
            url: '<?= base_url('historial/obtenerHistorialVehiculos') ?>',
            method: "POST",
            dataSrc: "",
        },
        order: [
            [6, 'desc']
        ],
        columns: [{
                data: null,
                render: function(data, type, row) {
                    return `<span>
                    ${row.tipo_tercero == 5 ? row.cliente : row.nombreAliado} 
                    </span>`
                }
            },
            {
                data: null,
                render: function(data, type, row) {
                    return `<span>
                    ${row.tipo_tercero == 5 ? 'Cliente' : row.razon_social}
                    </span>`
                }
            },
            {
                data: "n_orden"
            },
            {
                data: "placa",
                render: function(data, type, row) {
                    return '<span class="text-uppercase">' + row.placa + '</span>';
                }
            },
            {
                data: "estado"
            },
            {
                data: "tipo_movimiento"
            },
            {
                data: "fecha_movimiento"
            }
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
    });
</script>
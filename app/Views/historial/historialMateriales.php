<link rel="stylesheet" href="<?= base_url('css/vehiculos/vehiculos.css') ?>">

<!-- TABLA MOSTRAR VEHICULOS -->
<div id="content" class="p-4 p-md-5" style="background-color:rgba(0, 0, 0, 0.05);">
    <h2 class="text-center mb-4"><img style=" width:45px; height:45px; " src="<?php echo base_url('/img/historial-b.png') ?>" /> Historial Materiales</h2>
    <div class="table-responsive p-2">
        <div class="d-flex justify-content-center align-items-center flex-wrap ocultar">
            <b class="fs-6 text-black"> Ocultar Columnas:</b> <a class="toggle-vis btn" data-column="1">Material</a> - <a class="toggle-vis btn" data-column="5">Fecha de Movimiento</a>
        </div>
        <table class="table table-striped" id="tableHistorial" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">Material</th>
                    <th scope="col" class="text-center">Vehiculo</th>
                    <th scope="col" class="text-center">Trabajador</th>
                    <th scope="col" class="text-center">Cantidad</th>
                    <th scope="col" class="text-center">Fecha Movimiento</th>
                    <th scope="col" class="text-center">Tipo Movimiento</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <!-- TABLA DE VEHICULOS -->
            </tbody>
        </table>
    </div>
    <div class="footer-page mt-4">
        <button type="button" class="btn btnRedireccion d-flex gap-2 align-items-center" onclick="window.history.back()"><img src="<?= base_url('img/regresa.png') ?>" alt="icon-plus" width="20"> Regresar</button>
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
    var contador = 0
    var tablaHistorial = $('#tableHistorial').DataTable({
        ajax: {
            url: '<?= base_url('historial/obtenerMovimientoEnc') ?>',
            method: "POST",
            dataSrc: "",
        },
        columns: [{
                data : null, 
                render : function(data, type, row) {
                    contador = contador + 1;
                    return "<b>" + contador + "</b>";
                }
            },
            {
                data: "nombreMate"
            },
            {
                data : null,
                render : function(data, type, row) {
                    return row.placa == null ? "No se encontro auto" : row.placa
                } 
            },
  
            {
                data : null,
                render : function(data, type, row) {
                    return row.nombreTrabajador == null ? "No se encontro trabajador " : row.nombreTrabajador
                } 
            },
            {
                data : 'cantidad'
            },
            {
                data: "fecha_movimiento"
            },
            {
                data: "tipo_movimiento"
            }
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
    });
</script>
<link rel="stylesheet" href="<?= base_url('css/vehiculos/vehiculos.css') ?>">

<!-- TABLA MOSTRAR VEHICULOS -->
<div id="content" class="p-4 p-md-5" style="background-color:rgba(0, 0, 0, 0.05);">
    <h2 class="text-center mb-4"><img style=" width:45px; height:45px; " src="<?php echo base_url('/img/orden-entrega-b.png') ?>" /> Ordenes de entrega</h2>
    <div class="table-responsive p-2">
        <div class="d-flex justify-content-center align-items-center flex-wrap ocultar">
            <b class="fs-6 text-black"> Ocultar Columnas:</b> <a class="toggle-vis btn" data-column="2">Trabajador</a> - <a class="toggle-vis btn" data-column="4">Fecha de Movimiento</a>
        </div>
        <table class="table table-striped" id="tableHistorial" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <!-- <th scope="col" class="text-center">Material</th> -->
                    <th scope="col" class="text-center">N° de orden</th>
                    <th scope="col" class="text-center">Vehiculo</th>
                    <th scope="col" class="text-center">Cantidad</th>
                    <th scope="col" class="text-center">Fecha Movimiento</th>
                    <th scope="col" class="text-center">Subtotal</th>
                    <th scope="col" class="text-center">Tipo Movimiento</th>
                    <th scope="col" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <!-- TABLA DE VEHICULOS -->
            </tbody>
        </table>
    </div>
    <div class="footer-page mt-4">
        <button type="button" class="btn btnAccionF d-flex gap-2 align-items-center" onclick="window.history.back()"><img src="<?= base_url('img/regresa.png') ?>" alt="icon-plus" width="20"> Regresar</button>
        <button type="button" class="btn btnRedireccion" data-bs-toggle="modal" data-bs-target="#materialesModal" onclick="agregar(0, 1)"><img src="<?= base_url('img/plus.png') ?>" alt="icon-plus" width="20">
      Crear Orden</button>
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
            // {
            //     data: "nombreMate"
            // },
            {
                data : null,
                render : function(data, type, row) {
                    return row.nombreOrden == null ? "No se encontro orden de servicio" : row.nombreOrden; //
                } 
            },
  
            {
                data : null,
                render : function(data, type, row) {
                    return row.placa == null ? "No se encontro placa " : row.placa
                } 
            },
            {
                data : 'cantidad'
            },
            {
                data: "fecha_movimiento"
            },
            {
                data : null,
                render : function(data, type, row) {
                   return formatearCantidad(row.subtotal)
                } 
            },
            {
                data: "tipo_movimiento"
            },
            {
        data: null,
        render: function(data, type, row) {
            return (
            '<button class="btn" data-bs-target="#editarOrden" data-bs-toggle="modal"><img src="<?php echo base_url('img/edit.svg') ?>" alt="Boton Editar" title="Editar orden"></button>' +
            '<button class="btn" data-bs-target="#verDetalles" data-bs-toggle="modal" title="Ver Detalles"><i class="bi bi-eye-fill fs-4 text-primary"></i></button>' 

            
          );
        },
      }
            
            
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
    });
</script>
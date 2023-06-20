<link rel="stylesheet" href="<?= base_url('css/vehiculos/vehiculos.css') ?>">

<!-- TABLA MOSTRAR VEHICULOS -->
<div id="content" class="p-4 p-md-5" style="background-color:rgba(0, 0, 0, 0.05);">
    <h2 class="text-center mb-4"><img style=" width:45px; height:45px; " src="<?php echo base_url('/img/orden-entrega-b.png') ?>" /> Ordenes de entrega</h2>
    <div class="table-responsive p-2">
        <div class="d-flex justify-content-center align-items-center flex-wrap ocultar">
            <b class="fs-6 text-black"> Ocultar Columnas:</b> <a class="toggle-vis btn" data-column="2">Vehiculo</a> - <a class="toggle-vis btn" data-column="4">Fecha de Movimiento</a>
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
        <button type="button" onclick="detallesOrden()" class="btn btnRedireccion" data-bs-toggle="modal" data-bs-target="#ordenModal"><img src="<?= base_url('img/plus.png') ?>" alt="icon-plus" width="20">
            Crear Orden</button>
        <button type="button" class="btn btnAccionF d-flex gap-2 align-items-center" onclick="window.history.back()"><img src="<?= base_url('img/regresa.png') ?>" alt="icon-plus" width="20"> Regresar</button>
        <!-- <a href="< ?= base_url('usuarios/eliminados') ?>" class="btn btnAccionF"> <img src="< ?= base_url('img/delete.png') ?>" alt="icon-plus" width="20"> Eliminados</a> -->
    </div>
</div>
<form autocomplete="off" id="formularioTrabajadores">
    <div class="modal fade" id="ordenModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <input type="text" name="id" id="id" value="0" hidden>
        <input type="text" name="tp" id="tp" hidden>
        <div class="modal-dialog  modal-dialog-scrollable modal-lg">
            <div class="body-R">
                <div class="modal-content">
                    <div class="modal-header flex align-items-center gap-3">
                        <img src="<?= base_url('img/logo_empresa.png') ?>" alt="Logo Empresa" class="logoEmpresa" width="100">
                        <div class="d-flex align-items-center justify-content-center" style="width:auto;">
                            <img id="logoModal" src="<?= base_url('img/plus-b.png') ?>" alt="icon-plus" width="20">
                            <input type="text" name="idMovimientoEnc" id="idMovimientoEnc" hidden>
                            <h1 class="modal-title fs-5 text-center" id="tituloModal">Nueva Orden</h1>
                        </div>
                        <button type="button" class="btn" onclick="limpiarCampos()" data-bs-dismiss="modal" aria-label="Close">X</button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="d-flex column-gap-3" style="width: 100%">
                                <div class="mb-3" style="width: 100%">
                                    <label for="nombreOrdenS" class="col-form-label">N° Orden Servicio</label>
                                    <select style="background-color:#ECEAEA;" class="form-select form-select" name="ordenes" id="ordenes">
                                        <option selected>--Seleccione--</option>
                                        <?php foreach ($ordenes as $dato) { ?>
                                            <option value="<?= $dato['id_orden'] ?>"><?= $dato['n_orden'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="mb-3" style="width: 100%">
                                    <label for="nombre_s" class="col-form-label">N° Orden Entrega</label>
                                    <input type="text" value="1" name="nombre_s" class="form-control" id="numeroOrdenEnt" disabled>
                                </div>
                            </div>

                            <div class="mb-3" style="width: 100%">
                                <label for="exampleDataList" class="col-form-label">Trabajador:</label>
                                <select style="background-color:#ECEAEA;" class="form-select form-select" name="trabajadores" id="trabajadores">
                                    <option selected>--Seleccione--</option>
                                    <?php foreach ($trabajadores as $dato) { ?>
                                        <option value="<?= $dato['id_trabajador'] ?>"><?= $dato['nombreTrabajador'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <details id="datailInv" open>
                                <summary>Materiales a entregar</summary>

                                <div class="d-flex column-gap-3" style="width: 100%">
                                    <div class="mb-3" style="width: 100%;">
                                        <label for="exampleDataList" class="col-form-label">Tipo de Material:</label>
                                        <select style="background-color:#ECEAEA;" class="form-select form-select" name="tipo" id="tipoMat">
                                            <option selected>--Seleccione--</option>
                                            <?php foreach ($tipo as $dato) { ?>
                                                <option value="<?= $dato['id_param_det'] ?>"><?= $dato['nombre'] ?></option>
                                            <?php } ?>

                                        </select>
                                    </div>

                                    <div class="mb-3" style="width: 100%;">
                                        <label for="exampleDataList" class="col-form-label">Categorias o Bodega:</label>
                                        <select class="form-select form-control" name="tipoCate" id="tipoCate">
                                            <!-- SELECT DINAMICO -->
                                            <option value="1"> --Seleccione--</option>
                                        </select>
                                    </div>

                                    <button type="button" class="btn" style="border:none;background-color:gray;color:white; width: 34px; height:38px; margin-top:35px;" title="Agregar">+</button>
                                </div>
                                <div class="d-flex column-gap-3" style="width: 100%">


                                    </select>
                                    <input type="text" id="tpInventario" hidden>
                                    <table class="table table-striped" id="tableOrdenes" width="100%" cellspacing="0">
                                        <thead>
                                            <tr class="text-center">
                                                <th hidden></th>
                                                <th>Item</th>
                                                <th>Material</th>
                                                <th>Tipo</th>
                                                <th>Cantidad</th>
                                                <th>Precio</th>
                                                <th>Subtotal</th>
                                  

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="text-center">
                                                <td hidden><input type="text" id="materiales"></td>

                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                </td>

                                            </tr>


                                        </tbody>
                                    </table>
                            </details>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btnRedireccion" onclick="limpiarCampos()" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btnAccionF" id="btnGuardar">Crear orden</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

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
            url: '<?= base_url('ordenEntrega/obtenerOrdenEntrega') ?>',
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
                    return row.placa == null ? "No se encontro placa " : row.placa
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

    function limpiarCampos() {

        $("#tipo").val('--Seleccione--');
        $("#tipoCate").val('--Seleccione--');
        $("#trabajadores").val('--Seleccione--');
        $("#ordenes").val('--Seleccione--');
    }

    function detallesOrden(id_movimientoenc) {

        dataURL = "<?php echo base_url('/ordenEntrega/detallesOrden'); ?>" + "/" + id_movimientoenc;
        $.ajax({
            type: "POST",
            url: dataURL,
            dataType: "json",
            success: function(rs) {
                $("#idMovimientoEnc").val(rs[0]['id_movimientoEnc']);
                $("#numeroOrden").val(rs[0]['orden']);
            }
        })
    }


    function verTipoCate(id, idTipoCate) {
        $.ajax({
            url: '<?= base_url('ordenEntrega/buscarCate'); ?>',
            data: {
                idTipoCate: id
            },
            type: 'POST',
            success: function(res) {
                res = JSON.parse(res)
                var cadena
                if (id == 10) {
                    cadena = `<option selected value=""> -- Seleccione -- </option>`
                    for (let i = 0; i < res.length; i++) {
                        nombre = `${res[i].nombre}`;
                        cadena += `<option value=${res[i].id_param_det}>${res[i].nombre}</option>`
                        
                    }
                    $('#tipoCate').html(cadena)
                    $('#tipoCate').val(idTipoCate)
                
                   
                } else  {
                    console.log(id)
                    cadena = `<option selected value=""> -- Seleccione -- </option>`
                    for (let i = 0; i < res.length; i++) {
                        nombre = `${res[i].nombre}`;
                        cadena += `<option value=${res[i].id}>${res[i].nombre}</option>`

                    }
                    $('#tipoCate').html(cadena)
                    $('#tipoCate').val(idTipoCate)
                   
                }
            }
        })
    }
    $('#tipoMat').on('change', function(e) {
        id = $('#tipoMat').val()
        verTipoCate(id, '')
    })
</script>
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
        <button type="button" onclick="seleccionarOrden(<?= 0 . ',' . 1 ?>)" class="btn btnRedireccion" data-bs-toggle="modal" data-bs-target="#ordenModal"><img src="<?= base_url('img/plus.png') ?>" alt="icon-plus" width="20">
            Crear Orden</button>
        <button type="button" class="btn btnAccionF d-flex gap-2 align-items-center" onclick="window.history.back()"><img src="<?= base_url('img/regresa.png') ?>" alt="icon-plus" width="20"> Regresar</button>
        <!-- <a href="< ?= base_url('usuarios/eliminados') ?>" class="btn btnAccionF"> <img src="< ?= base_url('img/delete.png') ?>" alt="icon-plus" width="20"> Eliminados</a> -->
    </div>
</div>

<form autocomplete="off" id="formularioOrdenes">
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
                                    <label for="ordenesEnt" class="col-form-label">N° Orden Entrega</label>
                                    <input type="text" value="1" name="ordenesEnt" class="form-control" id="ordenesEnt" disabled>
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
                            <div class="d-flex column-gap-3" style="width: 100%">
                                <div class="mb-3" style="width: 100%;">
                                    <label for="tipoMat" class="col-form-label">Tipo de Material:</label>
                                    <select style="background-color:#ECEAEA;" class="form-select form-select" name="tipo" id="tipoMat">
                                        <option selected>--Seleccione--</option>
                                        <?php foreach ($tipo as $dato) { ?>
                                            <option value="<?= $dato['id_param_det'] ?>"><?= $dato['nombre'] ?></option>
                                        <?php } ?>

                                    </select>
                                </div>

                                <div class="mb-3" style="width: 100%;">
                                    <label for="tipoCate" class="col-form-label">Categorias o Bodega:</label>
                                    <select class="form-select" name="tipoCate" id="tipoCate">
                                        <!-- SELECT DINAMICO -->

                                    </select>
                                </div>
                            </div>

                            <details id="datailInv" open>
                                <summary>Materiales a entregar</summary>
                                <div class="d-flex column-gap-3" style="width: 100%">
                                    <div class="mb-3" style="width: 53%;">
                                        <label for="material" class="col-form-label">Materiales:</label>
                                        <select class="form-select" name="material" id="material">
                                            <!-- SELECT DINAMICO -->

                                        </select>
                                    </div>

                                    <div class="d-flex gap-3">
                                        <div class="mb-3" style="width: 100%">
                                            <label for="cantidad" class="col-form-label">Cantidad Actual</label>
                                            <input type="text" name="cantidadActual" class="form-control" id="cantidadActual" disabled>
                                        </div>

                                        <div class="mb-3" style="width: 100%">
                                            <label for="cantidadUsar" class="col-form-label">Cantidad a usar</label>
                                            <input type="text" name="cantidadUsar" class="form-control" id="cantidadUsar" onInput="validarInput()">
                                            <small id="msgUsar" style="color: red;  font-weight: 600;" class="invalido"></small>
                                        </div>


                                        <button type="button" id="agregarMaterial" class="btn" style="border:none;background-color:gray;color:white; width: 34px; height:38px; margin-top:35px;" title="Agregar">+</button>
                                    </div>


                                </div>
                                <div class="d-flex column-gap-3" style="width: 100%">


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
                                        <tbody id="bodyTable">


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
    let materialesOrden = []
    let objMaterial = {
        idInv: 0,
        idMaterial: 0,
        item: 0,
        nombre: '',
        tipo: 0,
        cantidad: 0,
        precio: 0
    }
    var validUsar = true
    var contador = 0
    var item = 0

    mostrarMateriales();

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

    function seleccionarOrden(id, tp) {
        if (tp == 2) {

        } else {
            $("#tp").val(1)
            $("#id").val(0)
            // $("#ordenes").val('')
            // $("#ordenesEnt").val('')
            // $("#trabajadores").val('')
        }
        // dataURL = "<?php echo base_url('/ordenEntrega/detallesOrden'); ?>" + "/" + id;
        // $.ajax({
        //     type: "POST",
        //     url: dataURL,
        //     dataType: "json",
        //     success: function(rs) {
        //         $("#idMovimientoEnc").val(rs[0]['id_movimientoEnc']);
        //         $("#numeroOrden").val(rs[0]['orden']);
        //     }
        // })
    }
    $('#tipoMat').on('change', function(e) {
        id = $('#tipoMat').val()
        verTipoCate(id, '')
    })

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
                        cadena += `<option value=${res[i].id}>${res[i].nombre}</option>`

                    }
                    $('#tipoCate').html(cadena)
                    $('#tipoCate').val(idTipoCate)


                } else {
                    console.log(id)
                    cadena = `<option selected value=""> -- Seleccione -- </option>`
                    for (let i = 0; i < res.length; i++) {
                        cadena += `<option value=${res[i].id_param_det}>${res[i].nombre}</option>`

                    }
                    $('#tipoCate').html(cadena)
                    $('#tipoCate').val(idTipoCate)

                }
            }
        })
    }
    $('#tipoCate').on('change', function(e) {
        id = $('#tipoCate').val()
        verMateriales(id)
    })

    function verMateriales(id) {
        console.log(id)
        tipo = $('#tipoMat').val()
        $.ajax({
            url: '<?= base_url('ordenEntrega/buscarMateriales') ?>',
            data: {
                tipo,
                id
            },
            type: 'POST',
            success: function(res) {
                res = JSON.parse(res)
                var cadena
                cadena = `<option selected value=""> -- Seleccione -- </option>`
                for (let i = 0; i < res.length; i++) {
                    cadena += `<option value=${res[i].id_material}>${res[i].nombre}</option>`

                }
                $('#material').html(cadena)

                // $('#tipoCate').val(id)

            }
        })
    }


    $('#material').on('change', function(e) {
        id = $('#material').val()
        $.ajax({
            url: '<?= base_url('insumos/buscarInsumo/') ?>' + id + '/' + '',
            data: {},
            type: 'POST',
            success: function(res) {
                res = JSON.parse(res)
                console.log(res)
                $('#cantidadActual').val(res[0]['cantidad_actual'])

                $('#cantidadUsar').on('input', function(e) {
                    idMaterial = $("#idMaterial").val()

                    cantidad = $('#cantidadUsar').val()
                    cantidadActual = $('#cantidadActual').val()

                    if (parseInt(cantidad) > parseInt(cantidadActual)) {
                        $('#msgUsar').text('* Valor invalido *')
                        $("#btnGuardar").attr('disabled', '');
                        validUsar = false
                    } else {
                        $('#msgUsar').text('')
                        validUsar = true
                        objMaterial = {
                            idInv: 0,
                            idMaterial: res[0].id_material,
                            item: materialesOrden.length + 1,
                            nombre: res[0].nombre,
                            tipo: res[0].tipo_material,
                            cantidad: Number($('#cantidadUsar').val()),
                            precio: Number(res[0].precio_venta),
                            subtotal: Number($('#cantidadUsar').val()) * Number(res[0].precio_venta)
                        }
                    }
                })
            }
        })
    })

    $('#agregarMaterial').on('click', function(e) {
        if (objMaterial.cantidad == 0 || validUsar == false) {
            return mostrarMensaje('error', '¡Ingrese una cantidad valida!')
        }
        materialesOrden.push(objMaterial)
        mostrarMateriales()
        objMaterial = {
            nombre: '',
            tipo: 0,
            cantidad: 0,
            precio: 0
        }
    })

    function mostrarMateriales() {
        console.log(materialesOrden)
        let cadena = ''
        if (materialesOrden.length == 0) {
            cadena = `  <tr>
                            <td colspan="6" class="text-center">NO HAY MATERIALES</td>            
                        </tr> `
        } else {

            for (let i = 0; i < materialesOrden.length; i++) {
                cadena += `  <tr>
                                <td class="text-center">${materialesOrden[i].item}</td>            
                                <td class="text-center">${materialesOrden[i].nombre}</td>            
                                <td class="text-center">${materialesOrden[i].tipo== 10 ?'Repuesto': 'Insumo'}</td>            
                                <td class="text-center">${materialesOrden[i].cantidad}</td>            
                                <td class="text-center">${formatearCantidad (materialesOrden[i].precio)}</td>            
                                <td class="text-center">${formatearCantidad(materialesOrden[i].subtotal)}</td>            
                            </tr> `
            }
        }
        $('#bodyTable').html(cadena)
        // $('#tableOrdenes')
    }

    function validarInput() {
        document.getElementById("btnGuardar").disabled = !document.getElementById("cantidadUsar").value.length;
    }

    $('#formularioOrdenes').on('submit', function(e) {
        e.preventDefault();
        tp = $("#tp").val()
        id = $("#id").val()
        ordenServicio = $("#ordenes").val()
        ordenesEnt = $("#ordenesEnt").val()
        trabajador = $("#trabajadores").val()

        if ([ordenServicio, trabajador].includes("") || materialesOrden.length == 0) {
            return mostrarMensaje('error', '¡Campos Vacios!')
        }
        $.ajax({
            type: "POST",
            url: '<?= base_url('ordenEntrega/insertar') ?>',
            data: {
                tp,
                ordenServicio,
                ordenesEnt,
                trabajador
            },
            dataType: 'json',
            success: function(data) {
                if (data == 2) {
                    return mostrarMensaje('error', '¡Ha ocurrido un error!')
                } else {
                    materialesOrden.forEach(item => {
                        $.ajax({
                            type: 'POST',
                            url: '<?= base_url('ordenEntrega/insertarDet') ?>',
                            data: {
                                tp,
                                idMovEnc: data,
                                idMaterial: item.idMaterial,
                                item: item.item,
                                cantidad: item.cantidad,
                                subtotal: item.subtotal
                            },
                            dataType: 'json',
                            success: function(data) {
                                if (data == 2) {
                                    return mostrarMensaje('error', '¡Ha ocurrido un error!')
                                }
                            }
                        })
                    })
                }
                if (tp == 1) {
                    mostrarMensaje('success', '¡Se ha Guardado la Orden de Entrega!')
                    setTimeout(() => {
                        window.location.reload()
                    }, 1000);
                } else {
                    mostrarMensaje('success', '¡Se ha Actualizado la Orden de Entrega!')
                }
            }
        })
    })
</script>
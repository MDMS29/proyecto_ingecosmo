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
                    <th scope="col" class="text-center">Fecha Movimiento</th>
                    <th scope="col" class="text-center">Subtotal</th>
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

<!--Editar-Agregar -->
<div class="modal fade" id="ordenModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <input type="text" name="id" id="id" hidden>
    <input type="text" name="tp" id="tp" hidden>
    <div class="modal-dialog  modal-dialog-scrollable modal-lg">
        <div class="body-R">
            <div class="modal-content">
                <div class="modal-header flex align-items-center gap-3">
                    <img src="<?= base_url('img/logo_empresa.png') ?>" alt="Logo Empresa" class="logoEmpresa" width="100">
                    <div class="d-flex align-items-center justify-content-center" style="width:auto;">
                        <img id="logoModal" src="<?= base_url('img/plus-b.png') ?>" alt="icon-plus" width="20">
                        <h1 class="modal-title fs-5 text-center" id="tituloModal">Nueva Orden</h1>
                    </div>
                    <button type="button" class="btn" onclick="limpiarCampos()" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <div class="d-flex column-gap-3" style="width: 100%">
                        <div class="mb-3" style="width: 100%">
                            <label for="nombreOrdenS" class="col-form-label">N° Orden Servicio: <i class="asterisco" style="color:crimson;">*</i></label>
                            <select style="background-color:#ECEAEA;" class="form-select form-select" name="ordenes" id="ordenes">
                                <option selected value="">--Seleccione--</option>
                                <?php foreach ($ordenes as $dato) { ?>
                                    <option value="<?= $dato['id_orden'] ?>"><?= $dato['n_orden'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3" style="width: 100%">
                            <label for="exampleDataList" class="col-form-label">Trabajador: <i class="asterisco" style="color:crimson;">*</i></label>
                            <select style="background-color:#ECEAEA;" class="form-select form-select" name="trabajadores" id="trabajadores">
                                <option selected value="">--Seleccione--</option>
                                <?php foreach ($trabajadores as $dato) { ?>
                                    <option value="<?= $dato['id_trabajador'] ?>"><?= $dato['nombreTrabajador'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex column-gap-3" style="width: 100%" id="tipoMatCat">
                        <div class="mb-3" style="width: 100%;">
                            <label for="tipoMat" class="col-form-label">Tipo de Material: <i class="asterisco" style="color:crimson;">*</i></label>
                            <select style="background-color:#ECEAEA;" class="form-select form-select" name="tipo" id="tipoMat">
                                <option selected value="">--Seleccione--</option>
                                <?php foreach ($tipo as $dato) { ?>
                                    <option value="<?= $dato['id_param_det'] ?>"><?= $dato['nombre'] ?></option>
                                <?php } ?>

                            </select>
                        </div>
                        <div class="mb-3" style="width: 100%;">
                            <label for="tipoCate" class="col-form-label">Categorias o Aseguradoras: <i class="asterisco" style="color:crimson;">*</i></label>
                            <select class="form-select" name="tipoCate" id="tipoCate">
                                <!-- SELECT DINAMICO -->
                            </select>
                        </div>
                    </div>
                    <details id="datailInv" open>
                        <summary>Materiales a entregar <i class="asterisco" style="color:crimson;">*</i></summary>
                        <div class="d-flex column-gap-3" style="width: 100%" id="MatCant">
                            <div class="mb-3" style="width: 53%;">
                                <label for="material" class="col-form-label">Materiales: <i class="asterisco" style="color:crimson;">*</i></label>
                                <select class="form-select" name="material" id="material">
                                    <!-- SELECT DINAMICO -->
                                </select>
                            </div>
                            <div class="d-flex gap-3">
                                <div class="mb-3" style="width: 100%">
                                    <label for="cantidad" class="col-form-label">Cantidad Actual:</label>
                                    <input type="text" name="cantidadActual" class="form-control" id="cantidadActual" disabled>
                                </div>

                                <div class="mb-3" style="width: 100%">
                                    <label for="cantidadUsar" class="col-form-label">Cantidad a usar: <i class="asterisco" style="color:crimson;">*</i></label>
                                    <input type="number" name="cantidadUsar" class="form-control" id="cantidadUsar" onInput="validarInput()">
                                    <small id="msgUsar" style="color: red;  font-weight: 600;" class="invalido"></small>
                                </div>
                                <button type="button" id="agregarMaterial" class="btn" style="border:none;background-color:gray;color:white; width: 34px; height:38px; margin-top:35px;" title="Agregar">+</button>
                            </div>

                            <div class="d-flex gap-3">
                                <div class="mb-3" style="width: 100%">
                                    <label for="cantidad" class="col-form-label">Cantidad de pintura:</label>
                                    <input type="text" name="cantidadPintura" class="form-control" id="cantidadPintura"     >
                                </div>

                                <div class="mb-3" style="width: 100%">
                                    <label for="cantidadUsar" class="col-form-label">Gramos: <i class="asterisco" style="color:crimson;">*</i></label>
                                    <input type="number" name="gramos" class="form-control" id="gramos" onInput="validarInput()">
                                    <small id="msgUsar" style="color: red;  font-weight: 600;" class="invalido"></small>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex column-gap-3" style="width: 100%">
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
                                        <th class="btnO">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="bodyTable">

                                </tbody>
                            </table>
                    </details>
                    <input type="text" id="idInvent" value="0" hidden>
                </div>
                <div class="modal-footer">
                    <label class="campObl" style="color: gray; margin-inline-end: auto;">(*) Campos obligatorios.</label>
                    <button type="button" class="btn btnAccionF" data-bs-dismiss="modal">Cerrar</button>
                    <input type="submit" class="btn btnRedireccion" id="btnGuardar" value="Crear orden">
                </div>
            </div>
        </div>
    </div>
</div>

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
                data: "fecha_movimiento"
            },
            {
                data: null,
                render: function(data, type, row) {
                    return formatearCantidad(row.subtotal)
                }
            },
            {
                data: null,
                render: function(data, type, row) {
                    return (
                        '<button class="btn" onclick="seleccionarOrden(' + data.id_movimientoenc + ', 2)" data-bs-target="#ordenModal" data-bs-toggle="modal"><img src="<?php echo base_url('img/edit.svg') ?>" alt="Boton Editar" title="Editar Orden"></button>' +
                        '<button class="btn" id="btnVer" onclick="seleccionarOrden(' + data.id_movimientoenc + ',3)" data-bs-target="#ordenModal" data-bs-toggle="modal" title="Ver Detalles"><i class="bi bi-eye-fill fs-4 text-primary"></i></button>'

                    );
                },
            }


        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
    });

    function limpiarCampos() {

        $("#tipo").val('');
        $("#tipoCate").val('');
        $("#trabajadores").val('');
        $("#ordenes").val('');
        $("#material").val('');


    }

    function seleccionarOrden(id, tp) {
        $('#idInvent').val('0')
        if (tp == 2) {
            $.ajax({
                type: "POST",
                url: "<?= base_url('ordenEntrega/buscarOrden/') ?>" + id,
                dataType: "json",
                success: function(rs) {
                    $('#id').val(id)
                    $('#tp').val(2)
                    materialesOrden = []
                    mostrarMateriales()
                    $('#ordenes').val(rs['id_orden'])
                    $('#trabajadores').val(rs['id_trabajador'])

                    $.ajax({
                        type: "POST",
                        url: "<?= base_url('ordenEntrega/buscarDetallesOrden/') ?>" + id,
                        dataType: "json",
                        success: function(data) {
                            for (let i = 0; i < data.length; i++) {
                                $.ajax({
                                    type: "POST",
                                    url: "<?= base_url('insumos/buscarInsumo/') ?>" + data[i].id_material,
                                    dataType: "json",
                                    success: function(res) {
                                        objMaterial = {
                                            idInv: data[i].id_movimientodet,
                                            idMaterial: res.id_material,
                                            item: materialesOrden.length + 1,
                                            nombre: res.nombre,
                                            tipo: res.tipo_material,
                                            cantidad: data[i].cantidad,
                                            precio: Number(res.precio_venta),
                                            subtotal: data[i].cantidad * Number(res.precio_venta)
                                        }
                                        materialesOrden.push(objMaterial);
                                        mostrarMateriales(0)
                                    }
                                })
                            }
                        }
                    })

                    $('#tituloModal').text('Editar')
                    $('#logoModal').attr('src', '<?= base_url('img/editar1.png') ?>')
                    $('#logoModal').attr('width', '25')
                    $('#btnGuardar').val('Actualizar')
                    $('#btnGuardar').removeAttr('hidden', '')

                    $('#ordenes').removeAttr('disabled', '')
                    $('#trabajadores').removeAttr('disabled', '')
                    $('#tipoMatCat').removeAttr('hidden', '')
                    $('#MatCant').addClass('d-flex')
                    $('#MatCant').removeAttr('hidden', '')
                    $('.asterisco').hide()
                    $('.campObl').hide()
                    $('.btnO').show()



                }

            })
        }
        if (tp == 3) {
            $.ajax({
                type: "POST",
                url: "<?= base_url('ordenEntrega/buscarOrden/') ?>" + id,
                dataType: "json",
                success: function(rs) {
                    $('#id').val(id)
                    $('#tp').val(2)
                    materialesOrden = []
                    mostrarMateriales()
                    $('#ordenes').val(rs['id_orden'])
                    $('#trabajadores').val(rs['id_trabajador'])
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url('ordenEntrega/buscarDetallesOrden/') ?>" + id,
                        dataType: "json",
                        success: function(data) {
                            for (let i = 0; i < data.length; i++) {
                                $.ajax({
                                    type: "POST",
                                    url: "<?= base_url('insumos/buscarInsumo/') ?>" + data[i].id_material,
                                    dataType: "json",
                                    success: function(res) {
                                        objMaterial = {
                                            idInv: data[i].id_movimientodet,
                                            idMaterial: res.id_material,
                                            item: materialesOrden.length + 1,
                                            nombre: res.nombre,
                                            tipo: res.tipo_material,
                                            cantidad: data[i].cantidad,
                                            precio: Number(res.precio_venta),
                                            subtotal: data[i].cantidad * Number(res.precio_venta)
                                        }
                                        materialesOrden.push(objMaterial);
                                        mostrarMateriales()
                                    }
                                })
                            }
                        }
                    })

                    $('#tituloModal').text('Ver Detalles ')
                    $('#logoModal').attr('src', '<?= base_url('img/orden-entrega-b.png') ?>')
                    $('#logoModal').attr('width', '25')


                    $('#btnGuardar').attr('hidden', '')
                    $('#ordenes').attr('disabled', '')
                    $('#trabajadores').attr('disabled', '')
                    $('#tipoMatCat').removeClass('d-flex')
                    $('#tipoMatCat').css('display', 'none')
                    $('#MatCant').removeClass('d-flex')
                    $('#MatCant').css('display', 'none')
                    $('#MatCant').attr('hidden', '')
                    $('.asterisco').hide()
                    $('.campObl').hide()
                    $('.btnO').hide()





                }

            })
        } else {
            $('#tituloModal').text('Nueva Orden')
            $('#logoModal').attr('src', '<?= base_url('img/plus-b.png') ?>')
            $('#logoModal').attr('width', '25')

            $("#tp").val(1)
            $("#id").val(0)
            $('#btnGuardar').val('Guardar')
            $('#ordenes').val('')
            $('#trabajadores').val('')
            $('#tipoCate').val('')
            $('#tipoMat').val('')
            $('#material').val('')

            $('#btnGuardar').removeAttr('hidden', '')
            $('#ordenes').removeAttr('disabled', '')
            $('#trabajadores').removeAttr('disabled', '')
            $('#tipoMatCat').removeAttr('hidden', '')
            $('#tipoMatCat').addClass('d-flex')
            $('#MatCant').addClass('d-flex')
            $('#MatCant').removeAttr('hidden', '')
            $('.asterisco').show()
            $('.campObl').show()
            $('.btnO').show()



            materialesOrden = []
            mostrarMateriales(0)



            $("#cantidadActual").val('');
            $("#cantidadUsar").val('');

        }

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
        verMateriales(id, 0)
    })

    function verMateriales(id, idMaterial) {
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
                $('#material').val(idMaterial)

                // $('#tipoCate').val(id)

            }
        })
    }

    $('#material').on('change', function(e) {
        id = $('#material').val()
        infoMaterial(id)
    })

    function infoMaterial(id) {
        $.ajax({
            type: 'POST',
            url: '<?= base_url('insumos/buscarInsumo/') ?>' + id + '/' + '',
            data: {},
            success: function(res) {
                res = JSON.parse(res)
                $('#cantidadActual').val(res['cantidad_actual'])

                $('#cantidadUsar').on('input', function(e) {
                    idMaterial = $("#idMaterial").val()

                    cantidad = $('#cantidadUsar').val()
                    cantidadActual = $('#cantidadActual').val()
                    idInv = $('#idInvent').val()

                    if (parseInt(cantidad) > parseInt(cantidadActual)) {
                        $('#msgUsar').text('* Valor invalido *')
                        $("#btnGuardar").attr('disabled', '');
                        validUsar = false
                    } else {
                        $('#msgUsar').text('')
                        validUsar = true
                        objMaterial = {
                            idInv: idInv == 0 ? 0 : idInv,
                            idMaterial: res.id_material,
                            item: materialesOrden.length + 1,
                            nombre: res.nombre,
                            tipo: res.tipo_material,
                            cantidad: Number($('#cantidadUsar').val()),
                            precio: Number(res.precio_venta),
                            subtotal: Number($('#cantidadUsar').val()) * Number(res.precio_venta)

                        }
                    }
                })
            }
        })
    }

    $('#agregarMaterial').on('click', function(e) {
        if (objMaterial.cantidad == 0 || validUsar == false) {
            return mostrarMensaje('error', '¡Datos vacios o invalidos !')
        }

        let objDestMat = materialesOrden.filter(r => r.idMaterial == objMaterial.idMaterial)[0]

        if (objDestMat != undefined) {
            const {
                cantidad,
                precio
            } = objDestMat

            let nuevaCant = Number(cantidad) + Number(objMaterial.cantidad)

            let nuevoSub = precio * nuevaCant
            materialesOrden.filter(r => r.idMaterial == objMaterial.idMaterial)[0].cantidad = nuevaCant
            materialesOrden.filter(r => r.idMaterial == objMaterial.idMaterial)[0].subtotal = nuevoSub
        } else {
            materialesOrden.push(objMaterial)
        }

        mostrarMateriales(0)
        objMaterial = {
            nombre: '',
            tipo: 0,
            cantidad: 0,
            precio: 0
        }


        $("#tipoMat").val('');
        $("#tipoCate").val('');
        $("#material").val('');
        $("#cantidadActual").val('');
        $("#cantidadUsar").val('');
        $('#idInvent').val('0')


    })



    function mostrarMateriales(tipo) {
        let cadena = ''
        if (materialesOrden.length == 0) {
            cadena = `  <tr class="pp2">
                            <td colspan="7" id="td" class="text-center">NO HAY MATERIALES</td>            
                        </tr> `
        } else {

            for (let i = 0; i < materialesOrden.length; i++) {
                cadena += `  <tr id="${materialesOrden[i].idInv}">
                                <td class="text-center">${materialesOrden[i].item}</td>            
                                <td id="${materialesOrden[i].idMaterial}" class="text-center">${materialesOrden[i].nombre}</td>            
                                <td id="${materialesOrden[i].tipo}" class="text-center">${materialesOrden[i].tipo== 10 ?'Repuesto': 'Insumo'}</td>            
                                <td class="text-center">${materialesOrden[i].cantidad}</td>            
                                <td class="text-center">${formatearCantidad (materialesOrden[i].precio)}</td>            
                                <td class="text-center">${formatearCantidad(materialesOrden[i].subtotal)}</td>

                                ${tipo == 0 ? ` <td>
                                 <button class="btn" onclick="editarMateriales(${materialesOrden[i].idMaterial}, ${materialesOrden[i].idInv})"><img src="<?= base_url('img/edit.svg') ?>" title="Editar Material"></button> 
                                <button class="btn" onclick="eliminarMaterial(${materialesOrden[i].idMaterial}, ${materialesOrden[i].idInv})"><img src="<?= base_url('img/delete.svg') ?>" title="Eliminar Material"></button></td>  ` : ''}       
                            </tr> `
            }
        }
        $('#bodyTable').html(cadena)

        // $('#tableOrdenes')
    }

    function editarMateriales(idMaterial, idInv) {
        const fila = $(`#${idInv}`);
        const material = fila.find('td').eq(1).attr('id');
        const tipo = fila.find('td').eq(2).attr('id');
        const cantidad = fila.find('td').eq(3).text();

        $.ajax({
            type: 'POST',
            url: '<?= base_url('insumos/buscarInsumo/') ?>' + idMaterial + '/' + '',
            data: {},
            success: function(res) {
                const data = JSON.parse(res)
                $('#tipoMat').val(tipo);
                $('#cantidadUsar').val(cantidad);
                $('#cantidadActual').val(data.cantidad_actual)
                $('#idInvent').val(fila.attr('id'));
                verTipoCate(tipo, data.categoria_material)
                verMateriales(data.categoria_material, material)
                infoMaterial(material)
                materialesOrden = materialesOrden.filter(r => r.idMaterial !== material)
                mostrarMateriales(0)

            }
        })




    }
    function eliminarMaterial(idMaterial, idInv) {
        tp = $('#tp').val()
         borrador = [idInv]
         if (tp == 2) {
             // Consulta tipo delete
             $.ajax({
                 url: '<?= base_url('ordenEntrega/eliminarMaterial/') ?>' + idInv,
                 type: 'POST',
                dataType: 'json',
                 success: function(data) {
                     if (data == 1) {
                        mostrarMensaje('success', '¡Se ha eliminado el material!')

                    }
                }
            })
         }

        tablaHistorial.ajax.reload(null, false)
        materialesOrden = materialesOrden.filter(mat => mat.idInv != idInv)
        mostrarMateriales(0) //Actualizar tabla
    }


    function validarInput() {
        document.getElementById("btnGuardar").disabled = !document.getElementById("cantidadUsar").value.length;
    }




    $('#btnGuardar').on('click', function(e) {
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
            url: '<?= base_url('ordenEntrega/insertar') ?>',
            type: "POST",
            dataType: 'json',
            data: {
                id,
                tp,
                ordenServicio,
                ordenesEnt,
                trabajador
            }
        }).done(function(data) {
            if (data == 0) {
                return mostrarMensaje('error', '¡Ha ocurrido un error!')
            } else {
                materialesOrden.forEach(item => {
                    $.ajax({
                        url: '<?= base_url('ordenEntrega/insertarDet') ?>',
                        type: 'POST',
                        data: {

                            tp,
                            idMovEnc: data,
                            idMovDet: item.idInv,
                            idMaterial: item.idMaterial,
                            item: item.item,
                            cantidad: item.cantidad,
                            subtotal: item.subtotal
                        },
                        dataType: 'json',
                        success: function(data) {
                            if (data == 0) {
                                return mostrarMensaje('error', '¡Ha ocurrido un error!')
                            }
                            contador = 0
                            tablaHistorial.ajax.reload(null, false)
                        }
                    })
                })
            }
            if (tp == 1) {
                $('#ordenModal').modal('hide')
                return mostrarMensaje('success', '¡Se ha Guardado la Orden de Entrega!')
            } else {
                $('#ordenModal').modal('hide')
                return mostrarMensaje('success', '¡Se ha Actualizado la Orden de Entrega!')
            }
            contador = 0
            tablaHistorial.ajax.reload(null, false)
        })
    })
</script>
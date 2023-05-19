<link rel="stylesheet" href="<?= base_url('css/vehiculos/vehiculos.css') ?>">
<!-- TABLA MOSTRAR VEHICULOS -->
<div id="content" class="p-4 p-md-5" style="background-color:rgba(0, 0, 0, 0.05);">
    <h2 class="text-center mb-4"><img style=" width:45px; height:45px; " src="<?php echo base_url('/img/vehiculo-b.png') ?>" /> Vehiculos</h2>
    <div class="table-responsive p-2">
        <div class="d-flex justify-content-center align-items-center flex-wrap ocultar">
            <b class="fs-6 text-black"> Ocultar Columnas:</b> <a class="toggle-vis btn" data-column="1">Responsable</a> - <a class="toggle-vis btn" data-column="2">Tipo Responsable</a> - <a class="toggle-vis btn" data-column="4">Modelo</a> - <a class="toggle-vis btn" data-column="5">Marca</a> - <a class="toggle-vis btn" data-column="6">Color</a> - <a class="toggle-vis btn" data-column="7">Kilometraje</a> - <a class="toggle-vis btn" data-column="8">Combustible</a>
        </div>
        <table class="table table-striped" id="tableVehiculos" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Orden de Trabajo</th>
                    <th scope="col" class="text-center">Responsable</th>
                    <th scope="col" class="text-center">Tipo Responsable</th>
                    <th scope="col" class="text-center">Placa</th>
                    <th scope="col" class="text-center">Modelo</th>
                    <th scope="col" class="text-center">Marca</th>
                    <th scope="col" class="text-center">Color</th>
                    <th scope="col" class="text-center">Kilometraje</th>
                    <th scope="col" class="text-center">Combustible</th>
                    <th scope="col" class="text-center">Fecha Entrada</th>
                    <th scope="col" class="text-center">Fecha Salida</th>
                    <th scope="col" class="text-center">Proceso Taller</th>
                    <th scope="col" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <!-- TABLA DE VEHICULOS -->
            </tbody>
        </table>
    </div>
    <div class="footer-page mt-4">
        <button type="button" class="btn btnRedireccion" data-bs-toggle="modal" data-bs-target="#agregarVehiculo" onclick="seleccionarVehiculo(<?= 0 . ',' . 1 ?>)"><img src="<?= base_url('img/plus.png') ?>" alt="icon-plus" width="20"> Agregar</button>
    </div>
</div>

<!-- FORMULARIO PARA AGREGAR - EDITAR VEHICULO -->
<form autocomplete="off" id="formularioVehiculos">
    <div class="modal fade" id="agregarVehiculo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <input type="text" name="id" id="id" hidden>
        <input type="text" name="tp" id="tp" hidden>
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="body-R">
                <div class="modal-content">
                    <div class="modal-header d-flex align-items-center justify-content-between">
                        <img src="<?= base_url('img/logo_empresa.png') ?>" alt="Logo Empresa" class="logoEmpresa" width="90">
                        <h1 class="modal-title fs-5 text-center" id="tituloModal"><!-- TEXTO DINAMICO--></h1>
                        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">X</button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="d-flex column-gap-3" style="width: 100%">
                                <div class="mb-3" style="width: 100%">
                                    <label for="tipoCliente" class="col-form-label">Tipo Responsable:</label>
                                    <select class="form-select form-select" name="tipoCliente" id="tipoCliente">
                                        <option selected value="">-- Seleccione --</option>
                                        <?php foreach ($tipoClientes as $cliente) { ?>
                                            <option value="<?= $cliente['id'] ?>"><?= $cliente['nombre'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="mb-3" style="width: 100%">
                                    <label for="cliente" class="col-form-label">Responsable:</label>
                                    <select class="form-select form-select" name="cliente" id="cliente">
                                        <!-- SELECT DINAMICO -->
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex column-gap-3" style="width: 100%">
                                <div class="mb-3" style="width: 100%">
                                    <label for="ordenTrabajo" class="col-form-label">Orden de Trabajo:</label>
                                    <input type="number" name="ordenTrabajo" class="form-control" id="ordenTrabajo">
                                    <small id="msgOrden" class="invalido"></small>
                                </div>
                                <div class="mb-3" style="width: 100%">
                                    <label for="placa" class="col-form-label">Placa:</label>
                                    <input type="text" minlength="6" maxlength="8" class="form-control text-uppercase" name="placa" id="placa">
                                    <input type="hidden" id="placaHidden">
                                    <small id="msgPlaca" class="invalido"></small>
                                </div>
                            </div>
                            <div class="d-flex column-gap-3" style="width: 100%">
                                <div class="mb-3" style="width: 100%">
                                    <label for="marca" class="col-form-label">Marca:</label>
                                    <select class="form-select form-select" name="marca" id="marca">
                                        <option selected value="">-- Seleccione --</option>
                                        <?php foreach ($marcas as $marca) { ?>
                                            <option value="<?= $marca['id_marca'] ?>"><?= $marca['nombre'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex column-gap-3" style="width: 100%">
                                <div class="mb-3" style="width: 100%">
                                    <label for="nFabrica" class="col-form-label">No. Fabrica:</label>
                                    <select class="form-select form-select" name="nFabrica" id="nFabrica">
                                        <option selected value="">-- Seleccione --</option>
                                        <?php $years = range(2035, 1990); ?>
                                        <?php foreach ($years as $year) : ?>
                                            <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-3" style="width: 100%">
                                    <div class="">
                                        <label for="color" class="col-form-label">Color:</label>
                                        <input type="text" name="color" class="form-control" id="color" minlength="4">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex column-gap-3" style="width: 100%">
                                <div class="mb-3" style="width: 100%">
                                    <label for="kms" class="col-form-label">Kilometraje:</label>
                                    <div class="d-flex">
                                        <input type="number" name="kms" class="form-control" id="kms">
                                    </div>
                                </div>
                                <div class="mb-3" style="width: 100%">
                                    <label for="combustible" class="col-form-label">Combustible:</label>
                                    <select class="form-select form-select" name="combustible" id="combustible">
                                        <option selected value="">-- Seleccione --</option>
                                        <?php foreach ($combustible as $com) { ?>
                                            <option value="<?= $com['id'] ?>"><?= $com['nombre'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                            </div>
                            <div class="d-flex column-gap-3" style="width: 100%">
                                <div class="mb-3" style="width: 100%">
                                    <div class="mb-3">
                                        <label for="estado" class="col-form-label">Estado:</label>
                                        <select class="form-select form-select" name="estado" id="estado">
                                            <option selected value="">-- Seleccione --</option>
                                            <?php foreach ($estadosVehi as $estado) { ?>
                                                <option value="<?= $estado['id'] ?>"><?= $estado['nombre'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex column-gap-3" style="width: 100%">
                                <div class="mb-3" style="width: 100%">
                                    <label for="fechaEntrada" class="col-form-label">Fecha Entrada:</label>
                                    <div class="d-flex">
                                        <input type="date" name="fechaEntrada" id="fechaEntrada" class="form-control">
                                    </div>
                                </div>
                                <div class="mb-3" style="width: 100%">
                                    <label for="fechaEntrada" class="col-form-label">Fecha Salida:</label>
                                    <div class="d-flex">
                                        <input type="date" name="fechaSalida" id="fechaSalida" class="form-control">
                                    </div>
                                    <small id="msgFecha" class="invalido"></small>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btnRedireccion" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btnAccionF" id="btnGuardar"><!-- TEXTO DIANMICO --></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- MODAL CAMBIAR ESTADO DEL VEHICULO -->
<div class="modal fade" id="cambiarEstado" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="body-R">
            <div class="modal-content">
                <input type="hidden" name="idVehi" id="idVehi">
                <div class="modal-header flex justify-content-between align-items-center">
                    <img src="<?= base_url('img/ingecosmo.png') ?>" alt="logo-empresa" width="60" height="60">
                    <h1 class="modal-title fs-5 text-center " id="tituloModalEstado"><img src="<?= base_url('img/plus-b.png') ?>" alt="" width="30" height="30"><!-- TEXTO DINAMICO  --></h1>
                    <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close" onclick="limpiarCampos('estadoVehiculo')">X</button>
                </div>
                <div class="modal-body">
                    <div class="container p-4" style="background-color: #d9d9d9;border-radius:10px;">
                        <label for="prioridad" class="col-form-label">Cambiar Estado:</label>
                        <select class="form-select form-select" name="estadoVehiculo" id="estadoVehiculo">
                            <option selected value="">-- Seleccione --</option>
                            <?php foreach ($estadosVehi as $estado) { ?>
                                <option value="<?= $estado['id'] ?>"><?= $estado['nombre'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btnRedireccion" data-bs-toggle="modal" data-bs-target="#agregarUsuario" onclick="limpiarCampos('estadoVehiculo')">Cerrar</button>
                    <button type="button" class="btn btnAccionF" id="btnCambiarEstado">Agregar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    var validOrden = true
    var validPlaca = true
    var validFecha = true

    function limpiarCampos(input) {
        $(`#${input}`).val('')
    }
    //Mostrar Ocultar Columnas
    $('a.toggle-vis').on('click', function(e) {
        e.preventDefault();
        // Get the column API object
        var column = tablaVehiculos.column($(this).attr('data-column'));
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
    //Tabla de vehiculos
    var tablaVehiculos = $('#tableVehiculos').DataTable({
        ajax: {
            url: '<?= base_url('vehiculos/obtenerVehiculos') ?>',
            method: "POST",
            dataSrc: "",
        },
        columns: [{
                data: "n_orden"
            },
            {
                data: null,
                render: function(data, type, row) {
                    return `<span id="spanCliente" class=${row.estadoTercer == 'I' ? 'invalido' : ''} >
                    ${row.tipo_tercero == 5 ? row.cliente : row.razon_social} ${row.estadoTercer == 'I' ? ' - Inactivo' : ''}
                    </span>`
                }
            },
            {
                data: "tipo_propietario"
            },
            {
                data: "placa",
                render: function(data, type, row) {
                    return (
                        '<span class="text-uppercase">' + row.placa + '</span>'
                    )
                }
            },
            {
                data: 'modelo'
            },
            {
                data: 'marca'
            },
            {
                data: 'color'
            },
            {
                data: 'kms'
            },
            {
                data: 'combustible'
            },
            {
                data: "fecha_entrada",
                render: function(data, type, row) {
                    var fechaTe = new Date(data);
                    var fecha = new Date(data);
                    var anio = fecha.getFullYear();
                    var mes = fecha.getMonth() + 1;
                    var dia = fecha.getDate() + 1;
                    return anio + "-" + (mes < 10 ? '0' + mes : mes) + "-" + (dia < 10 ? '0' + dia : dia);
                }
            },

            {
                data: "fecha_salida",
                render: function(data, type, row) {
                    let fechaValid;
                    var fecha = new Date(data);
                    fecha.setDate(fecha.getDate() + 1);
                    var anio = fecha.getFullYear();
                    var mes = fecha.getMonth() + 1;
                    var dia = fecha.getDate();
                    var fechaData = anio + "-" + (mes < 10 ? '0' + mes : mes) + "-" + (dia < 10 ? '0' + dia : dia);
                    //Validar fecha
                    var fechaTem = (dia < 10 ? dia : dia) + "/" + (mes < 10 ? mes : mes) + "/" + anio;
                    var fechaActual = new Date();
                    if (row.estado == 'Entregado') {
                        fechaValid = 'entregado'
                    } else if (fechaActual.toLocaleDateString() === fecha.toLocaleDateString()) {
                        fechaValid = 'hoy';
                    } else if (fechaActual > fecha) {
                        fechaValid = 'pasada';
                    } else {
                        fechaValid = '';
                    }
                    return '<span id="spanValid" class="' + fechaValid + '"> ' + fechaData + ' </span>';
                }

            },
            {
                data: 'estado'
            },
            {
                data: null,
                render: function(data, type, row) {
                    return (
                        '<button class="btn" onclick="seleccionarVehiculo(' + data.id_vehiculo + ',2)" data-bs-target="#agregarVehiculo" data-bs-toggle="modal"><img src="<?php echo base_url('img/edit.svg') ?>" alt="Boton Editar" title="Editar Usuario"></button>' +
                        '<button class="btn" data-href=' + data.id_vehiculo + ' data-bs-toggle="modal" data-bs-target="#cambiarEstado"><img src="<?php echo base_url("img/cambiar-estado.png") ?>" alt="Boton Eliminar" title="Cambiar Estado" width="20"></button>' +
                        '<button class="btn btn-danger" onclick="pdf(' + data.id_vehiculo + ')">PDF</button>'
                    )
                }
            }
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }
    });


    function pdf(id) {
        $.ajax({
            url: "<?= base_url('vehiculos/pdf') ?>",
            type: 'POST',
            data: {
                // orden: '',
                // placa: '',
                // id
            },
            dataType: 'json',
            success: function(data) {
                console.log(data)
                window.location.href = "<?= base_url() ?>" + data
                // LLORAR
                $("#tbl_cotiza").on('blur', '.verCotizacion', function() {
        var currentRow = $(this).closest("tr");
        var numero = currentRow.find("td:eq(0)").html();
        var ruta = "<?php echo base_url(); ?>/cotizaciones/cotizacion/" + numero;
        var iframe = document.getElementById("ifr_PDF");
        iframe.setAttribute("src", ruta);
        //$('#ifr_PDF').attr("src");
        //$('#ifr_PDF').attr("src", $('#ifr_PDF').attr("src"));
        $('#modal-pdf').modal('show');
    });

                // doc = new jsPDF();
                // doc.setFontSize(12);
                // // cabezera
                // // var imageUrl = 'https://e7.pngegg.com/pngimages/989/941/png-clipart-spider-man-comics-spider-man-heroes-superhero.png';

                // // // Agregar la imagen al documento
                // // doc.addImage(imageUrl, 'PNG', 15, 15, 50, 50, 'Logo Empresa', 'FAST', 0);

                // doc.text('FECHA ENTRADA', 74, 10);
                // doc.text(`${data['fecha_entrada']}`, 81, 20);

                // doc.text('FECHA SALIDA', 122, 10);
                // doc.text(`${data['fecha_salida']}`, 125, 20);

                // doc.text('ORDEN DE TRABAJO', 160, 10);
                // doc.text(`No. ${data['n_orden']}`, 175, 20);
                // // cuerpo

                // doc.setFontSize(12)
                // // Info Cliente
                // doc.text('PROPIETARIO', 3, 30);
                // doc.text(`${data.tipo_tercero == 5 ? data.nomCliente : data.razon_social}`, 3, 36);

                // doc.text('C.C. o NIT', 3, 44);
                // doc.text(`${data.identificacion}`, 3, 50);

                // var telefono = '';
                // $.ajax({
                //     type: 'POST',
                //     url: '< ?php echo base_url('telefonos/obtenerTelefonosUser/') ?>' + data.cliente + '/' + data.tipo_propietario,
                //     dataType: 'json',
                //     async: false, // Establece el modo de solicitud sincrónica para obtener el resultado antes de continuar
                //     success: function(response) {
                //         if (response.length > 0) {
                //             telefono = response[0][0].numero;
                //         }
                //     }
                // });
                // doc.text('Telefono', 3, 58);
                // doc.text(`${telefono}`, 3, 64);
                // //Divisiones
                // doc.setLineWidth(1)
                // // doc.line(0, 25, 500, 25, 'F')
                // doc.setDrawColor(22, 22, 102);
                // doc.rect(0, 0, 70, 25);
                // doc.rect(70, 0, 47, 25);
                // doc.rect(117, 0, 41, 25);
                // doc.rect(158, 0, 52, 25);
                // doc.rect(70, 15, 140, 10);

                // // Info Auto
                // doc.text('MARCA', 72, 30);
                // doc.text(`${data['marca']}`, 90, 30);

                // doc.text('No. FAB', 72, 37);
                // doc.text(`${data['modelo']}`, 90, 37);

                // doc.text('COLOR', 72, 44);
                // doc.text(`${data['color']}`, 90, 44);

                // doc.text('PLACA', 72, 51);
                // doc.text(`${data['placa']}`, 90, 51);

                // doc.text('KMS', 72, 58);
                // doc.text(`${data['kms']}`, 90, 58);

                // doc.save(`${data['n_orden']}_.pdf`);
            }
        })
    }

    //Tomar informacion del vehiculo
    function seleccionarVehiculo(id, tp) {
        if (tp == 2) {
            $.ajax({
                url: "<?= base_url('vehiculos/buscarVehiculo') ?>",
                type: 'POST',
                data: {
                    orden: '',
                    placa: '',
                    id
                },
                dataType: 'json',
                success: function(data) {
                    verTipoCliente(data['tipo_propietario'], data['cliente'])
                    $('#tp').val(2)
                    $('#id').val(id)
                    $('#ordenTrabajo').removeAttr('disabled')
                    $('#ordenTrabajo').val(data['n_orden'])
                    $('#tipoCliente').val(data['tipo_propietario'])
                    $('#placa').val(data['placa'])
                    $('#placaHidden').val(data['placa'])
                    $('#cliente').val(data['cliente'])
                    $('#marca').val(data['id_marca'])
                    $('#nFabrica').val(data['modelo'])
                    $('#color').val(data['color'])
                    $('#kms').val(data['kms'])
                    $('#combustible').val(data['combustible'])
                    $('#estado').val(data['estado'])
                    $('#fechaEntrada').val(data['fecha_entrada'])
                    $('#fechaSalida').val(data['fecha_salida'])
                    $('#tituloModal').text('Editar')
                    $('#btnGuardar').text('Actualizar')
                    $('#msgPlaca').text('')
                    $('#msgOrden').text('')
                }
            })
        } else {
            $.ajax({
                url: "<?= base_url('vehiculos/obtenerUltimaOrden') ?>",
                type: 'POST',
                data: {},
                dataType: 'json',
                success: function(data) {
                    $('#ordenTrabajo').attr('disabled', '')
                    $('#ordenTrabajo').val(parseInt(data['n_orden']) + 1)
                }
            })
            $('#tp').val(1)
            $('#id').val(id)
            $('#tipoCliente').val('')
            $('#cliente').val('')
            $('#placa').val('')
            $('#marca').val('')
            $('#nFabrica').val('')
            $('#color').val('')
            $('#kms').val('')
            $('#combustible').val('')
            $('#estado').val('')
            $('#fechaEntrada').val('')
            $('#fechaSalida').val('')
            $('#btnGuardar').text('Guardar')
            $('#tituloModal').text('Editar')
            $('#msgOrden').text('')
            $('#msgPlaca').text('')
        }
    }
    //Input dinamico para los clientes
    function verTipoCliente(id, idCliente) {
        $.ajax({
            url: '<?= base_url('vehiculos/buscarResponsable'); ?>',
            data: {
                idTipo: id
            },
            type: 'POST',
            success: function(res) {
                res = JSON.parse(res)
                var cadena
                cadena = `<option selected value=""> -- Seleccione -- </option>`
                for (let i = 0; i < res.length; i++) {
                    nombre = `${res[i].nombre_p} ${res[i].nombre_s} ${res[i].apellido_p} ${res[i].apellido_s}`;
                    cadena += `<option ${res[i].estado == 'I' ? 'disabled' : ''} value=${res[i].id_tercero}>${res[i].tipo_tercero == 5  ? nombre : res[i].razon_social} ${res[i].estado == 'I' ? ' - Inactivo' : ''}</option>`
                }
                $('#cliente').html(cadena)
                $('#cliente').val(idCliente)
            }
        })
    }
    $('#tipoCliente').on('change', function(e) {
        id = $('#tipoCliente').val()
        verTipoCliente(id, '')
    })
    //Verificacion de Orden de Trabajo y Placa del vehiculo 
    function verificarOrdenPlaca(url, data, input, tipo) {
        tp = $('#tp').val()
        $.post(url, data, function(res) {
            if (JSON.parse(res) == null) {
                $(`#${input}`).text('')
                validOrden = true
                validPlaca = true
            } else {
                if (tp == 2) {
                    vehi = JSON.parse(res)
                    placa = $('#placaHidden').val()
                    if (placa == vehi.placa) {
                        $(`#${input}`).text('')
                        validOrden = true
                        validPlaca = true
                    } else {
                        $(`#${input}`).text(`* ${tipo} ya registrada *`)
                        validOrden = false
                        validPlaca = false
                    }
                } else {
                    $(`#${input}`).text(`* ${tipo} ya registrada *`)
                    validOrden = false
                    validPlaca = false
                }
            }
        })
    }
    $('#ordenTrabajo').on('input', function(e) {
        data = {
            orden: $('#ordenTrabajo').val(),
            placa: ''
        }
        verificarOrdenPlaca("<?= base_url('vehiculos/buscarVehiculo') ?>", data, 'msgOrden', 'Orden de Trabajo')
    })
    $('#placa').on('input', function(e) {
        data = {
            orden: '',
            placa: $('#placa').val()
        }
        verificarOrdenPlaca("<?= base_url('vehiculos/buscarVehiculo') ?>", data, 'msgPlaca', 'Placa')
    })
    //Verificacion de fecha entrada y salida
    $('#fechaEntrada').on('change', function(e) {
        fechaSalida = $('#fechaSalida').val()
        fechaEntrada = $('#fechaEntrada').val()
        if (fechaSalida != '') {
            $('#msgFecha').text('')
            validFecha = true
        } else if (fechaSalida >= fechaEntrada) {
            $('#msgFecha').text('')
            validFecha = true
        } else {
            $('#msgFecha').text('* La fecha salida debe ser mayor a la de entrada *')
            validFecha = false
        }
    })
    $('#fechaSalida').on('change', function(e) {
        fechaSalida = $('#fechaSalida').val()
        fechaEntrada = $('#fechaEntrada').val()
        console.log(fechaSalida >= fechaEntrada)
        if (fechaEntrada == '') {
            $('#msgFecha').text('* Ingrese una fecha de entrada *')
            validFecha = false
        } else if (fechaSalida >= fechaEntrada) {
            console.log('fechaSalida mayor')
            $('#msgFecha').text('')
            validFecha = true
        } else {
            $('#msgFecha').text('* La fecha salida debe ser mayor a la de entrada *')
            validFecha = false
        }
    })
    //Formulario para agregar o editar Vehiculo
    $('#formularioVehiculos').on('submit', function(e) {
        e.preventDefault()
        tp = $('#tp').val()
        id = $('#id').val()
        orden = $('#ordenTrabajo').val()
        tipoCliente = $('#tipoCliente').val()
        cliente = $('#cliente').val()
        placa = $('#placa').val()
        marca = $('#marca').val()
        nFabrica = $('#nFabrica').val()
        color = $('#color').val()
        kms = $('#kms').val()
        combustible = $('#combustible').val()
        estado = $('#estado').val()
        fechaEntrada = $('#fechaEntrada').val()
        fechaSalida = $('#fechaSalida').val()

        if ([orden, cliente, placa, marca, nFabrica, color, kms, combustible, estado, fechaEntrada].includes('') || !validOrden || !validPlaca || !validFecha) {
            return mostrarMensaje('error', '¡Hay campos vacios o invalidos!')
        } else {
            $.ajax({
                url: '<?= base_url('vehiculos/insertar') ?>',
                type: 'POST',
                data: {
                    tp,
                    id,
                    orden,
                    tipoCliente,
                    cliente,
                    placa,
                    marca,
                    nFabrica,
                    color,
                    kms,
                    combustible,
                    estado,
                    fechaEntrada,
                    fechaSalida
                },
                success: function(data) {
                    if (tp == 2) {
                        data == 1 ? mostrarMensaje('success', '¡Se ha actualizado el vehiculo!') : mostrarMensaje('error', '¡Ha ocurrido un error!')
                    } else {

                        data == 1 ? mostrarMensaje('success', '¡Se ha registrado el vehiculo!') : mostrarMensaje('error', '¡Ha ocurrido un error!')
                    }
                    tablaVehiculos.ajax.reload(null, false)
                    $('#agregarVehiculo').modal('hide')
                }
            })
        }
    })
    // Cambiar estado del vehiculo
    $('#cambiarEstado').on('show.bs.modal', function(e) {
        $.ajax({
            url: '<?= base_url('vehiculos/buscarVehiculo') ?>',
            type: 'POST',
            dataType: 'json',
            data: {
                id: $(e.relatedTarget).data('href')
            },
            success: function(data) {
                $('#tituloModalEstado').text('CAMBIAR ESTADO - ' + data.placa)
                $('#estadoVehiculo').val(data.estado)
                $('#idVehi').val($(e.relatedTarget).data('href'))
            }
        })
    })
    $('#btnCambiarEstado').click(function(e) {
        id = $('#idVehi').val()
        estado = $('#estadoVehiculo').val()
        if (estado == '') {
            return mostrarMensaje('error', '¡Hay campos vacios!')
        } else {
            $.ajax({
                url: '<?= base_url('vehiculos/cambiarEstado') ?>',
                dataType: 'json',
                type: 'POST',
                data: {
                    id,
                    estado
                },
                success: function(data) {
                    if (data == 1) {
                        mostrarMensaje('success', '¡Se ha cambiado el estado del Vehiculo!')
                        tablaVehiculos.ajax.reload(null, false)
                        $('#cambiarEstado').modal('hide')
                        $('#idVehi').val('')
                        $('#estadoVehiculo').val('')
                    }
                }
            })
        }
    })
</script>
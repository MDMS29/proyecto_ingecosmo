<link rel="stylesheet" href="<?= base_url('css/vehiculos/vehiculos.css') ?>">
<!-- TABLA MOSTRAR VEHICULOS -->
<div id="content" class="p-4 p-md-5" style="background-color:rgba(0, 0, 0, 0.05);">
    <h2 class="text-center mb-4"><img style=" width:45px; height:45px; " src="<?php echo base_url('/img/vehiculo-b.png') ?>" /> Vehiculos</h2>
    <div class="table-responsive p-2">
        <div class="d-flex justify-content-center align-items-center flex-wrap ocultar">
            <b class="fs-6 text-black"> Ocultar Columnas:</b> <a class="toggle-vis btn" data-column="4">Modelo</a> - <a class="toggle-vis btn" data-column="5">Marca</a> - <a class="toggle-vis btn" data-column="6">Color</a> - <a class="toggle-vis btn" data-column="7">Combustible</a>
        </div>
        <table class="table table-striped" id="tableVehiculos" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">Responsable</th>
                    <th scope="col" class="text-center">Tipo Responsable</th>
                    <th scope="col" class="text-center">Placa</th>
                    <th scope="col" class="text-center">Modelo</th>
                    <th scope="col" class="text-center">Marca</th>
                    <th scope="col" class="text-center">Color</th>
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
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="body-R">
                <div class="modal-content">
                    <div class="modal-header d-flex align-items-center justify-content-between">
                        <img src="<?= base_url('img/logo_empresa.png') ?>" alt="Logo Empresa" class="logoEmpresa" width="100">
                        <h1 class="modal-title fs-5 text-center d-flex align-items-center gap-2"><img id="imgModal" src=""><span id="tituloModal"><!-- TEXTO DINAMICO--></span> </h1>
                        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">X</button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="d-flex column-gap-3" style="width: 100%">
                                <div class="mb-3" style="width: 100%">
                                    <label for="tipoCliente" class="col-form-label">Tipo Responsable: <i class="asterisco" style="color:crimson;">*</i></label>
                                    <select class="form-select" name="tipoCliente" id="tipoCliente">
                                        <option selected value="">-- Seleccione --</option>
                                        <?php foreach ($tipoClientes as $cliente) { ?>
                                            <option value="<?= $cliente['id'] ?>"><?= $cliente['nombre'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="mb-3" style="width: 100%">
                                    <label for="cliente" class="col-form-label">Responsable: <i class="asterisco" style="color:crimson;">*</i></label>
                                    <select class="form-select " name="cliente" id="cliente">
                                        <!-- SELECT DINAMICO -->
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex column-gap-3" style="width: 100%">
                                <div class="mb-3" style="width: 100%">
                                    <label for="placa" class="col-form-label">Placa: <i class="asterisco" style="color:crimson;">*</i></label>
                                    <input type="text" minlength="6" maxlength="8" class="form-control text-uppercase" name="placa" id="placa" oninput="this.value = this.value.replace(/[^a-zA-Z0-9ñ]/,'')">
                                    <input type="hidden" id="placaHidden">
                                    <small id="msgPlaca" class="invalido"></small>
                                </div>
                                <div class="mb-3" style="width: 100%">
                                    <label for="marca" class="col-form-label">Marca: <i class="asterisco" style="color:crimson;">*</i></label>
                                    <select class="form-select " name="marca" id="marca">
                                        <option selected value="">-- Seleccione --</option>
                                        <?php foreach ($marcas as $marca) { ?>
                                            <option value="<?= $marca['id_marca'] ?>"><?= $marca['nombre'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex column-gap-3" style="width: 100%">
                                <div class="mb-3" style="width: 100%">
                                    <label for="nFabrica" class="col-form-label">No. Fabrica: <i class="asterisco" style="color:crimson;">*</i></label>
                                    <select class="form-select form-control" name="nFabrica" id="nFabrica">
                                        <option selected value="">-- Seleccione --</option>
                                        <?php $years = range(2035, 1990); ?>
                                        <?php foreach ($years as $year) : ?>
                                            <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-3" style="width: 100%">
                                    <div class="">
                                        <label for="color" class="col-form-label">Color: <i class="asterisco" style="color:crimson;">*</i></label>
                                        <input type="text" name="color" class="form-control" id="color" minlength="4" oninput="this.value = this.value.replace(/[^a-zA-Zñáéíóú]/,'')">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex column-gap-3" style="width: 100%">

                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                    <label style="color: gray; margin-inline-end: auto;">(*) Campos obligatorios.</label>
                        <button type="button" class="btn btnAccionF" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btnRedireccion" id="btnGuardar"><!-- TEXTO DIANMICO --></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

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
    var contador = 0;
    var tablaVehiculos = $('#tableVehiculos').DataTable({
        ajax: {
            url: '<?= base_url('vehiculos/obtenerVehiculos') ?>',
            method: "POST",
            dataSrc: "",
        },
        columns: [{
                data: null,
                render: function(data, type, row) {
                    contador = contador + 1
                    return '<b>' + contador + '</b>'
                }
            }, {
                data: null,
                render: function(data, type, row) {
                    return `<span id="spanCliente" class=${row.estadoTercer == 'I' ? 'invalido' : ''} >
                    ${row.tipo_tercero == 5 ? row.cliente : row.razon_social} ${row.estadoTercer == 'I' ? ' - Inactivo' : ''}
                    </span>`
                }
            },
            {
                data: null,
                render: function(data, type, row) {
                    return `<span id="spanCliente" class=${row.estadoTercer == 'I' ? 'invalido' : ''} >
                    ${row.tipo_tercero == 5 ? 'Cliente' : 'Aliado'} ${row.estadoTercer == 'I' ? ' - Inactivo' : ''}
                    </span>`

                }
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
                data: null,
                render: function(data, type, row) {
                    return (
                        '<button class="btn" onclick="seleccionarVehiculo(' + data.id_vehiculo + ',2)" data-bs-target="#agregarVehiculo" data-bs-toggle="modal"><img src="<?php echo base_url('img/edit.svg') ?>" alt="Boton Editar" title="Editar Vehiculo"></button>'
                    )
                }
            }
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }
    });
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
                    $('#tipoCliente').val(data['tipo_propietario'])
                    $('#cliente').val(data['cliente'])
                    $('#placa').val(data['placa'])
                    $('#placaHidden').val(data['placa'])
                    $('#marca').val(data['id_marca'])
                    $('#nFabrica').val(data['modelo'])
                    $('#color').val(data['color'])
                    $('#combustible').val(data['combustible'])
                    $('#tituloModal').text('Editar')
                    $('#imgModal').attr('src', '<?= base_url('img/editar1.png') ?>')
                    $('#imgModal').attr('width', '25')
                    $('#btnGuardar').text('Actualizar')
                    $('#msgPlaca').text('')
                    $('#msgOrden').text('')
                    $('.asterisco').hide()
                    $('.campObl').hide()
                }
            })
        } else {
            $('#tp').val(1)
            $('#id').val(id)
            $('#tipoCliente').val('')
            $('#cliente').val('')
            $('#placa').val('')
            $('#marca').val('')
            $('#nFabrica').val('')
            $('#color').val('')
            $('#combustible').val('')
            $('#btnGuardar').text('Guardar')
            $('#tituloModal').text('Agregar')
            $('#imgModal').attr('src', '<?= base_url('img/plus-b.png') ?>')
            $('#imgModal').attr('width', '25')
            $('#msgOrden').text('')
            $('#msgPlaca').text('')
            $('.asterisco').show()
            $('.campObl').show()
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
    $('#placa').on('input', function(e) {
        data = {
            orden: '',
            placa: $('#placa').val()
        }
        verificarOrdenPlaca("<?= base_url('vehiculos/buscarVehiculo') ?>", data, 'msgPlaca', 'Placa')
    })
    //Formulario para agregar o editar Vehiculo
    $('#formularioVehiculos').on('submit', function(e) {
        e.preventDefault()
        tp = $('#tp').val()
        id = $('#id').val()
        tipoCliente = $('#tipoCliente').val()
        cliente = $('#cliente').val()
        placa = $('#placa').val()
        marca = $('#marca').val()
        nFabrica = $('#nFabrica').val()
        color = $('#color').val()
        combustible = $('#combustible').val()
        // $('#btnGuardar').attr('disabled', '')
        if ([tipoCliente, cliente, placa, marca, nFabrica, color,  combustible].includes('') || !validOrden || !validPlaca || !validFecha) {
            return mostrarMensaje('error', '¡Hay campos vacios o invalidos!')
        } else {
            $.ajax({
                url: '<?= base_url('vehiculos/insertar') ?>',
                type: 'POST',
                data: {
                    tp,
                    id,
                    tipoCliente,
                    cliente,
                    placa,
                    marca,
                    nFabrica,
                    color,
                    combustible,
                    estado: 'A'
                },
                success: function(data) {
                    if (tp == 2) {
                        data == 1 ? mostrarMensaje('success', '¡Se ha actualizado el vehiculo!') : mostrarMensaje('error', '¡Ha ocurrido un error!')
                    } else {
                        data == 1 ? mostrarMensaje('success', '¡Se ha registrado el vehiculo!') : mostrarMensaje('error', '¡Ha ocurrido un error!')
                    }
                    contador = 0
                    tablaVehiculos.ajax.reload(null, false)
                    $('#agregarVehiculo').modal('hide')
                    // $('#brnGuardar').removeAttr('disabled')
                }
            })
        }
    })
</script>

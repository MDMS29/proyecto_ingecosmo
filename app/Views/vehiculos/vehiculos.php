<link rel="stylesheet" href="<?= base_url('css/vehiculos/vehiculos.css') ?>">
<!-- TABLA MOSTRAR VEHICULOS -->
<div id="content" class="p-4 p-md-5" style="background-color:rgba(0, 0, 0, 0.002);">
    <h2 class="text-center mb-4"><img style=" width:45px; height:45px; " src="<?php

                                                                                use App\Controllers\Vehiculos;

                                                                                echo base_url('/icons/vehiculo-b.png') ?>" /> Vehiculos</h2>
    <div class="table-responsive p-2">
        <div class="d-flex justify-content-center align-items-center flex-wrap ocultar">
            <b class="fs-6 text-black"> Ocultar Columnas:</b> <a class="toggle-vis btn" data-column="1">Cliente</a> - <a class="toggle-vis btn" data-column="3">Modelo</a> - <a class="toggle-vis btn" data-column="4">Marca</a> - <a class="toggle-vis btn" data-column="5">Color</a> - <a class="toggle-vis btn" data-column="6">Kilometraje</a> - <a class="toggle-vis btn" data-column="7">Combustible</a>
        </div>
        <table class="table table-striped" id="tableVehiculos" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Orden de Trabajo</th>
                    <th scope="col" class="text-center">Cliente</th>
                    <th scope="col" class="text-center">Placa</th>
                    <th scope="col" class="text-center">Modelo</th>
                    <th scope="col" class="text-center">Marca</th>
                    <th scope="col" class="text-center">Color</th>
                    <th scope="col" class="text-center">Kilometraje</th>
                    <th scope="col" class="text-center">Combustible</th>
                    <th scope="col" class="text-center">Fecha Entrada</th>
                    <th scope="col" class="text-center">Estado</th>
                    <th scope="col" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <!-- TABLA DE VEHICULOS -->
            </tbody>
        </table>
    </div>
    <div class="footer-page mt-4">
        <button type="button" class="btn btnRedireccion" data-bs-toggle="modal" data-bs-target="#agregarVehiculo" onclick="seleccionarVehiculo(<?= 0 . ',' . 1 ?>)"><img src="<?= base_url('icons/plus.png') ?>" alt="icon-plus" width="20"> Agregar</button>
        <a href="<?= base_url('usuarios/eliminados') ?>" class="btn btnAccionF"> <img src="<?= base_url('icons/delete.png') ?>" alt="icon-plus" width="20"> Eliminados</a>
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
                                    <label for="ordenTrabajo" class="col-form-label">Orden de Trabajo:</label>
                                    <input type="number" name="ordenTrabajo" class="form-control" id="ordenTrabajo">
                                    <small id="msgOrden" class="invalido"></small>
                                </div>
                                <div class="mb-3" style="width: 100%">
                                    <label for="cliente" class="col-form-label">Cliente:</label>
                                    <select class="form-select form-select" name="cliente" id="cliente">
                                        <option selected value="">-- Seleccione --</option>
                                        <?php foreach ($clientes as $cliente) { ?>
                                            <option value="<?= $cliente['id_tercero'] ?>"><?= $cliente['nombreCompleto'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex column-gap-3" style="width: 100%">
                                <div class="mb-3" style="width: 100%">
                                    <div class="mb-3">
                                        <label for="placa" class="col-form-label">Placa:</label>
                                        <input type="text" minlength="6" maxlength="8" class="form-control" name="placa" id="placa">
                                        <small id="msgPlaca" class="invalido"></small>
                                    </div>
                                </div>
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
                                        <?php $years = range(strftime("%Y", time()), 1960); ?>
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
                                <div class="mb-3" style="width: 100%">
                                    <label for="fechaEntrada" class="col-form-label">Fecha Entrada:</label>
                                    <div class="d-flex">
                                        <input type="date" name="fechaEntrada" id="fechaEntrada" class="form-control">
                                    </div>
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    var validOrden = true
    var validPlaca = true
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
                data: "cliente"
            },
            {
                data: 'placa'
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
                    // Formato de fecha deseado: aaaa-mm-dd
                    var fecha = new Date(data);
                    var anio = fecha.getFullYear();
                    var mes = fecha.getMonth() + 1;
                    var dia = fecha.getDate();
                    return anio + "-" + (mes < 10 ? '0' + mes : mes) + "-" + (dia < 10 ? '0' + dia : dia);
                }
            },
            {
                data: 'estado'
            },
            {
                data: null,
                render: function(data, type, row) {
                    return (
                        '<button class="btn" onclick="seleccionarVehiculo(' + data.id_vehiculo + ',2)" data-bs-target="#agregarVehiculo" data-bs-toggle="modal"><img src="<?php echo base_url('icons/edit.svg') ?>" alt="Boton Editar" title="Editar Usuario"></button>' +
                        '<button class="btn" data-href=' + data.id_usuario + ' data-bs-toggle="modal" data-bs-target="#modalConfirmar"><img src="<?php echo base_url("icons/delete.svg") ?>" alt="Boton Eliminar" title="Eliminar Usuario"></button>'

                    )
                }
            }
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
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
                    $('#tp').val(2)
                    $('#id').val(id)
                    $('#ordenTrabajo').val(data['n_orden'])
                    $('#cliente').val(data['cliente'])
                    $('#placa').val(data['placa'])
                    $('#marca').val(data['id_marca'])
                    $('#nFabrica').val(data['modelo'])
                    $('#color').val(data['color'])
                    $('#kms').val(data['kms'])
                    $('#combustible').val(data['combustible'])
                    $('#estado').val(data['estado'])
                    $('#fechaEntrada').val(data['fecha_entrada'])
                    $('#tituloModal').text('Editar')
                    $('#btnGuardar').text('Actualizar')
                }
            })
        } else {
            $('#tp').val(1)
            $('#id').val(id)
            $('#ordenTrabajo').val('')
            $('#cliente').val('')
            $('#placa').val('')
            $('#marca').val('')
            $('#nFabrica').val('')
            $('#color').val('')
            $('#kms').val('')
            $('#combustible').val('')
            $('#estado').val('')
            $('#fechaEntrada').val()
            $('#btnGuardar').text('Guardar')
            $('#tituloModal').text('Editar')
            $('#msgOrden').text('')
            $('#msgPlaca').text('')
        }
    }
    //Verificacion de Orden de Trabajo y Placa del vehiculo 
    function verificarOrdenPlaca(url, data, input, tipo) {
        $.post(url, data, function(data) {
            if (JSON.parse(data) == null) {
                $(`#${input}`).text('')
            } else {
                $(`#${input}`).text(`* ${tipo} ya registrada *`)
            }
            validOrden = false
            validPlaca = false
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
    //Formulario para agregar o editar Vehiculo
    $('#formularioVehiculos').on('submit', function(e) {
        e.preventDefault()
        tp = $('#tp').val()
        orden = $('#ordenTrabajo').val()
        cliente = $('#cliente').val()
        placa = $('#placa').val()
        marca = $('#marca').val()
        nFabrica = $('#nFabrica').val()
        color = $('#color').val()
        kms = $('#kms').val()
        combustible = $('#combustible').val()
        estado = $('#estado').val()
        fechaEntrada = $('#fechaEntrada').val()
        if ([orden, cliente, placa, marca, nFabrica, color, kms, combustible, estado, fechaEntrada].includes('') || !validOrden || !validPlaca) {
            return mostrarMensaje('error', '¡Hay campos vacios o invalidos!')
        } else {
            $.ajax({
                url: '<?= base_url('vehiculos/insertar') ?>',
                type: 'POST',
                data: {
                    tp,
                    orden,
                    cliente,
                    placa,
                    marca,
                    nFabrica,
                    color,
                    kms,
                    combustible,
                    estado,
                    fechaEntrada
                }
            })
        }
    })
</script>
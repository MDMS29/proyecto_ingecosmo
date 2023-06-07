<link rel="stylesheet" href="<?php echo base_url("css/proveedores_clientes/proveedores_cliente.css") ?>">

<div id="content" class="p-4 p-md-5" style="background-color:rgba(0, 0, 0, 0.05);">
    <h2 class="text-center mb-4"><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/clientes-b.png') ?>" /> Clientes</h2>
    <div class="table-responsive p-2">
        <div class="d-flex justify-content-center align-items-center flex-wrap ocultar">
            <b class="fs-6 text-black"> Ocultar Columnas:</b> <a class="toggle-vis btn" data-column="0">#</a> - <a class="toggle-vis btn" data-column="3">Tipo Documento</a> - <a class="toggle-vis btn" data-column="4">Identificación</a> - <a class="toggle-vis btn" data-column="5">Direccion</a> - <a class="toggle-vis btn" data-column="6">Telefono</a> 
        </div>
        <table class="table table-striped" id="tableClientes" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">Nombres</th>
                    <th scope="col" class="text-center">Apellidos</th>
                    <th scope="col" class="text-center">Tipo de Documento</th>
                    <th scope="col" class="text-center">Identificacion</th>
                    <th scope="col" class="text-center">Direccion</th>
                    <th scope="col" class="text-center">Telefono</th>
                    <th scope="col" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <!-- TABLA CLIENTES -->
            </tbody>
        </table>
    </div>
    <div class="footer-page">
        <button class="btn btnRedireccion" data-bs-toggle="modal" data-bs-target="#agregarCliente" onclick="seleccionarCliente(<?= 0 . ',' . 1 ?>)"><img src="<?= base_url('img/plus.png') ?>" alt="icon-plus" width="20"> Agregar</button>

        <a href="<?php echo base_url('/clientes/eliminados'); ?>" class="btn btnAccionF"> <img src="<?= base_url('img/delete.png') ?>" alt="icon-plus" width="20"> Eliminados</a>
    </div>
</div>


<!-- -----modal----------     -->
<form autocomplete="off" id="formularioClientes">
    <div class="modal fade" id="agregarCliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="body-R">

                <div class="modal-content">
                    <div class="modal-header" id="modalHeader">
                        <img src="<?php echo base_url('img/logo_empresa.png') ?>" width="100" />

                        <div class="d-flex align-items-center justify-content-center" style="width:auto;">
                            <img id="logoModal" src="<?= base_url('img/plus-b.png') ?>" alt="icon-plus" width="20">
                            <h1 class="modal-title fs-5" id="tituloModal">Agregar</h1>
                        </div>

                        <button type="button" style="margin:0;" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form>
                            <div class="d-flex column-gap-3" style="width: 100%">
                                <div class="mb-3" style="width: 100%;">
                                    <label class="col-form-label" for="recipient-name" style="margin:0;">Primer Nombre:</label>
                                    <input class="form-control" type="text" min='1' max='300' id="nombreP" name="nombreP">
                                    <input hidden id="tp" name="tp">
                                    <input hidden id="id" name="id">
                                </div>

                                <div class="mb-3" style="width: 100%;">
                                    <label class="col-form-label" style="margin:0;" for="message-text">Segundo Nombre:</label>
                                    <input class="form-control" id="nombreS" name="nombreS"></input>
                                </div>

                                <div class="mb-3" style="width: 100%;">
                                    <label class="col-form-label" style="margin:0;" for="message-text">Primer Apellido:</label>
                                    <input class="form-control" id="apellidoP" name="apellidoP"></input>
                                </div>
                            </div>

                            <div class="d-flex column-gap-3" style="width: 100%">
                                <div class="mb-3" style="width: 100%;">
                                    <label class="col-form-label" style="margin:0;" for="message-text">Segundo Apellido:</label>
                                    <input class="form-control" id="apellidoS" name="apellidoS"></input>
                                </div>

                                <div class="mb-3" style="width: 100%;">
                                    <label class="col-form-label" style="margin:0;" for="tipoDoc">Tipo Identificación:</label>
                                    <select class="form-select form-select form-control" name="tipoDoc" id="tipoDoc">
                                        <option value="1" selected>Cedula de Ciudadania</option>
                                        <option>-- Seleccione --</option>
                                    </select>
                                </div>

                                <div class="mb-3" style="width: 100%;">
                                    <label class="col-form-label" style="margin:0;" for="message-text">N° Identificacion:</label>
                                    <input class="form-control" id="nIdenti" name="nIdenti" type="number"></input>
                                    <small id="msgDoc" class="invalido"></small>
                                </div>
                            </div>

                            <div class="d-flex column-gap-3" style="width: 100%">
                                <div class="mb-3" style="width: 100%;">
                                    <label class="col-form-label" style="margin:0;" for="message-text">Direccion:</label>
                                    <input class="form-control" id="direccion" name="direccion"></input>
                                </div>

                                <div class="mb-3" style="width: 100%">
                                    <label for="telefono" class="col-form-label">Telefono:</label>
                                    <div class="d-flex">
                                        <input type="number" name="telefono" class="form-control" id="telefono" disabled>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#agregarTelefono" data-bs-target="#staticBackdrop" class="btn" style="border:none;background-color:gray;color:white;" title="Agregar Telefono">+</button>
                                    </div>
                                </div>

                                <div class="mb-3" style="width: 100%">
                                    <label for="email" class="col-form-label">Email:</label>
                                    <div class="d-flex">
                                        <input type="email" name="email" class="form-control" id="email" disabled>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#agregarCorreo" data-bs-target="#staticBackdrop" class="btn" style="border:none;background-color:gray;color:white;" title="Agregar Correo">+</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btnRedireccion" data-bs-dismiss="modal" id="btnCerrar">Cerrar</button>
                        <button type="submit" class="btn btnAccionF" id="btnGuardar">Agregar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


<!-- MODAL AGREGAR - EDITAR TELEFONO -->
<div class="modal fade" id="agregarTelefono" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="body-R">
            <div class="modal-content">
                <div class="modal-header flex justify-content-between align-items-center">
                    <img src="<?= base_url('img/ingecosmo.png') ?>" alt="logo-empresa" width="60" height="60">
                    <h1 class="modal-title fs-5 text-center " id="tituloModal"><img src="<?= base_url('img/plus-b.png') ?>" alt="" width="30" height="30"> Agregar Telefono</h1>
                    <button type="button" class="btn" aria-label="Close" onclick="limpiarCampos('telefonoAdd', 'prioridad', 'tipoTele', 3)">X</button>
                </div>
                <input type="text" name="editTele" id="editTele" hidden>
                <div class="modal-body">
                    <div class="container p-4" style="background-color: #d9d9d9;border-radius:10px;">
                        <div class="mb-2 d-flex gap-3 flex-wrap" style="width: 100%;">
                            <div class="flex-grow-1">
                                <label for="telefonoAdd" class="col-form-label">Telefono:</label>
                                <div>
                                    <input type="number" name="telefonoAdd" class="form-control" id="telefonoAdd" minlength="7" maxlength="10">
                                    <small id="msgTel" class="invalido"></small>
                                </div>
                            </div>
                            <div class=" flex-grow-1">
                                <label for="prioridad" class="col-form-label">Tipo Telefono:</label>
                                <select class="form-select form-select form-control" name="tipoTele" id="tipoTele">
                                    <option selected value="">-- Seleccione --</option>
                                    <?php foreach ($tipoTele as $tipe) { ?>
                                        <option value="<?= $tipe['id'] ?>"><?= $tipe['nombre'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="flex-grow-1">
                                <label for="prioridad" class="col-form-label">Prioridad:</label>
                                <select class="form-select form-select form-control" name="prioridad" id="prioridad">
                                    <option selected value="">-- Seleccione --</option>
                                    <option value="P">Principal</option>
                                    <option value="S">Secundaria</option>
                                </select>
                            </div>
                        </div>
                        <div class="table-responsive" style="overflow:scroll-vertical;overflow-y: scroll !important; height: 150px;background-color:white;">
                            <table class="table table-bordered table-sm table-hover" id="tablePaises" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th>Telefono</th>
                                        <th>Tipo</th>
                                        <th>Prioridad</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="bodyTel">
                                    <tr class="text-center">
                                        <td colspan="4">NO HAY TELEFONOS</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btnRedireccion" onclick="limpiarCampos('telefonoAdd', 'prioridad', 'tipoTele', 3)">Cerrar</button>
                    <button type="button" class="btn btnAccionF" id="btnAddTel">Agregar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL AGREGAR - EDITAR CORREO -->
<div class="modal fade" id="agregarCorreo" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header flex justify-content-between align-items-center">
                <img src="<?= base_url('img/ingecosmo.png') ?>" alt="logo-empresa" width="60" height="60">
                <h1 class="modal-title fs-5 text-center " id="tituloModal"><img src="<?= base_url('img/plus-b.png') ?>" alt="" width="30" height="30"> Agregar Correo</h1>
                <button type="button" class="btn" aria-label="Close" onclick="limpiarCampos('correoAdd', 'prioridadCorreo', '', 4)">X</button>
            </div>
            <input type="text" name="editCorreo" id="editCorreo" hidden>

            <div class="modal-body">
                <div class="container p-4" style="background-color: #d9d9d9;border-radius:10px;">
                    <div class="mb-2 d-flex gap-3" style="width: 100%;">
                        <div class="d-flex gap-2" style="width: 100%;">
                            <label for="correoAdd" class="col-form-label">Correo:</label>
                            <div>
                                <input type="email" name="correoAdd" class="form-control" id="correoAdd">
                                <small id="msgCorreo" class="invalido"></small>
                            </div>
                        </div>
                        <div class="d-flex gap-2" style="width: 100%;">
                            <label for="prioridad" class="col-form-label">Prioridad:</label>
                            <select class="form-select form-select form-control" name="prioridadCorreo" id="prioridadCorreo">
                                <option selected value="">-- Seleccione --</option>
                                <option value="P">Principal</option>
                                <option value="S">Secundaria</option>
                            </select>
                        </div>
                    </div>
                    <div class="table-responsive" style="overflow:scroll-vertical;overflow-y: scroll !important; height: 150px;background-color:white;">
                        <table class="table table-bordered table-sm table-hover" id="tablePaises" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th>Correo</th>
                                    <th>Prioridad</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="bodyCorre">
                                <tr class="text-center">
                                    <td colspan="3">NO HAY CORREOS</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btnRedireccion" onclick="limpiarCampos('correoAdd', 'prioridadCorreo', '', 4)">Cerrar</button>
                <button type="button" class="btn btnAccionF" id="btnAddCorre">Agregar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Confirma Eliminar -->
<div class="modal fade" id="modalConfirmaP" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">

        <div class="modal-content" id="modalEliminarContentP">
            <div class="modalContenedorP">
                <div id="contenidoHeaderEliminarP" class="modal-header">
                    <img style=" width:80px; height:60px; margin-bottom: 0; " src="<?php echo base_url('/img/ingecosmo.png') ?>" />
                    <button type="button" style="margin:0;" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="contenidoEliminarP">
                    <div class="bloqueModalP">
                        <img style=" width:80px; height:60px; margin:10px; " src="<?php echo base_url('/img/icon-alerta.png') ?>" />
                        <p class="textoModalP">¿Estas seguro de eliminar este Cliente?</p>
                    </div>

                </div>
            </div>
            <div id="bloqueBtnP" class="modal-footer">
                <button id="btnNo" class="btn btnRedireccion" data-dismiss="modal">Cerrar</button>
                <a id="btnSi" class="btn btnAccionF">Eliminar</a>
            </div>

        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    // variables
    var ContadorPRC = 0; //Contador DataTable
    var contador = 0; //Contador ids telefono
    var contadorCorreo = 0; //Contador ids correos
    var inputIden = 0;
    let telefonos = [] //Telefonos del usuario.
    let correos = [] //Correos del usuario.
    var validCorreo = true;
    var validIdent = true;
    var validTel = true;
    var objCorreo = {
        id: 0,
        correo: '',
        prioridad: ''
    }
    var objTelefono = {
        id: 0,
        numero: '',
        tipo: '',
        prioridad: ''
    }
    //Mostrar Ocultar Columnas
    $('a.toggle-vis').on('click', function(e) {
        e.preventDefault();
        // Get the column API object
        var column = tableClientes.column($(this).attr('data-column'));
        // Toggle the visibility
        column.visible(!column.visible());
    });
    var botones = $(".ocultar a");
    botones.click(function() {
        if ($(this).attr('class').includes('active')) {
            $(this).removeClass('active');
        } else {
            $(this).addClass('active');
        }
    })
    //Limpiar campos de telefonos y correos
    function limpiarCampos(input1, input2, input3, accion) {
        if (accion == 3) {
            if (telefonos.length != 0) {
                principalT = telefonos.filter(tel => tel.prioridad == 'P')
                if (principalT.length == 0) {
                    return mostrarMensaje('error', '¡Debe tener un telefono principal!')
                } else {
                    $('#agregarTelefono').modal('hide')
                    $('#agregarCliente').modal('show')
                }
            } else {
                $('#agregarTelefono').modal('hide')
                $('#agregarCliente').modal('show')
            }
        }
        if (accion == 4) {
            if (correos.length != 0) {
                principalC = correos.filter(correo => correo.prioridad == 'P')
                if (principalC.length == 0) {
                    return mostrarMensaje('error', '¡Debe tener un correo principal!')
                } else {
                    $('#agregarCorreo').modal('hide')
                    $('#agregarCliente').modal('show')
                }
            } else {
                $('#agregarCorreo').modal('hide')
                $('#agregarCliente').modal('show')
            }
        }
        if (objCorreo.id != 0) {
            correos.push(objCorreo)
            guardarCorreo()
        }
        if (objTelefono.id != 0) {
            telefonos.push(objTelefono)
            guardarTelefono()
        }
        if (input1 == 0) {
            telefonos = []
            correos = []
        }
        objCorreo = {
            id: 0,
            correo: '',
            prioridad: ''
        }
        objTelefono = {
            id: 0,
            numero: '',
            tipo: '',
            prioridad: ''
        }
        guardarTelefono()
        $(`#${input1}`).val('')
        $(`#${input2}`).val('')
        $(`#${input3}`).val('')
        $('#msgDoc').text('')
        $('#msgTel').text('')
        $('#msgCorreo').text('')
    }
    // ------------------------------ estructura Tabla ------------------------------------- 
    // Obtener email principal cliente
    var emailTable = [];
    var telefonoTable = [];

    function recargaTelCorreo() {
        $.ajax({
            url: '<?= base_url('clientes/obtenerClientes') ?>',
            method: "POST",
            data: {
                estado: 'A'
            },
            dataSrc: "",
        }).done(function(res) {
            let data = JSON.parse(res)
            for (let i = 0; i < data.length; i++) {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('email/EmailPrincipal/') ?>' + data[i].id_tercero + '/5',
                    async: false, // Establece el modo de solicitud sincrónica para obtener el resultado antes de continuar
                    dataType: 'json',
                    success: function(response) {
                        return emailTable.push({
                            idCliente: data[i].id_tercero,
                            correo: response[0]?.correo || 'No se encontro correo'
                        });
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('telefonos/TelefonoPrincipal/') ?>' + data[i].id_tercero + '/5',
                    async: false, // Establece el modo de solicitud sincrónica para obtener el resultado antes de continuar
                    dataType: 'json',
                    success: function(response) {
                        return telefonoTable.push({
                            idCliente: data[i].id_tercero,
                            telefono: response[0]?.numero || 'No se encontro telefono'
                        });
                    }
                });
            }
        })
    }
    recargaTelCorreo()



    // Tabla   
    var tableClientes = $("#tableClientes").DataTable({
        ajax: {
            url: '<?= base_url('clientes/obtenerClientes') ?>',
            method: "POST",
            data: {
                estado: 'A'
            },
            dataSrc: "",
        },
        columns: [{
                data: null,
                render: function(data, type, row) {
                    ContadorPRC = ContadorPRC + 1;
                    return "<b>" + ContadorPRC + "</b>";
                },
            },
            {
                data: null,
                render: function(data, type, row) {
                    // Combinar campos
                    return data.nombre_p + " " + data.nombre_s;
                }
            },
            {
                data: null,
                render: function(data, type, row) {
                    // Combinar campos
                    return data.apellido_p + " " + data.apellido_s;
                }
            },
            {
                data: 'tipoDoc'
            },
            {
                data: 'n_identificacion'
            },
            {
                data: 'direccion'
            },
            {
                data: null,
                render: function(data, type, row) {
                    arrayTele = telefonoTable.filter(tel => tel.idCliente == row.id_tercero)[0]?.telefono
                    return arrayTele
                }
            },
            {
                data: null,
                render: function(data, type, row) {
                    return (
                        '<button class="btn" onclick="seleccionarCliente(' + data.id_tercero + ' , 2 )" data-bs-target="#agregarCliente" data-bs-toggle="modal"><img src="<?php echo base_url('img/edit.svg') ?>" alt="Boton Editar" title="Editar Cliente"></button>' +

                        '<button class="btn" data-href=' + data.id_tercero + ' data-bs-toggle="modal" data-bs-target="#modalConfirmaP"><img src="<?php echo base_url("img/delete.svg") ?>" alt="Boton Eliminar" title="Eliminar Cliente"></button>'
                    );
                },
            }
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },

    });
    //Insertar y editar clientes
    function seleccionarCliente(id, tp) {
        if (tp == 2) {
            //Actualizar datos
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('srchCli/') ?>" + id + "/" + 0,
                dataType: 'json',
            }).done(function(res) {
                limpiarCampos()
                $('#tituloModal').text('Editar')
                $('#logoModal').attr('src', '<?php echo base_url('img/editar.png') ?>')
                $('#tp').val(2)
                $('#id').val(res[0]['id_tercero'])
                $('#nombreP').val(res[0]['nombre_p'])
                $('#nombreS').val(res[0]['nombre_s'])
                $('#apellidoP').val(res[0]['apellido_p'])
                $('#apellidoS').val(res[0]['apellido_s'])
                $('#tipoDoc').val(1)
                $('#nIdenti').val(res[0]['n_identificacion'])
                $('#direccion').val(res[0]['direccion'])
                $('#btnGuardar').text('Actualizar')
                $('#msgDoc').text('')
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('telefonos/obtenerTelefonosUser/') ?>' + id + '/' + 5,
                    dataType: 'json',
                    success: function(data) {
                        telefonos = data[0]
                        guardarTelefono()
                    }
                })
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('email/obtenerEmailUser/') ?>' + id + '/' + 5,
                    dataType: 'json',
                    success: function(data) {
                        correos = data[0]
                        guardarCorreo()
                    }
                })
            })
        } else {
            //Insertar datos

            telefonos = []
            correos = []
            limpiarCampos(0)
            guardarCorreo()
            guardarTelefono()
            limpiarCampos(0)
            $('#tituloModal').text('Agregar')
            $('#logoModal').attr('src', '<?php echo base_url('img/plus-b.png') ?>')
            $('#msgDoc').text('')
            $('#tp').val(1)
            $('#id').val(0)
            $('#nombreP').val('')
            $('#nombreS').val('')
            $('#apellidoP').val('')
            $('#apellidoS').val('')
            $('#tipoDoc').val(1)
            $('#nIdenti').val('')
            $('#direccion').val('')
            $('#btnGuardar').text('Agregar')
        }
    }
    //Envio de formulario
    $('#formularioClientes').on('submit', function(e) {
        e.preventDefault()
        tp = $('#tp').val()
        id = $('#id').val()
        $('#btnGuardar').attr('disabled', '')
        nombreP = $('#nombreP').val()
        nombreS = $('#nombreS').val()
        apellidoP = $('#apellidoP').val()
        apellidoS = $('#apellidoS').val()
        tipoDoc = $('#tipoDoc').val()
        nIdenti = $('#nIdenti').val()
        direccion = $('#direccion').val()
        //Control de campos vacios
        if ([nombreP, apellidoP, apellidoS, tipoDoc, nIdenti, direccion].includes('') || validIdent == false || validCorreo == false || correos.length == 0 || telefonos.length == 0) {
            return mostrarMensaje('error', '¡Hay campos vacios o invalidos!')
        } else {
            $.ajax({
                url: '<?php echo base_url('clientes/insertar') ?>',
                type: 'POST',
                data: {
                    id,
                    tp,
                    nombreP,
                    nombreS,
                    apellidoP,
                    apellidoS,
                    tipoDoc,
                    nIdenti,
                    direccion
                },
                success: function(idCli) {
                    telefonos.forEach(tel => {
                        //Insertar Telefonos
                        $.post({
                            url: '<?php echo base_url('telefonos/insertar') ?>',
                            data: {
                                tp: tp,
                                idTele: tel.id,
                                idUsuario: idCli,
                                numero: tel.numero,
                                prioridad: tel.prioridad,
                                tipoUsu: 5,
                                tipoTel: tel.tipo,
                            },
                            success: function(res) {
                                if (res != 1) {
                                    mostrarMensaje('error', '¡Ha ocurrido un error!')
                                }
                            }
                        })
                    });
                    correos.forEach(correo => {
                        //Insertar Correos
                        $.post({
                            url: '<?php echo base_url('email/insertar') ?>',
                            data: {
                                tp,
                                idCorreo: correo.id,
                                idUsuario: idCli,
                                correo: correo.correo,
                                prioridad: correo.prioridad,
                                tipoUsu: 5,
                            },
                            success: function(res) {
                                if (res != 1) {
                                    mostrarMensaje('error', '¡Ha ocurrido un error!')
                                    setTimeout(() => window.location.href = "<?= base_url('clientes') ?>", 2000)
                                }
                            }
                        })
                    });
                    if (tp == 2) {
                        mostrarMensaje('success', '¡Se ha Actualizado el Cliente!')
                    } else {
                        mostrarMensaje('success', '¡Se ha Registrado el Cliente!')
                    }
                }
            }).done(function(data) {
                $('#agregarCliente').modal('hide')
                recargaTelCorreo()
                setTimeout(() => {
                    tableClientes.ajax.reload(null, false); //Recargar tabla
                }, 3000)
                ContadorPRC = 0
                $('#btnGuardar').removeAttr('disabled');
                $('#editTele').val('');
                objCorreo = {
                    id: 0,
                    correo: '',
                    prioridad: ''
                }
                objTelefono = {
                    id: 0,
                    numero: '',
                    tipo: '',
                    prioridad: ''
                }
                ContadorPRC = 0
            });
        };
    })
    // ---------------------------pura identificacion tipo validacion---------------------------
    //Funcion para buscar cliente segun su identificacion
    function buscarClienteIdent(id, inputIden) {
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('srchCli/') ?>" + id + "/" + inputIden,
            dataType: 'JSON',
            success: function(res) {
                if (res[0] == null) {
                    $('#msgDoc').text('')
                    validIdent = true
                } else if (res[0] != null) {
                    $('#msgDoc').text('* Numero de identificación invalido *')
                    validIdent = false
                }
            }
        })
    }
    //Identificar si el numero de identificacion no este registrado
    $('#nIdenti').on('input', function(e) {
        inputIden = $('#nIdenti').val()
        tp = $('#tp').val()
        id = $('#id').val()
        if (tp == 1 && id == 0) {
            buscarClienteIdent(0, inputIden)
        } else if (tp == 2 && id != 0) {
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('srchCli/') ?>" + id + "/" + inputIden,
                dataType: 'JSON',
                success: function(res) {
                    if (res[0].n_identificacion == inputIden) {
                        $('#msgDoc').text('')
                        validIdent = true
                    } else {
                        buscarClienteIdent(0, inputIden)
                    }
                }
            })
        }
    })
    // --------------------------------------puro telefono----------------------------------
    //Al escribir validar que el numero no este registrado
    $('#telefonoAdd').on('input', function(e) {
        numero = $('#telefonoAdd').val()
        buscarCorreoTel('telefonos/buscarTelefono/', numero, 'msgTel', 'telefono')
    })
    // Agregar Telefono a la tabla
    $('#btnAddTel').on('click', function(e) {
        const numero = $('#telefonoAdd').val()
        const tipo = $('#tipoTele').val()
        const prioridad = $('#prioridad').val()
        const editTel = $('#editTele').val();
        if ([numero, prioridad, tipo].includes('') || validTel == false) {
            return mostrarMensaje('error', '¡Hay campos vacios o invalidos!')
        }
        contador += 1
        let info = {
            id: [editTel].includes('') || editTel == 0 ? `${contador+=1}e` : editTel,
            tipo,
            numero,
            prioridad
        }
        let filtro = telefonos.filter(tel => tel.prioridad == 'P')
        let filtroTel = telefonos.filter(tel => tel.numero == info.numero) //Array de numeros de telefonos

        if (filtroTel.length > 0) {
            filtro = []
            $('#btnEditarTel').removeAttr('disabled')
            return mostrarMensaje('error', '¡Ya se agrego este numero de telefono!')
        }
        if (info.prioridad == 'S') {
            telefonos.push(info)
            $('#telefonoAdd').val('')
            $('#tipoTele').val('')
            $('#prioridad').val('')
            $('#editTele').val(0);
            objTelefono = {
                id: 0,
                numero: '',
                tipo: '',
                prioridad: ''
            }
            return guardarTelefono()
        } else if (filtro.length > 0) {
            filtro = []
            return mostrarMensaje('error', '¡Ya hay un telefono prioritario!')

        } else {
            $('#btnEditarTel').removeAttr('disabled')
            telefonos.push(info)
            $('#telefonoAdd').val('')
            $('#tipoTele').val('')
            $('#prioridad').val('')
            $('#editTele').val(0);
            objTelefono = {
                id: 0,
                numero: '',
                tipo: '',
                prioridad: ''
            }
            return guardarTelefono()
        }

    })
    //Funcion para buscar el correo o el telefono
    function buscarCorreoTel(url, valor, inputName, tipo) {
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url() ?>" + `${url}` + valor + '/' + 0 + '/' + 5, //url, valor, idUsuario, tipoUsuario
            dataType: 'JSON',
            success: function(res) {
                if (res[0] == null) {
                    $(`#${inputName}`).text('')
                    validTel = true
                    validCorreo = true
                } else if (res[0] != null) {
                    $(`#${inputName}`).text(`* Este ${tipo} ya esta registrado *`)
                    validTel = false
                    validCorreo = false
                }
            }
        })
    }
    // Funcion para mostrar telefono en la tabla.
    function guardarTelefono() {
        $('#telefono').val(telefonos[0]?.numero)
        var cadena
        if (telefonos.length == 0) {
            cadena += ` <tr class="text-center">
            <td colspan="4">NO HAY TELEFONOS</td>
            </tr>`
            $('#bodyTel').html(cadena)
        } else {
            for (let i = 0; i < telefonos.length; i++) {
                cadena += ` <tr class="text-center" id=${telefonos[i].id}>
                                <td>${telefonos[i].numero}</td>
                                <td id=${telefonos[i].tipo}>${telefonos[i].tipo == 3 ? 'Celular' : 'Fijo' }</td>
                                <td id=${telefonos[i].prioridad}>${telefonos[i].prioridad == 'S' ? 'Secundaria' : 'Principal'}</td>
                                <td>
                                    <button class="btn" onclick="editarTelefono('${telefonos[i].id}')"><img src="<?= base_url('img/edit.svg') ?>" title="Editar Telefono">
                                    <button class="btn" onclick="eliminarTel(${telefonos[i].id})"><img src="<?= base_url('img/delete.svg') ?>" title="Eliminar Telefono">
                                </td>
                            </tr>`
            }
        }
        $('#bodyTel').html(cadena)
    }
    //Editar telefono
    function editarTelefono(id) {
        const fila = $(`#${id}`);
        const numero = fila.find('td').eq(0)
        const tipo = fila.find('td').eq(1)
        const prioridad = fila.find('td').eq(2)
        $('#telefonoAdd').val(numero.text());
        $('#tipoTele').val(tipo.attr('id'));
        $('#prioridad').val(prioridad.attr('id'));
        $('#editTele').val(fila.attr('id'));
        objTelefono = {
            id: fila.attr('id'),
            numero: numero.text(),
            tipo: tipo.attr('id'),
            prioridad: prioridad.attr('id')
        }
        telefonos = telefonos.filter(tel => tel.id != fila.attr('id'));
        guardarTelefono()
    }
    //Eliminar telefono de la tabla
    function eliminarTel(id) {
        tp = $('#tp').val()
        if (tp == 2) {
            // Consulta tipo delete
            $.ajax({
                url: '<?php echo base_url('telefonos/eliminarTelefono/') ?>' + id,
                type: 'POST',
                dataType: 'json',
                success: function(data) {
                    if (data == 1) {
                        return mostrarMensaje('success', '¡Se ha eliminado el telefono!')
                    }
                }
            })
        }
        telefonos = telefonos.filter(tel => tel.id != id)
        guardarTelefono() //Actualizar tabla
    }
    // --------------------------------------puro email----------------------------------
    //Al escribir validar que el correo no este registrado
    $('#correoAdd').on('input', function(e) {
        correo = $('#correoAdd').val()
        buscarCorreoTel('email/buscarEmail/', correo, 'msgCorreo', 'correo')
    })
    //Agregar Correo a la tabla
    $('#btnAddCorre').on('click', function(e) {
        const tp = $('#tp').val()
        const correo = $('#correoAdd').val()
        const prioridad = $('#prioridadCorreo').val()
        const editCorreo = $('#editCorreo').val();
        if ([correo, prioridad].includes('')) {
            return mostrarMensaje('error', '¡Hay campos vacios!')
        }
        let info = {
            id: [editCorreo].includes('') || editCorreo == 0 ? `${contador+=1}e` : editCorreo,
            correo,
            prioridad
        }
        let filtro = correos.filter(correo => correo.prioridad == 'P')
        let filtroCorreo = correos.filter(correo => correo.correo == info.correo)
        if (filtroCorreo.length > 0) {
            filtro = []
            return mostrarMensaje('error', '¡Ya se agrego este correo!')
        }
        if (info.prioridad == 'S') {
            correos.push(info)
            $('#correoAdd').val('')
            $('#prioridadCorreo').val('')
            $('#editCorreo').val(0)
            objCorreo = {
                id: 0,
                correo: '',
                prioridad: ''
            }
            return guardarCorreo()
        } else if (filtro.length > 0) {
            filtro = []

            return mostrarMensaje('error', '¡Ya hay un correo prioritario!')
        } else {
            correos.push(info)
            $('#correoAdd').val('')
            $('#prioridadCorreo').val('')
            $('#editCorreo').val(0);
            objCorreo = {
                id: 0,
                correo: '',
                prioridad: ''
            }
            return guardarCorreo()
        }

    })
    // Funcion para mostrar correos en la tabla.
    function guardarCorreo() {
        $('#email').val(correos[0]?.correo)
        var cadena
        if (correos.length == 0) {
            cadena += ` <tr class="text-center">
                            <td colspan="3">NO HAY CORREOS</td>
                        </tr>`
            $('#bodyCorre').html(cadena)
        } else {
            for (let i = 0; i < correos.length; i++) {
                cadena += ` <tr class="text-center" id=${correos[i].id}>
                                <td>${correos[i].correo}</td>
                                <td id=${correos[i].prioridad} >${correos[i].prioridad == 'S' ? 'Secundaria' : 'Primaria'}</td>
                                <td>
                                    <button class="btn" onclick="editarCorreo('${correos[i].id}')"><img src="<?= base_url('img/edit.svg') ?>" title="Editar Correo">
                                    <button class="btn" onclick="eliminarCorreo('${correos[i].id}')"><img src="<?= base_url('img/delete.svg') ?>" title="Eliminar Correo">
                                </td>
                            </tr>`
            }
        }
        $('#bodyCorre').html(cadena)
    }
    //Editar Correo
    function editarCorreo(id) {
        const fila = $(`#${id}`);
        const correo = fila.find('td').eq(0)
        const prioridad = fila.find('td').eq(1)
        $('#correoAdd').val(correo.text());
        $('#prioridadCorreo').val(prioridad.attr('id'));
        $('#editCorreo').val(fila.attr('id'));
        objCorreo = {
            id: fila.attr('id'),
            correo: correo.text(),
            prioridad: prioridad.attr('id')
        }
        correos = correos.filter(correo => correo.id != fila.attr('id'));
        guardarCorreo()
    }
    //Eliminar correo de la tabla
    function eliminarCorreo(id) {
        tp = $('#tp').val()
        if (tp == 2) {
            // Consulta tipo delete
            $.ajax({
                url: '<?php echo base_url('email/eliminarEmail/') ?>' + id,
                type: 'POST',
                dataType: 'json',
                success: function(data) {
                    if (data == 1) {
                        mostrarMensaje('success', '¡Se ha eliminado el correo!!')
                    }
                }
            })
        }
        correos = correos.filter(correo => correo.id != id)
        guardarCorreo() //Actualizar tabla
    }


    //Cambiar estado de "Activo" a "Inactivo" 
    $('#modalConfirmaP').on('shown.bs.modal', function(e) {
        $(this).find('#btnSi').attr('onclick', `EliminarCliente(${$(e.relatedTarget).data('href')})`)
    })

    function EliminarCliente(id) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('clientes/cambiarEstado') ?>",
            data: {
                id,
                estado: 'I'
            }
        }).done(function(data) {
            ContadorPRC = 0
            mostrarMensaje('success', data)
            $('#modalConfirmaP').modal('hide')
            tableClientes.ajax.reload(null, false)
        })
    }
    $('#btnNo').click(function() {
        $("#modalConfirmaP").modal("hide");
    });
</script>
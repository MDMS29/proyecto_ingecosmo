<link rel="stylesheet" href="<?php echo base_url("css/proveedores_clientes/proveedores_cliente.css") ?>">

<div id="content" class="p-4 p-md-5" style="background-color:rgba(0, 0, 0, 0.05);">
    <h2 class="text-center mb-4"><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/icon-proveedores.png') ?>" /> Proveedores</h2>
    <div class="table-responsive p-2">
        <div class="d-flex justify-content-center align-items-center flex-wrap ocultar">
            <b class="fs-6 text-black"> Ocultar Columnas:</b> <a class="toggle-vis btn" data-column="0">#</a> - <a class="toggle-vis btn" data-column="3">Direccion</a> - <a class="toggle-vis btn" data-column="4">Más Info</a>
        </div>
        <table class="table table-striped" id="tableProveedores" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">Razon Social</th>
                    <th scope="col" class="text-center">NIT</th>
                    <th scope="col" class="text-center">Direccion</th>
                    <th scope="col" class="text-center">Más Info</th>
                    <th scope="col" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <!-- TABLA PROVEDOORES -->
            </tbody>
        </table>
    </div>
    <div class="footer-page">
        <button class="btn btnRedireccion" data-bs-toggle="modal" data-bs-target="#agregarProveedor" onclick="seleccionarProveedor(<?= 0 . ',' . 1 ?>)"><img src="<?= base_url('img/plus.png') ?>" alt="icon-plus" width="20"> Agregar</button>
        <a href="<?php echo base_url('/proveedores/eliminados'); ?>" class="btn btnAccionF"> <img src="<?= base_url('img/delete.png') ?>" alt="icon-plus" width="20"> Eliminados</a>
    </div>
</div>

<!-- -----modal----------     -->
<form method="POST" id="formularioProveedores" autocomplete="off">
    <div class="modal fade" id="agregarProveedor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">

                <div class="modal-header" id="modalHeader">
                    <img  src="<?php echo base_url('/img/ingecosmo.png') ?>" width="100"/>

                    <div class="d-flex align-items-center justify-content-center" style="width:auto;">
                        <img id="logoModal" src="<?= base_url('img/plus-b.png') ?>" alt="icon-plus">
                        <h1 class="modal-title fs-5 text-center" id="tituloModal"></h1>
                    </div>

                    <button type="button" style="margin:0;" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form>
                    <div class="d-flex column-gap-3" style="width: 100%; padding-inline:20px;">
                        <div class="mb-3" style="width: 100%;">
                            <label for="recipient-name" class="col-form-label" style="margin:0;">Razon Social:</label>
                            <input class="form-control" type="text" min='1' max='300' id="RazonSocial" name="RazonSocial">
                            <small id="msgRaSo" class="invalido"></small>

                            <input hidden id="tp" name="tp">
                            <input hidden id="id" name="id">
                        </div>

                        <div class="mb-3" style="width: 100%; ">
                            <label style="margin:0;" for="message-text" class="col-form-label">NIT:</label>
                            <input type="text" class="form-control" id="nit" name="nit"></input>
                            <small id="msgNit" class="invalido"></small>
                        </div>
                    </div>

                    <div class="mb-3" style="width: 100%; padding-inline:20px;">
                        <label style="margin:0;" class="col-form-label" for="message-text">Direccion:</label>
                        <input class="form-control" id="direccion" name="direccion"></input>
                    </div>

                    <div class="d-flex column-gap-3" style="width: 100%; padding-inline:20px;">
                        <div class="mb-3" style="width: 100%">
                            <label for="telefono" class="col-form-label">Telefono:</label>
                            <div class="d-flex">
                                <input type="number" name="telefono" class="form-control" id="telefono" disabled style="background-color: #eceaea;">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#agregarTelefono" data-bs-target="#staticBackdrop" class="btn" style="border:none;background-color:gray;color:white;" title="Agregar Telefono">+</button>
                            </div>
                        </div>

                        <div class="mb-3" style="width: 100%">
                            <label for="email" class="col-form-label">Email:</label>
                            <div class="d-flex">
                                <input type="email" name="email" class="form-control" id="email" disabled style="background-color: #eceaea;">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#agregarCorreo" data-bs-target="#staticBackdrop" class="btn" style="border:none;background-color:gray;color:white;" title="Agregar Correo">+</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btnAccionF" data-bs-dismiss="modal" id="btnCerrar">Cerrar</button>
                    <button type="submit" class="btn btnRedireccion" id="btnGuardar"></button>
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
                            <div class=" flex-grow-1">
                                <label for="telefonoAdd" class="col-form-label">Telefono:</label>
                                <div>
                                    <input type="number" name="telefonoAdd" class="form-control" id="telefonoAdd" min='1' max='3'>
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
                    <button type="button" class="btn btnAccionF" onclick="limpiarCampos('telefonoAdd', 'prioridad', 'tipoTele', 3)">Cerrar</button>
                    <button type="button" class="btn btnRedireccion" id="btnAddTel">Agregar</button>
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
                <button type="button" class="btn btnAccionF" onclick="limpiarCampos('correoAdd', 'prioridadCorreo', '', 4)">Cerrar</button>
                <button type="button" class="btn btnRedireccion" id="btnAddCorre">Agregar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Confirma Eliminar -->
<div class="modal fade" id="modalConfirmarP" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <p class="textoModalP">¿Estas seguro de eliminar este Proveedor?</p>
                    </div>

                </div>
            </div>
            <div id="bloqueBtnP" class="modal-footer">
                <button id="btnNo" class="btn btnRedireccion" data-bs-dismiss="modal">Cerrar</button>
                <a id="btnSi" class="btn btnAccionF">Eliminar</a>
            </div>

        </div>
    </div>
</div>


<!-- MODAL VER TELEFONO -->
<div class="modal fade" id="verTelefono" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header flex justify-content-between align-items-center">
                <img src="<?= base_url('img/ingecosmo.png') ?>" alt="logo-empresa" width="100" height="60">
                <h1 class="modal-title fs-5 text-center " id="tituloModal"><i class="bi bi-telephone text-info fw-2 text-dark"></i> Ver Telefono</h1>
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#verCliente" aria-label="Close">X</button>
            </div>
            <input type="text" name="editTele" id="editTele" hidden>
            <div class="modal-body">
                <div class="container p-4" style="background-color: #d9d9d9;border-radius:10px;">
                    <div class="table-responsive" style="overflow:scroll-vertical;overflow-y: scroll !important; height: 150px;background-color:white;">
                        <table class="table table-bordered table-sm table-hover" id="tablePaises" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th>Telefono</th>
                                    <th>Prioridad</th>
                                    <th>Tipo</th>
                                </tr>
                            </thead>
                            <tbody id="bodyTel1">
                                <tr class="text-center">
                                    <td colspan="3">NO HAY TELEFONOS</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btnAccionF" data-bs-toggle="modal" data-bs-target="#verCliente">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- MODAL VER CORREO-->
<div class="modal fade" id="verCorreo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header flex justify-content-between align-items-center">
                <img src="<?= base_url('img/ingecosmo.png') ?>" alt="logo-empresa" width="100" height="60">
                <h1 class="modal-title fs-5 text-center " id="tituloModal"><i class="bi bi-envelope text-warning fw-3 text-dark"></i> Ver Correo</h1>
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#verCliente" aria-label="Close">X</button>
            </div>
            <div class="modal-body">
                <div class="container p-4" style="background-color: #d9d9d9;border-radius:10px;">
                    <div class="table-responsive" style="overflow:scroll-vertical;overflow-y: scroll !important; height: 150px;background-color:white;">
                        <table class="table table-bordered table-sm table-hover" id="tablePaises" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th>Correo</th>
                                    <th>Prioridad</th>
                                </tr>
                            </thead>
                            <tbody id="bodyCorre1">
                                <tr class="text-center">
                                    <td colspan="3">NO HAY CORREOS</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btnAccionF" data-bs-toggle="modal" data-bs-target="#verCliente">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // variables
    var ContadorPRC = 0; //Contador DataTable
    var contador = 0; //Contador ids telefono
    var contadorCorreo = 0; //Contador ids correos
    let telefonos = [] //Telefonos del proveedor.
    let correos = [] //Correos del proveedor.
    var inputRazonSocial = 0;
    var inputNit = 0;
    var validRazonSocial = true;
    var validNit = true;
    var validCorreo = true;
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

    //Marcar botones ocultar columnas
    var botones = $(".ocultar a");
    botones.click(function() {
        if ($(this).attr('class').includes('active')) {
            $(this).removeClass('active');
        } else {
            $(this).addClass('active');
        }
    })
    //Mostrar Ocultar Columnas
    $('a.toggle-vis').on('click', function(e) {
        e.preventDefault();
        // Get the column API object
        var column = tableProveedores.column($(this).attr('data-column'));
        // Toggle the visibility
        column.visible(!column.visible());
    });

    //Limpiar campos de telefonos y correos
    function limpiarCampos(input1, input2, input3, accion) {
        if (accion == 3) {
            if (telefonos.length != 0) {
                principalT = telefonos.filter(tel => tel.prioridad == 'P')
                if (principalT.length == 0) {
                    return mostrarMensaje('error', '¡Debe tener un telefono principal!')
                    console.log("error pero se cerro")

                } else {
                    $('#agregarTelefono').modal('hide')
                    $('#agregarProveedor').modal('show')
                }
            } else {
                $('#agregarTelefono').modal('hide')
                $('#agregarProveedor').modal('show')
            }
        }
        if (accion == 4) {
            if (correos.length != 0) {
                principalC = correos.filter(correo => correo.prioridad == 'P')
                if (principalC.length == 0) {
                    return mostrarMensaje('error', '¡Debe tener un correo principal!')
                } else {
                    $('#agregarCorreo').modal('hide')
                    $('#agregarProveedor').modal('show')
                }
            } else {
                $('#agregarCorreo').modal('hide')
                $('#agregarProveedor').modal('show')
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
        $('#msgTel').text('')
        $('#msgCorreo').text('')
    }

    // ------------------------------ estructura Tabla ------------------------------------- 
    // Obtener email principal proveedor
    var emailTable = [];
    var telefonoTable = [];

    // Tabla   
    var tableProveedores = $("#tableProveedores").DataTable({
        ajax: {
            url: '<?= base_url('proveedores/obtenerProveedores') ?>',
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
                data: 'razon_social'
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
                    return (
                        '<button class="btn" onclick="mostrarTelefonos(' + data.id_tercero + ')" title="Ver Telefonos" data-bs-target="#verTelefono" data-bs-toggle="modal"><i class="bi bi-telephone text-info fw-2"></i></button>' +

                        '<button class="btn" onclick="mostrarCorreos(' + data.id_tercero + ')" title="Ver Correos" data-bs-target="#verCorreo" data-bs-toggle="modal"><i class="bi bi-envelope text-warning fw-2"></i></button>'
                    );
                }
            },
            {
                data: null,
                render: function(data, type, row) {
                    return (
                        '<button class="btn" onclick="seleccionarProveedor(' + data.id_tercero + ' , 2 )" data-bs-target="#agregarProveedor" data-bs-toggle="modal"><img src="<?php echo base_url('img/edit.svg') ?>" alt="Boton Editar" title="Editar Proveedor"></button>' +

                        '<button class="btn" data-href=' + data.id_tercero + ' data-bs-toggle="modal" data-bs-target="#modalConfirmarP"><img src="<?php echo base_url("img/delete.svg") ?>" alt="Boton Eliminar" title="Eliminar Proveedor"></button>'
                    );
                },
            }
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },

    });

    function mostrarTelefonos(id) {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('telefonos/obtenerTelefonosUser/') ?>' + id + '/' + 8,
            dataType: 'json',
            success: function(data) {
                telefonos = data[0]
                guardarTelefono(1)
            }
        })
    }

    function mostrarCorreos(id) {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('email/obtenerEmailUser/') ?>' + id + '/' + 8,
            dataType: 'json',
            success: function(data) {
                correos = data[0]
                guardarCorreo(1)
            }
        })
    }

    //Insertar y editar proveedores
    function seleccionarProveedor(id, tp) {
        if (tp == 2) {
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('srchPro/') ?>" + id + '/' + 0 + '/' + 0,
                dataType: 'json',
            }).done(function(res) {
                console.log(res)
                limpiarCampos()
                $('#tp').val(2)
                $('#tituloModal').text('Editar')
                $('#logoModal').attr('src', '<?php echo base_url('img/editar.png') ?>')
                $('#id').val(res[0]['id_tercero'])
                $('#RazonSocial').val(res[0]['razon_social'])
                $('#nit').val(res[0]['n_identificacion'])
                $('#direccion').val(res[0]['direccion'])
                $('#btnGuardar').text('Actualizar')
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('telefonos/obtenerTelefonosUser/') ?>' + id + '/' + 8,
                    dataType: 'json',
                    success: function(data) {
                        telefonos = data[0]
                        guardarTelefono(0)
                    }
                })
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('email/obtenerEmailUser/') ?>' + id + '/' + 8,
                    dataType: 'json',
                    success: function(data) {
                        correos = data[0]
                        guardarCorreo(0)
                    }
                })
            })
        } else {
            //Insertar datos
            telefonos = []
            correos = []
            limpiarCampos(0)
            guardarCorreo(0)
            guardarTelefono(0)
            $('#tituloModal').text(`Agregar`)
            $('#logoModal').attr('src', '<?php echo base_url('img/plus-b.png') ?>')
            $('#tp').val(1)
            $('#id').val(0)
            $('#RazonSocial').val('')
            $('#nit').val('')
            $('#direccion').val('')
            $('#msgNit').text('')
            $('#msgRaSo').text('')
            $('#btnGuardar').text('Agregar')
            validRazonSocial = true;
            validNit = true;

        }

    }

    //Envio de formulario
    $('#formularioProveedores').on('submit', function(e) {
        e.preventDefault()
        tp = $('#tp').val()
        id = $('#id').val()
        RazonSocial = $('#RazonSocial').val()
        nit = $('#nit').val()
        direccion = $('#direccion').val()
        //Control de campos vacios
        if ([RazonSocial, nit, direccion].includes('') || validRazonSocial == false || validNit == false || correos.length == 0 || telefonos.length == 0) {
            return mostrarMensaje('error', '¡Hay campos vacios o invalidos!')
        } else {
            $.ajax({
                url: '<?php echo base_url('proveedores/insertar') ?>',
                type: 'POST',
                data: {
                    id,
                    tp,
                    RazonSocial,
                    nit,
                    direccion
                },
                success: function(idPro) {
                    telefonos.forEach(tel => {
                        //Insertar Telefonos
                        $.post({
                            url: '<?php echo base_url('telefonos/insertar') ?>',
                            data: {
                                tp,
                                idUsuario: idPro,
                                idTele: tel.id,
                                numero: tel.numero,
                                prioridad: tel.prioridad,
                                tipoUsu: 8,
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
                                idUsuario: idPro,
                                correo: correo.correo,
                                prioridad: correo.prioridad,
                                tipoUsu: 8,
                            },
                            success: function(res) {
                                if (res != 1) {
                                    mostrarMensaje('error', '¡Ha ocurrido un error!')
                                    setTimeout(() => window.location.href = "<?= base_url('proveedores') ?>", 2000)
                                }
                            }
                        })
                    });
                    if (tp == 2) {
                        mostrarMensaje('success', '¡Se ha Actualizado el Proveedor!')
                        validTel = true
                        validCorreo = true
                    } else {
                        mostrarMensaje('success', '¡Se ha Registrado el Proveedor!')
                        validTel = true
                        validCorreo = true
                    }
                }
            }).done(function(data) {
                $('#agregarProveedor').modal('hide')
                recargaTelCorreo()
                setTimeout(() => {
                    tableProveedores.ajax.reload(null, false); //Recargar tabla
                }, 3000)
                ContadorPRC = 0
                $('#btnGuardar').removeAttr('disabled') //jumm
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
            });
        };
    })

    // -------------validaciones-------------------
    //Validacion de Razon Social
    function buscarRazonSocial(id, inputRazonSocial) {
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('/proveedores/buscarProveedor/') ?>" + id + "/" + 0 + "/" + inputRazonSocial,
            dataType: 'JSON',
            success: function(res) {
                if (res[0] == null) {
                    $('#msgRaSo').text('')
                    validRazonSocial = true
                } else if (res[0] != null) {
                    $('#msgRaSo').text('* Razon Social ya existente *')
                    validRazonSocial = false
                }
            }
        })
    }
    //Identificar si la Razon Social esta registrado
    $('#RazonSocial').on('input', function(e) {
        inputRazonSocial = $('#RazonSocial').val()
        tp = $('#tp').val()
        id = $('#id').val()
        if (inputRazonSocial == '') {
            $('#msgRaSo').text('')
            validRazonSocial = true
        }
        if (tp == 1 && id == 0) {
            buscarRazonSocial(0, inputRazonSocial)
        } else if (tp == 2 && id != 0) {
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('proveedores/buscarProveedor/') ?>" + id + "/" + 0 + "/" + inputRazonSocial,

                dataType: 'JSON',
                success: function(res) {
                    if (res[0]['razon_social'] == inputRazonSocial) {
                        $('#msgRaSo').text('')
                        validRazonSocial = true
                    } else {
                        buscarRazonSocial(0, inputRazonSocial)
                    }
                }
            })
        }
    })
    //Validacion de Nit
    function buscarNit(id, inputNit) {
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('/proveedores/buscarProveedor/') ?>" + id + "/" + inputNit + "/" + 0,
            dataType: 'JSON',
            success: function(res) {
                if (res[0] == null) {
                    $('#msgNit').text('')
                    validNit = true
                } else if (res[0] != null) {
                    $('#msgNit').text('* NIT ya existente *')
                    validNit = false
                }
            }
        })
    }
    //Identificar si el NIT esta registrado
    $('#nit').on('input', function(e) {
        inputNit = $('#nit').val()
        tp = $('#tp').val()
        id = $('#id').val()
        if (tp == 1 && id == 0) {
            buscarNit(0, inputNit)
        } else if (tp == 2 && id != 0) {
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('/proveedores/buscarProveedor/') ?>" + id + "/" + inputNit + "/" + 0,
                dataType: 'JSON',
                success: function(res) {
                    if (res[0]['n_identificacion'] == inputNit) {
                        $('#msgNit').text('')
                        validNit = true
                    } else {
                        buscarNit(0, inputNit)
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
        const regex = /^\d{10,10}$/;

        if (!regex.test(parseInt(numero))) {
            return mostrarMensaje('error', '¡Telefono invalido!')
        }

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
            return guardarTelefono(0)
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
            return guardarTelefono(0)
        }

    })


    //Funcion para buscar el correo o el telefono
    function buscarCorreoTel(url, valor, inputName, tipo) {
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url() ?>" + `${url}` + valor + '/' + 0 + '/' + 8, //url, valor, idProveedor, tipoUsuario
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
    function guardarTelefono(tipo) {
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
                                ${tipo == 0 ? `<td>
                                    <button class="btn" onclick="editarTelefono('${telefonos[i].id}')"><img src="<?= base_url('img/edit.svg') ?>" title="Editar Telefono">
                                    <button class="btn" onclick="eliminarTel('${telefonos[i].id}')"><img src="<?= base_url('img/delete.svg') ?>" title="Eliminar Telefono">
                                </td>` : '' }
                            </tr>`
            }
        }
        $('#bodyTel').html(cadena)
        $('#bodyTel1').html(cadena)
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
        guardarTelefono(0)
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
        guardarTelefono(0) //Actualizar tabla
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
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!regex.test(correo)) {
            validCorreo = false
            return mostrarMensaje('error', '¡Tipo de correo invalido!')
        }

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
            return guardarCorreo(0)
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
            return guardarCorreo(0)
        }

    })
    // Funcion para mostrar correos en la tabla.
    function guardarCorreo(tipo) {
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
                                <td id=${correos[i].prioridad} >${correos[i].prioridad == 'S' ? 'Secundaria' : 'Principal'}</td>
                                ${tipo == 0 ? ` <td>
                                    <button class="btn" onclick="editarCorreo('${correos[i].id}')"><img src="<?= base_url('img/edit.svg') ?>" title="Editar Correo">
                                    <button class="btn" onclick="eliminarCorreo('${correos[i].id}')"><img src="<?= base_url('img/delete.svg') ?>" title="Eliminar Correo">
                                </td>`: ''}
                            </tr>`
            }
        }
        $('#bodyCorre').html(cadena)
        $('#bodyCorre1').html(cadena)
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
        guardarCorreo(0)
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
        guardarCorreo(0) //Actualizar tabla
    }


    //Cambiar estado de "Activo" a "Inactivo" 
    $('#modalConfirmarP').on('shown.bs.modal', function(e) {
        $(this).find('#btnSi').attr('onclick', `EliminarProveedor(${$(e.relatedTarget).data('href')})`)
    })
    $('#btnNo').click(function() {
        $("#modalConfirmaP").modal("hide");
    });

    function EliminarProveedor(id) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('proveedores/cambiarEstado') ?>",
            data: {
                id,
                estado: 'I'
            }
        }).done(function(data) {
            ContadorPRC = 0
            mostrarMensaje('success', data)
            $('#modalConfirmarP').modal('hide')
            tableProveedores.ajax.reload(null, false)
        })
    }
</script>
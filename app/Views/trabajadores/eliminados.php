<link rel="stylesheet" href="<?php echo base_url('css/usuarios/usuarios.css') ?>">

<div id="content" class="p-4 p-md-5" style="background-color:rgba(0, 0, 0, 0.05);">
    <h2 class="text-center mb-4"><img style=" width:50px; height:50px; " src="<?php echo base_url('/img/trabajadores-n.png') ?>" /> Trabajadores</h2>
    <div class="table-responsive p-2" >
        <table class="table table-striped" id="tableTrabajadores" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">Nombres</th>
                    <th scope="col" class="text-center">Apellidos</th>
                    <th scope="col" class="text-center">Tipo Documento</th>
                    <th scope="col" class="text-center">Identificación</th>
                    <th scope="col" class="text-center">Cargo</th>
                    <th scope="col" class="text-center">Direccion</th>
                    <th scope="col" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-center">
            </tbody>
        </table>
    </div>
    <div class="footer-page">
    <a href="<?php echo base_url('/trabajadores') ?>" class="btn btnRedireccion">Regresar</a>
    </div>
</div>


<div class="modal fade" id="verTrabajador" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <input type="text" name="id" id="id" hidden>
    <input type="text" name="tp" id="tp" hidden>
    <div class="modal-dialog modal-xl">
        <div class="body">
            <div class="logo">
                <img src="<?= base_url('img/logo_empresa.png') ?>" alt="Logo Empresa" class="logoEmpresa">
            </div>
            <div class="modal-content">
                <div class="modal-header flex">
                    <h1 class="modal-title fs-5 text-center" id="tituloModal"><!-- TEXTO DINAMICO--></h1>
                    <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="d-flex column-gap-3" style="width: 100%">
                            <div class="mb-3" style="width: 100%">
                                <label for="nombre_p" class="col-form-label">Primer Nombre:</label>
                                <input type="text" name="nombre_p" class="form-control" id="nombreP" disabled>
                            </div>
                            <div class="mb-3" style="width: 100%">
                                <label for="nombre_s" class="col-form-label">Segundo Nombre:</label>
                                <input type="text" name="nombre_s" class="form-control" id="nombreS" disabled>
                            </div>
                        </div>
                        <div class="d-flex column-gap-3" style="width: 100%">
                            <div class="mb-3" style="width: 100%">
                                <label for="apellido_p" class="col-form-label">Primer Apellido:</label>
                                <input type="text" name="apellido_p" class="form-control" id="apellidoP" disabled>
                            </div>
                            <div class="mb-3" style="width: 100%">
                                <label for="apellido_s" class="col-form-label">Segundo Apellido:</label>
                                <input type="text" name="apellido_s" class="form-control" id="apellidoS" disabled>
                            </div>
                            
                        </div>
                        <div class="d-flex column-gap-3" style="width: 100%">
                            <div class="mb-3" style="width: 100%">
                                <div class="mb-3">
                                    <label for="tipoDoc" class="col-form-label">Tipo Identificación:</label>
                                    <select class="form-select form-select" name="tipoDoc" id="tipoDoc" disabled>
                                        <option value="1" selected>Cedula de Ciudadania</option>
                                        <option>-- Seleccione --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3" style="width: 100%">
                                <div class="">
                                    <label for="nIdenti" class="col-form-label">N° Identificación:</label>
                                    <input type="number" name="nIdenti" class="form-control" id="nIdenti" minlength="9" maxlength="11" disabled>
                                    <small id="msgDoc" class="invalido"></small>
                                </div>
                            </div>
                            
                        </div>
                        <div class="d-flex column-gap-3" style="width: 100%">
                            <div class="mb-3" style="width: 100%">
                                <label for="telefono" class="col-form-label">Telefono:</label>
                                <div class="d-flex">
                                    <input type="number" name="telefono" class="form-control" id="telefono" disabled>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#verTelefono" data-bs-target="#staticBackdrop" class="btn" style="border:none;background-color:gray;color:white;" title="Agregar Telefono">+</button>
                                </div>
                            </div>
                            <div class="mb-3" style="width: 100%">
                                <label for="email" class="col-form-label">Email:</label>
                                <div class="d-flex">
                                    <input type="email" name="email" class="form-control" id="email" disabled>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#verCorreos" data-bs-target="#staticBackdrop" class="btn" style="border:none;background-color:gray;color:white;" title="Agregar Correo">+</button>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex column-gap-3" style="width: 100%">
                            <div class="mb-3" style="width: 100%">
                                <div class="mb-3">
                                    <label for="cargo" class="col-form-label">Cargo:</label>
                                    <select class="form-select form-select" name="cargo" id="cargo" disabled>
                                        <option selected value="">-- Seleccione --</option>
                                        <?php foreach ($cargos as $c) { ?>
                                            <option value="<?= $c['id_cargo'] ?>"><?= $c['nombre'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3" style="width: 100%">
                                <label for="direccion" class="col-form-label">Direccion:</label>
                                <input type="text" name="direccion" class="form-control" id="direccion" disabled>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btnRedireccion" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL AGREGAR - EDITAR TELEFONO -->
<div class="modal fade" id="verTelefono" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header flex justify-content-between align-items-center">
                <img src="<?= base_url('img/ingecosmo.png') ?>" alt="logo-empresa" width="60" height="60">
                <h1 class="modal-title fs-5 text-center " id="tituloModal"><img src="<?= base_url('img/plus-b.png') ?>" alt="" width="30" height="30"> VER TELEFONOS</h1>
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#verTrabajador" aria-label="Close">X</button>
            </div>
            <div class="modal-body">
                <div class="container p-4" style="background-color: #d9d9d9;border-radius:10px;">
                    <div class="table-responsive" style="overflow:scroll-vertical;overflow-y: scroll !important; height: 150px;background-color:white;">
                        <table class="table table-bordered table-sm table-hover" id="tablePaises" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th>Telefono</th>
                                    <th>Prioridad</th>
                                </tr>
                            </thead>
                            <tbody id="bodyTel">
                                <tr class="text-center">
                                    <td colspan="3">NO HAY TELEFONOS</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btnRedireccion" data-bs-toggle="modal" data-bs-target="#verTrabajador">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL VER CORREOS -->
<div class="modal fade" id="verCorreos" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header flex justify-content-between align-items-center">
                <img src="<?= base_url('img/ingecosmo.png') ?>" alt="logo-empresa" width="60" height="60">
                <h1 class="modal-title fs-5 text-center " id="tituloModal"><img src="<?= base_url('img/plus-b.png') ?>" alt="" width="30" height="30"> VER CORREO</h1>
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#verTrabajador" aria-label="Close">X</button>
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
                <button type="button" class="btn btnRedireccion" data-bs-toggle="modal" data-bs-target="#verTrabajador">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal Confirma Reestablecer -->
<div class="modal fade" id="modalConfirmar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">

        <div class="modal-content" id="modalEliminarContentP">
            <div class="modalContenedorP">
                <div id="contenidoHeaderEliminarP" class="modal-header">
                    <img style=" width:80px; height:60px; margin-bottom: 0; " src="<?php echo base_url('/img/ingecosmo.png') ?>" />
                </div>

                <div class="contenidoEliminarP">
                    <div class="bloqueModalP">
                        <img style=" width:80px; height:60px; margin:10px; " src="<?php echo base_url('/img/icon-alerta.png') ?>" />
                        <p class="textoModalP">¿Estas seguro de reestablecer este Trabajador?</p>
                    </div>

                </div>
            </div>
            <div id="bloqueBtnP" class="modal-footer">
                <button id="btnNo" class="btn btnRedireccion" data-bs-dismiss="modal">Cerrar</button>
                <a id="btnSi" class="btn btnAccionF">Reestablecer</a>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

    var ContadorPRC = 0;
    let telefonos = [] //Telefonos del usuario.
    let correos = [] //Correos del usuario.

    // Tabla de usuarios
    var tableTrabajadores = $("#tableTrabajadores").DataTable({
        ajax: {
            url: '<?= base_url('trabajadores/obtenerTrabajadores') ?>',
            method: "POST",
            data: {
                estado: 'I'
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
                data: 'doc_res'
            },
            {
                data: 'n_identificacion'
            },
            {
                data: 'nombre_cargo'
            },
            {
                data: 'direccion'
            },
            {
                data: null,
                render: function(data, type, row) {
                    return (
                        '<button class="btn text-primary" onclick="seleccionarTrabajador(' + data.id_trabajador + ')" data-bs-target="#verTrabajador" data-bs-toggle="modal" width="20"><i class="bi bi-eye-fill fs-4"></i></button>' +
                        '<button class="btn" data-href=' + data.id_trabajador + ' data-bs-toggle="modal" data-bs-target="#modalConfirmar"><img src="<?php echo base_url("img/restore.png") ?>" alt="Boton Eliminar" title="Eliminar Trabajador" width="20"></button>'
                    );
                },
            }
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }
    });

    function seleccionarTrabajador(id) {
            //Actualizar datos
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('srchTra/') ?>" + id + "/" + 0,
                dataType: 'json',
                success: function(res) {
                    $('#tituloModal').text('Editar Trabajador')
                    $('#tp').val(2)
                    $('#id').val(res[0]['id_trabajador'])
                    $('#nombreP').val(res[0]['nombre_p'])
                    $('#nombreS').val(res[0]['nombre_s'])
                    $('#apellidoP').val(res[0]['apellido_p'])
                    $('#apellidoS').val(res[0]['apellido_s'])
                    $('#tipoDoc').val(1)
                    $('#nIdenti').val(res[0]['n_identificacion'])
                    $('#direccion').val(res[0]['direccion'])
                    $('#cargo').val(res[0]['id_cargo'])
                    $('#btnGuardar').text('Actualizar')
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url('telefonos/obtenerTelefonosUser/') ?>' + id + '/' + 6,
                        dataType: 'json',
                        success: function(data) {
                            telefonos = data[0]
                            mostrarTelefonos()
                        }
                    })
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url('email/obtenerEmailUser/') ?>' + id + '/' + 6,
                        dataType: 'json',
                        success: function(data) {
                            correos = data[0]
                            mostrarCorreo()
                        }
                    })
                }
            })
        }

        // Funcion para mostrar correos en la tabla.
        function mostrarCorreo() {
        $('#email').val(correos[0]?.correo)
        var cadena
        if (correos.length == 0) {
            cadena += ` <tr class="text-center">
                            <td colspan="3">NO HAY CORREOS</td>
                        </tr>`
            $('#bodyCorre').html(cadena)
        } else {
            for (let i = 0; i < correos.length; i++) {
                cadena += ` <tr class="text-center">
                                <td>${correos[i].correo}</td>
                                <td>${correos[i].prioridad == 'S' ? 'Secundaria' : 'Primaria'}</td>
                            </tr>`
            }
        }
        $('#bodyCorre').html(cadena)
    }
    // Funcion para mostrar telefonos en la tabla.
    function mostrarTelefonos() {
        $('#telefono').val(telefonos[0]?.numero)
        var cadena
        if (telefonos.length == 0) {
            cadena += ` <tr class="text-center">
            <td colspan="3">NO HAY TELEFONOS</td>
            </tr>`
            $('#bodyTel').html(cadena)
        } else {
            for (let i = 0; i < telefonos.length; i++) {
                cadena += ` <tr class="text-center">
                                <td>${telefonos[i].numero}</td>
                                <td>${telefonos[i].prioridad == 'S' ? 'Secundaria' : 'Primaria'}</td>
                            </tr>`
            }
        }
        $('#bodyTel').html(cadena)
    }
     //Cambiar estado de "Eliminado" a "Activo"
     $('#modalConfirmar').on('shown.bs.modal', function(e) {
        $(this).find('#btnSi').attr('onclick', `ReestaurarTrabajadores(${$(e.relatedTarget).data('href')})`)
    })

    function ReestaurarTrabajadores(id) {
        $.ajax({
            url: "<?php echo base_url('trabajadores/cambiarEstado') ?>",
            type: "POST",
            data: {
                id,
                estado: 'A'
            }
        }).done(function(data) {
            mostrarMensaje('success', data)
            $('#modalConfirmar').modal('hide')
            tableTrabajadores.ajax.reload(null, false)
            ContadorPRC = 0
        })
    }
</script>
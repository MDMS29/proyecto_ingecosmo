<link rel="stylesheet" href="<?php echo base_url("css/proveedores_clientes/proveedores_cliente.css") ?>">


<div id="content" class="p-4 p-md-5" style="background-color:rgba(0, 0, 0, 0.05);">
    <h2 class="text-center mb-4"><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/icon-proveedores.png') ?>" /> Proveedores Eliminados</h2>

    <div class="table-responsive p-2">

        <table class="table table-striped" id="tableProveedores" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Id</th>
                    <th scope="col" class="text-center">Razon Social</th>
                    <th scope="col" class="text-center">NIT</th>
                    <th scope="col" class="text-center">Direccion</th>
                    <th scope="col" class="text-center">Telefono</th>
                    <th scope="col" class="text-center">Acciones</th>
                </tr>
            </thead>

            <tbody class="text-center">
                <?php $contador = 0 ?>
                <?php if (empty($proveedores)) { ?>
                    <tr>
                        <td class="text-center" colspan="7">
                            <h3>¡No hay Proveedores Eliminados!</h3>
                        </td>
                    </tr>
                <?php } ?>
                <!-- texto dinamico -->
            </tbody>

        </table>
    </div>

    <div class="footer-page">
        <button type="button" class="btn btnRedireccion d-flex gap-2 align-items-center" onclick="window.history.back()"><img src="<?= base_url('img/regresa.png') ?>" alt="icon-plus" width="20"> Regresar</button>

    </div>

</div>
<!-- Modal Confirma reestablecer -->
<div class="modal fade" id="verProveedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <p class="textoModalP">¿Estas seguro de restableceer este Proveedor?</p>
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

<!-- MODAL AGREGAR - EDITAR TELEFONO -->
<div class="modal fade" id="verTelefono" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="body-R">
            <div class="modal-content">
                <div class="modal-header flex justify-content-between align-items-center">
                    <img src="<?= base_url('img/ingecosmo.png') ?>" alt="logo-empresa" width="100" height="60">
                    <h1 class="modal-title fs-5 text-center " id="tituloModal"><i class="bi bi-eye-fill fs-4"></i> Ver Telefonos</h1>
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#verProveedor" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <div class="container p-4" style="background-color: #d9d9d9;border-radius:10px;">
                        <div class="table-responsive" style="overflow:scroll-vertical;overflow-y: scroll !important; height: 150px;background-color:white;">
                            <table class="table table-bordered table-sm table-hover" id="tablePaises" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th>Telefono</th>
                                        <th>Tipo</th>
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
                    <button type="button" class="btn btnRedireccion" data-bs-toggle="modal" data-bs-target="#verProveedor">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL VER CORREOS -->
<div class="modal fade" id="verCorreos" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="body-R">
            <div class="modal-content">
                <div class="modal-header flex justify-content-between align-items-center">
                    <img src="<?= base_url('img/ingecosmo.png') ?>" alt="logo-empresa" width="100" height="60">
                    <h1 class="modal-title fs-5 text-center " id="tituloModal"><i class="bi bi-eye-fill fs-4"></i> Ver Correos</h1>
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#verProveedor" aria-label="Close">X</button>
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
                    <button type="button" class="btn btnRedireccion" data-bs-toggle="modal" data-bs-target="#verProveedor">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    var ContadorPRC = 0

    //Cambiar estado de "Inactivo" a "Activo"
    $('#verProveedor').on('shown.bs.modal', function(e) {
        $(this).find('#btnSi').attr('onclick', `ReestablecerProveedor(${$(e.relatedTarget).data('href')})`)
    })

    function ReestablecerProveedor(id) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('proveedores/cambiarEstado') ?>",
            data: {
                id,
                estado: 'A'
            }
        }).done(function(data) {
            mostrarMensaje('success', data)
            ContadorPRC = 0
            $('#verProveedor').modal('hide')
            tableProveedores.ajax.reload(null, false)
        })
    }



    // ------------------------------ estructura Tabla ------------------------------------- 
    // Obtener email principal proveedor
    var emailTable = []
    var telefonoTable = []

    function recargaTelCorreo() {
        $.ajax({
            url: '<?= base_url('proveedores/obtenerProveedores') ?>',
            method: "POST",
            data: {
                estado: 'I'
            },
            dataSrc: "",
        }).done(function(res) {
            let data = JSON.parse(res)
            for (let i = 0; i < data.length; i++) {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('email/EmailPrincipal/') ?>' + data[i].id_tercero + '/8',
                    async: false, // Establece el modo de solicitud sincrónica para obtener el resultado antes de continuar
                    dataType: 'json',
                    success: function(response) {
                        return emailTable.push({
                            idProveedor: data[i].id_tercero,
                            correo: response[0]?.correo || 'No se encontro correo'
                        });
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('telefonos/TelefonoPrincipal/') ?>' + data[i].id_tercero + '/8',
                    async: false, // Establece el modo de solicitud sincrónica para obtener el resultado antes de continuar
                    dataType: 'json',
                    success: function(response) {
                        return telefonoTable.push({
                            idProveedor: data[i].id_tercero,
                            telefono: response[0]?.numero || 'No se encontro telefono'
                        });
                    }
                });
            }
        })
    }
    recargaTelCorreo()


    // Tabla   
    var tableProveedores = $("#tableProveedores").DataTable({
        ajax: {
            url: '<?= base_url('proveedores/obtenerProveedores') ?>',
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
                    arrayTele = telefonoTable.filter(tel => tel.idProveedor == row.id_tercero)[0]?.telefono
                    return arrayTele
                }
            },
            {
                data: null,
                render: function(data, type, row) {
                    return (
                        '<button class="btn text-primary" onclick="seleccionarProveedor(' + data.id_tercero + ')" data-bs-target="#verProveedor" data-bs-toggle="modal" width="20"><i class="bi bi-eye-fill fs-4" title="Ver Proveedor"></i></button>' +
                        '<button class="btn" data-href=' + data.id_tercero + ' data-bs-toggle="modal" data-bs-target="#verProveedor"><img src="<?php echo base_url("img/restore.png") ?>" alt="Boton Restablecer" title="Restablecer Proveedor" width="20"></button>'
                    );
                },
            }
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },

    });

    function seleccionarProveedor(id) {
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('srchPro/') ?>" + id + "/" + 0,
            dataType: 'json'
        }).done(function(res) {
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
                    mostrarTelefonos()
                }
            })
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('email/obtenerEmailUser/') ?>' + id + '/' + 8,
                dataType: 'json',
                success: function(data) {
                    correos = data[0]
                    mostrarCorreo()
                }
            })
        })
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
                                <td id=${telefonos[i].tipo}>${telefonos[i].tipo == 3 ? 'Celular' : 'Fijo'}</td>
                                <td>${telefonos[i].prioridad == 'S' ? 'Secundaria' : 'Principal'}</td>
                            </tr>`
            }
        }
        $('#bodyTel').html(cadena)
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
                                <td>${correos[i].prioridad == 'S' ? 'Secundaria' : 'Principal'}</td>
                            </tr>`
            }
        }
        $('#bodyCorre').html(cadena)
    }


    $('.btnNo').click(function() {
        $("#verProveedor").modal("hide");
    });
</script>